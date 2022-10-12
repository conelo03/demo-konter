<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash extends CI_Controller {

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

	public function index()
	{
		$post_m = $this->input->post('month');
		if(empty($post_m)){
			$month = date('Y-m');
		} else {
			$month = $post_m;
		}
		$data['month_c'] = $month;
		$data['month']		= $this->db->query("SELECT DATE_FORMAT(tanggal, '%Y-%m') as tgl1, DATE_FORMAT(tanggal, '%M %Y') as tgl FROM cash GROUP BY MONTH(tanggal), YEAR(tanggal) order by tanggal ASC")->result_array();

    $data['title']		= 'Data Cash';
		$data['cash']		= $this->M_cash->get_data($month)->result_array();
		$pemasukan = $this->db->select_sum('pemasukan')->get('cash')->row_array();
		$pengeluaran = $this->db->select_sum('pengeluaran')->get('cash')->row_array();

		$data['saldo'] = $pemasukan['pemasukan'] - $pengeluaran['pengeluaran'];
		$data['pemasukan'] = $pemasukan['pemasukan'];
		$data['pengeluaran'] = $pengeluaran['pengeluaran'];
		$this->load->view('cash/data', $data);
	}

	public function all()
	{
    $data['title']		= 'Data Cash';
		$data['cash']		= $this->M_cash->get_data()->result_array();
		$pemasukan = $this->db->select_sum('pemasukan')->get('cash')->row_array();
		$pengeluaran = $this->db->select_sum('pengeluaran')->get('cash')->row_array();

		$data['saldo'] = $pemasukan['pemasukan'] - $pengeluaran['pengeluaran'];
		$data['pemasukan'] = $pemasukan['pemasukan'];
		$data['pengeluaran'] = $pengeluaran['pengeluaran'];
		$this->load->view('cash/data_all', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Tambah Cash';
			$this->load->view('cash/tambah', $data);
		} else {
			$data	= $this->input->post(null, true);
			if($data['jenis'] == 'pemasukan'){
				$pemasukan = $data['jumlah'];
				$pengeluaran = NULL;
			} elseif($data['jenis'] == 'pengeluaran') {
				$pemasukan = NULL;
				$pengeluaran = $data['jumlah'];
			}
			$data_user	= [
				'tanggal'		=> $data['tanggal'],
				'keterangan'	=> $data['keterangan'],
				'pemasukan'		=> $pemasukan,
				'pengeluaran'	=> $pengeluaran,
				'catatan'		=> $data['catatan'],
			];
			if ($this->M_cash->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-cash');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('cash');
			}
		}
	}

	public function edit($id_cash)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Edit Cash';
			$data['id_cash'] = $id_cash;
			$data['cash']	= $this->M_cash->get_by_id($id_cash);
			$this->load->view('cash/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if($data['jenis'] == 'pemasukan'){
				$pemasukan = $data['jumlah'];
				$pengeluaran = NULL;
			} elseif($data['jenis'] == 'pengeluaran') {
				$pemasukan = NULL;
				$pengeluaran = $data['jumlah'];
			}
			$data_user	= [
				'id_cash'		=> $id_cash,
				'tanggal'		=> $data['tanggal'],
				'keterangan'	=> $data['keterangan'],
				'pemasukan'		=> $pemasukan,
				'pengeluaran'	=> $pengeluaran,
				'catatan'		=> $data['catatan'],
			];
			
			if ($this->M_cash->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-cash/'.$id_cash);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('cash');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required');		
	}

	public function hapus($id_cash)
	{
		$this->M_cash->delete($id_cash);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('cash');
	}
}
