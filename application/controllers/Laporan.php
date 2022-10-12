<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		if($this->session->userdata('role') != '1')
		{
			redirect('dashboard');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	//Barang
	public function transaksi()
	{
        $data['title']		= 'Laporan Transaksi';
		$data['bulan']		= $this->M_barang->get_bulan()->result_array();
		$this->load->view('laporan/transaksi', $data);
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
        $data['title']		= 'Laporan Barang Masuk';
		$data['barang']		= $this->M_barang->get_barang_masuk($month)->result_array();
		$this->load->view('laporan/data_barang_masuk', $data);
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
        $data['title']		= 'Laporan Barang Keluar';
		$data['barang']		= $this->M_barang->get_barang_keluar($month)->result_array();
		$this->load->view('laporan/data_barang_keluar', $data);
	}

	public function cetak_transaksi()
	{
		$bulan = $this->input->post('bulan');
		if($this->input->post('filter')){
			$data['title']		= 'Laporan Transaksi';
			$data['title2']		= 'Laporan Transaksi Bulan '.$bulan;
			$bulan2				= date('Y-m', strtotime($bulan));
			$data['barang']		= $this->M_barang->get_barang_keluar_group_date($bulan2)->result_array();
			$this->load->view('laporan/filter_transaksi', $data);
		} else {
			$this->load->library('pdf');
			$data['title']		= 'Laporan Transaksi';
			$data['title2']		= 'Laporan Transaksi Bulan '.$bulan;
			$bulan2				= date('Y-m', strtotime($bulan));
			$data['barang']		= $this->M_barang->get_barang_keluar_group_date($bulan2)->result_array();
			
	        $html_content = $this->load->view('laporan/cetak_transaksi', $data, true);
	        $filename = 'Laporan Transaksi Bulan ' .$bulan.'.pdf';

	        $this->pdf->loadHtml($html_content);

	        $this->pdf->set_paper('a4','potrait');
	        
	        $this->pdf->render();
	        $this->pdf->stream($filename, ['Attachment' => 1]);
		}
	}
}
