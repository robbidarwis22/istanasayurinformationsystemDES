<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metode extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->library('session');
	    $this->load->helper('url');
	    $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->model('barang_m');
		$this->load->model('unit_m');
		$this->load->model('kategori_m');
		$this->load->model('metode_m');
		$this->load->library('form_validation');
		$data['data']=$this->barang_m->tampil_barang();
		$data['kat']=$this->kategori_m->tampil_kategori();
		$data['kat2']=$this->kategori_m->tampil_kategori();
		$data['uni']=$this->unit_m->tampil_unit();
		$data['uni2']=$this->unit_m->tampil_unit();
	}

	public function index()
	{
		$data['tampil']=$this->metode_m->tampil_penjualan();
		$this->template->load('template', 'metode/metode_data',$data);
	}
	public function peramalan()
	{
		$data['tampil']=$this->metode_m->tampil_penjualan();
		$data['barang']=$this->metode_m->tampil_barang();
		$this->template->load('template', 'metode/peramalan',$data);
	}
	public function hasil_peramalan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$nama_bar = $this->input->post('nama_bar');
		$data = array(
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun'),
				'nama_bar' => $this->input->post('nama_bar')
				);
		$data['tampil']=$this->metode_m->tampil_penjualan();
		$data['tampil_id']=$this->metode_m->tampil_penjualan_id($nama_bar,$tahun,$bulan);
		$this->template->load('template2', 'metode/hasil_peramalan',$data);
	}
	public function detail_mape()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$nama_bar = $this->input->post('nama_bar');
		$data = array(
			'bulan' => $this->input->post('bulan'),
			'tahun' => $this->input->post('tahun'),
			'nama_bar' => $this->input->post('nama_bar')
			);
		// $nama_bar = "SAWI CAISIM MANIS";
		// $data['tampil']=$this->metode_m->tampil_penjualan();
		$data['tampil_id']=$this->metode_m->tampil_penjualan_id($nama_bar,$tahun,$bulan);
		$this->template->load('template', 'metode/detail_mape',$data);
	}

}

/* End of file Metode.php */
/* Location: ./application/controllers/Metode.php */