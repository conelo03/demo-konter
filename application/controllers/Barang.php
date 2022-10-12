<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	//Barang
	public function index()
	{
        $data['title']		= 'Data Barang';
		$data['barang']		= $this->M_barang->get_barang()->result_array();
		$data['jml_barang'] = $this->db->get('barang')->num_rows();
		$brg = $this->db->select_sum('harga_beli')->get('barang')->row_array();
		// $assets = 0;
		// foreach ($data['barang'] as $a){
		//     $assets += $a['harga_beli'];
		// }
		$data['total_assets'] = $brg['harga_beli'];
		$this->load->view('barang/data', $data);
	}

	public function edit($id_barang)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang';
			$data['b']	= $this->M_barang->get_barang_by_id($id_barang);
			$this->load->view('barang/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_barang'			=> $id_barang,
				'merk_hp'			=> $data['merk_hp'],
				'tipe_hp'			=> $data['tipe_hp'],
				'harga_beli'		=> $data['harga_beli'],
				'keterangan'		=> $data['keterangan'],
			];

			
			if ($this->M_barang->update_barang($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-barang/'.$id_barang);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('barang');
			}
		}
	}

	public function hapus($id_barang)
	{
	    $data = $this->M_barang->get_barang_by_id($id_barang);
	    $this->M_barang->delete_barang_masuk($data['id_barang_masuk']);
		$this->M_barang->delete_barang($id_barang);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang');
	}

	public function data_barang_masuk()
	{
		$post_m = $this->input->post('month');
		if(empty($post_m)){
			$month = date('Y-m');
		} else {
			$month = $post_m;
		}
		$data['month_c'] = $month;
		$data['month']		= $this->db->query("SELECT DATE_FORMAT(tanggal, '%Y-%m') as tgl1, DATE_FORMAT(tanggal, '%M %Y') as tgl FROM barang_masuk GROUP BY MONTH(tanggal), YEAR(tanggal) order by tanggal ASC")->result_array();
    $data['title']		= 'Data Barang Masuk';
		$data['barang']		= $this->M_barang->get_barang_masuk($month)->result_array();
		$this->load->view('barang/data_barang_masuk', $data);
	}

	public function data_barang_masuk_all()
	{
		$data['title']		= 'Barang Masuk All';
		$data['barang']		= $this->M_barang->get_barang_masuk()->result_array();
		$this->load->view('barang/data_barang_masuk_all', $data);
	}

	public function tambah_barang_masuk()
	{
		$this->validation_masuk();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang Masuk';
			$this->load->view('barang/tambah_barang_masuk', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'tanggal'			=> $data['tanggal'],
				'merk_hp'			=> $data['merk_hp'],
				'tipe_hp'			=> $data['tipe_hp'],
				'harga_beli'		=> $data['harga_beli'],
				'keterangan'		=> $data['keterangan'],
			];
			
			$this->M_barang->insert_barang_masuk($data_user);
			
			$last_cash = $this->M_cash->get_last();

			$data_cash	= [
				'tanggal'			=> $data['tanggal'],
				'keterangan'		=> 'Beli '.$data['merk_hp'].' '.$data['tipe_hp'],
				'pengeluaran'		=> $data['harga_beli'],
				'catatan'			=> '-',
			];
			
			$this->M_cash->insert($data_cash);

			$get_last_data = $this->db->select('*')->from('barang_masuk')->order_by('id_barang_masuk','DESC')->get()->row_array();

			$data_barang	= [
			    'id_barang_masuk'   => $get_last_data['id_barang_masuk'],
				'merk_hp'			=> $data['merk_hp'],
				'tipe_hp'			=> $data['tipe_hp'],
				'harga_beli'		=> $data['harga_beli'],
				'keterangan'		=> $data['keterangan'],
			];
			
			if ($this->M_barang->insert_barang($data_barang)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-barang-masuk');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('barang-masuk');
			}
		}
	}

	public function edit_barang_masuk($id_barang_masuk)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang Masuk';
			$data['b']	= $this->M_barang->get_barang_masuk_by_id($id_barang_masuk);
			$this->load->view('barang/edit_barang_masuk', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_barang_masuk'	=> $id_barang_masuk,
				'tanggal'			=> $data['tanggal'],
				'merk_hp'			=> $data['merk_hp'],
				'tipe_hp'			=> $data['tipe_hp'],
				'harga_beli'		=> $data['harga_beli'],
				'keterangan'		=> $data['keterangan'],
			];

			
			if ($this->M_barang->update_barang_masuk($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-barang-masuk/'.$id_barang_masuk);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('barang-masuk');
			}
		}
	}

	public function hapus_barang_masuk($id_barang_masuk)
	{
		$this->M_barang->delete_barang_masuk($id_barang_masuk);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang-masuk');
	}

	public function data_barang_keluar()
	{
		$post_m = $this->input->post('month');
		if(empty($post_m)){
			$month = date('Y-m');
		} else {
			$month = $post_m;
		}
		$data['month_c'] = $month;
		$data['month']		= $this->db->query("SELECT DATE_FORMAT(tanggal, '%Y-%m') as tgl1, DATE_FORMAT(tanggal, '%M %Y') as tgl FROM barang_keluar GROUP BY MONTH(tanggal), YEAR(tanggal) order by tanggal ASC")->result_array();
    $data['title']		= 'Data Barang Keluar';
		$data['barang']		= $this->M_barang->get_barang_keluar($month)->result_array();
		$this->load->view('barang/data_barang_keluar', $data);
	}

	public function data_barang_keluar_all()
	{
		$data['title']		= 'Barang Keluar All';
		$data['barang']		= $this->M_barang->get_barang_keluar()->result_array();
		$this->load->view('barang/data_barang_keluar_all', $data);
	}

	public function tambah_barang_keluar()
	{
		$this->validation_keluar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang Keluar';
			$data['barang']		= $this->M_barang->get_barang()->result_array();
			$this->load->view('barang/tambah_barang_keluar', $data);
		} else {
			$data		= $this->input->post(null, true);
			$id_barang 	= $data['id_barang'];
			$barang 	= $this->M_barang->get_barang_by_id($id_barang);
			$data_user	= [
			    'id_barang_masuk'   => $barang['id_barang_masuk'],
				'tanggal'			=> $data['tanggal'],
				'merk_hp'			=> $barang['merk_hp'],
				'tipe_hp'			=> $barang['tipe_hp'],
				'harga_beli'		=> $barang['harga_beli'],
				'harga_jual'		=> $data['harga_jual'],
				'keterangan'		=> $barang['keterangan'],
			];

			$this->M_barang->insert_barang_keluar($data_user);

			$last_cash = $this->M_cash->get_last();

			$data_cash	= [
				'tanggal'			=> $data['tanggal'],
				'keterangan'		=> 'Jual '.$barang['merk_hp'].' '.$barang['tipe_hp'],
				'pemasukan'		=> $data['harga_jual'],
				'catatan'			=> '-',
			];
			
			$this->M_cash->insert($data_cash);

			$get_last_data = $this->db->select('*')->from('barang_keluar')->order_by('id_barang_keluar','DESC')->get()->row_array();
			
			$data_backup	= [
			    'id_barang_keluar'  => $get_last_data['id_barang_keluar'],
			    'id_barang_masuk'   => $barang['id_barang_masuk'],
				'id_barang'			=> $id_barang,
				'merk_hp'			=> $barang['merk_hp'],
				'tipe_hp'			=> $barang['tipe_hp'],
				'harga_beli'		=> $barang['harga_beli'],
				'keterangan'		=> $barang['keterangan'],
			];
			
			$this->db->insert('barang_backup', $data_backup);
			
			if ($this->M_barang->delete_barang($id_barang)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-barang-keluar');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('barang-keluar');
			}
		}
	}

	public function edit_barang_keluar($id_barang_keluar)
	{
		$this->validation_keluar();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Barang Keluar';
			$data['b']	= $this->M_barang->get_barang_keluar_by_id($id_barang_keluar);
			$this->load->view('barang/edit_barang_keluar', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_barang_keluar'	=> $id_barang_keluar,
				'tanggal'			=> $data['tanggal'],
				'harga_jual'		=> $data['harga_jual'],
			];

			
			if ($this->M_barang->update_barang_keluar($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-barang-keluar/'.$id_barang_keluar);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('barang-keluar');
			}
		}
	}
	
	public function hapus_barang_keluar($id_barang_keluar)
	{
		$this->M_barang->delete_barang_keluar($id_barang_keluar);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('barang-keluar');
	}
	
	public function cancel_barang_keluar($id_barang_keluar)
	{
		
		$get_data = $this->db->get_where('barang_backup', ['id_barang_keluar' => $id_barang_keluar])->row_array();
		$get_keluar = $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id_barang_keluar])->row_array();
		if(empty($get_data)){
		    $get_data = $this->M_barang->get_barang_keluar_by_id($id_barang_keluar);
		    $data = [
		        'id_barang_masuk' => $get_data['id_barang_masuk'],
    		    'merk_hp' => $get_data['merk_hp'],
    		    'tipe_hp' => $get_data['tipe_hp'],
    		    'harga_beli' => $get_data['harga_beli'],
    		    'keterangan' => $get_data['keterangan'],
    		    ];
		} else {
		    $data = [
    		    'id_barang' => $get_data['id_barang'],
    		    'id_barang_masuk' => $get_data['id_barang_masuk'],
    		    'merk_hp' => $get_data['merk_hp'],
    		    'tipe_hp' => $get_data['tipe_hp'],
    		    'harga_beli' => $get_data['harga_beli'],
    		    'keterangan' => $get_data['keterangan'],
    		    ];
		}
		
		$this->M_barang->insert_barang($data);
		$this->M_barang->delete_barang_keluar($id_barang_keluar);
		$this->db->delete('barang_backup', ['id_barang_keluar' => $id_barang_keluar]);

		$last_cash = $this->M_cash->get_last();

		$data_cash	= [
			'tanggal'		=> date('Y-m-d'),
			'keterangan'	=> 'Pengembalian '.$get_data['merk_hp'].' '.$get_data['tipe_hp'],
			'pengeluaran'	=> $get_keluar['harga_jual'],
			'catatan'		=> 'Pengembalian Barang',
		];
		
		$this->M_cash->insert($data_cash);

		$this->session->set_flashdata('msg', 'edit');
		redirect('barang-keluar');
	}

	private function validation()
	{
		$this->form_validation->set_rules('merk_hp', 'Merk HP', 'required|trim');
		$this->form_validation->set_rules('tipe_hp', 'Tipe HP', 'required|trim');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
	
	}

	private function validation_masuk()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('merk_hp', 'Merk HP', 'required|trim');
		$this->form_validation->set_rules('tipe_hp', 'Tipe HP', 'required|trim');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
	
	}

	private function validation_keluar()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('id_barang', 'Barang', 'required|trim');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
	}
}
