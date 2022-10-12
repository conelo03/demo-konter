<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['title']	= 'Dashboard';
		$bulan = date('Y-m');
		$transaksi = $this->M_barang->get_barang_keluar_group_date($bulan)->result_array();
		$keuntungan = 0;
		foreach ($transaksi as $t) {
			$keuntungan += $t['harga_jual']-$t['harga_beli'];
		}

		$data['keuntungan'] = $keuntungan;

		$data['barang']		= $this->M_barang->get_barang()->result_array();
		$assets = 0;
		foreach ($data['barang'] as $a){
		    $assets += $a['harga_beli'];
		}
		$data['total_assets'] = $assets;

		$cash		= $this->M_cash->get_data()->result_array();
		$pemasukan = 0;
		$pengeluaran = 0;
		$saldo = 0;
		foreach ($cash as $c) {
			$pemasukan += $c['pemasukan'];
			$pengeluaran += $c['pengeluaran'];
		}
		$data['cash'] = $pemasukan - $pengeluaran;

		$data['total'] = $keuntungan + $assets + $data['cash'];
		$this->load->view('dashboard', $data);
	}
}
