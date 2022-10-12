<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function get_barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by('id_barang', 'DESC');
        return $this->db->get();
	}

	public function get_barang_masuk($month = null)
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		if($month != null){
			$this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $month);
		}
		$this->db->order_by('id_barang_masuk', 'DESC');
        return $this->db->get();
	}

	public function get_barang_keluar($month = null)
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		if($month != null){
			$this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $month);
		}
		$this->db->order_by('id_barang_keluar', 'DESC');
        return $this->db->get();
	}

	public function get_bulan()
	{
		$this->db->select('*, DATE_FORMAT(`barang_keluar`.`tanggal`, "%M %Y") `myformat`');
		$this->db->from('barang_keluar');
		$this->db->order_by('id_barang_keluar', 'ASC');
		$this->db->group_by("MONTH(`barang_keluar`.`tanggal`), YEAR(`barang_keluar`.`tanggal`)");
        return $this->db->get();
	}

	public function get_barang_keluar_group_date($bulan)
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->order_by('id_barang_keluar', 'ASC');
		$this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $bulan);
        return $this->db->get();
	}

	public function insert_barang($data)
	{
		$this->db->insert('barang', $data);
	}

	public function get_barang_by_id($id_barang)
	{
		return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
	}

	public function update_barang($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->update('barang', $data);
	}

	public function delete_barang($id_barang)
	{
		$this->db->delete('barang', ['id_barang' => $id_barang]);
	}

	public function insert_barang_masuk($data)
	{
		$this->db->insert('barang_masuk', $data);
	}

	public function get_barang_masuk_by_id($id_barang_masuk)
	{
		return $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id_barang_masuk])->row_array();
	}

	public function update_barang_masuk($data)
	{
		$this->db->where('id_barang_masuk', $data['id_barang_masuk']);
		$this->db->update('barang_masuk', $data);
	}

	public function delete_barang_masuk($id_barang_masuk)
	{
		$this->db->delete('barang_masuk', ['id_barang_masuk' => $id_barang_masuk]);
	}

	public function insert_barang_keluar($data)
	{
		$this->db->insert('barang_keluar', $data);
	}

	public function get_barang_keluar_by_id($id_barang_keluar)
	{
		return $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id_barang_keluar])->row_array();
	}

	public function update_barang_keluar($data)
	{
		$this->db->where('id_barang_keluar', $data['id_barang_keluar']);
		$this->db->update('barang_keluar', $data);
	}

	public function delete_barang_keluar($id_barang_keluar)
	{
		$this->db->delete('barang_keluar', ['id_barang_keluar' => $id_barang_keluar]);
	}
}
