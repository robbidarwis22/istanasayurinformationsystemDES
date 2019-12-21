<?php defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Detailpenjualan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->load->model(['detailpenjualan_m','barang_m','penjualan_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->detailpenjualan_m->get();
		$this->template->load('template', 'detailpenjualan/detailpenjualan_data', $data);
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('penjualan_id,no_faktur,no,kode_bar,nama_bar,qty,jml_beli,jml_jual,laba')->from('data_penjualan');
		echo $this->datatables->generate();
	}

	public function add()
	{
		$detailpenjualan = new stdClass();
		$detailpenjualan->penjualan_id = null;
		$detailpenjualan->no_faktur = null;
		$detailpenjualan->no = null;
		$detailpenjualan->kode_bar = null;
		$detailpenjualan->qty = null;
		$detailpenjualan->jml_beli = null;
		$detailpenjualan->jml_jual = null;
		$detailpenjualan->laba = null;

		$query_barang = $this->barang_m->get();
		$query_penjualan = $this->penjualan_m->get();
		
		// $unit[null] = '-Pilih Unit-';
		// foreach($query_unit->result() as $unt){
		// 	$unit[$unt->unit_id] = $unt->unit_nama;
		// }

		$data = array(
			'page' => 'add',
			'row' => $detailpenjualan,
			'barang' => $query_barang,
			'penjualan' => $query_penjualan,
			// 'unit' => $unit, 'selectedunit' => null,
		);
		$this->template->load('template','detailpenjualan/detailpenjualan_form', $data);
	}

	public function edit($id)
	{
		$query_barang = $this->barang_m->get();
		$query_penjualan = $this->penjualan_m->get();
		
		// $unit[null] = '-Pilih Unit-';
		// foreach($query_unit->result() as $unt){
		// 	$unit[$unt->unit_id] = $unt->unit_nama;
		// }
		$query = $this->detailpenjualan_m->get($id);
		if($query->num_rows() > 0) {
			$detailpenjualan = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $detailpenjualan,
				'barang' => $query_barang,
				'penjualan' => $query_penjualan,
				// 'unit' => $unit, 'selectedunit' => null ,
			);
			$this->template->load('template','detailpenjualan/detailpenjualan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('detailpenjualan')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->detailpenjualan_m->add($post);
		}else if(isset($_POST['edit'])) {
			$this->detailpenjualan_m->edit($post);
		} 
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('detailpenjualan');
	}

	public function detailpenjualan_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM detailpenjualan WHERE detailpenjualan_nama = '$post[detailpenjualan_nama]' AND detailpenjualan_id != '$post[detailpenjualan_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('detailpenjualan_check','%s ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function del($id)
	{
		
		$this->detailpenjualan_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('detailpenjualan');
	}

	public function upload() {
		// Load form validation library
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
		if($this->form_validation->run() == false) {
		   
		   $this->template->load('template', 'detailpenjualan/ddetailpenjualan_data', $data);
		} else {
		   // If file uploaded
		   if(!empty($_FILES['fileURL']['name'])) { 
			   // get file extension
			   $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

			   if($extension == 'csv'){
				   $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			   } elseif($extension == 'xlsx') {
				   $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			   } else {
				   $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			   }
			   // file path
			   $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
			   $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
		   
			   // array Count
			   $arrayCount = count($allDataInSheet);
			   $flag = 0;
			   $createArray = array('no_faktur','no','kode_bar','nama_bar','qty','jml_beli','jml_jual','laba');
			   $makeArray = array('no_faktur' => 'no_faktur','no' => 'no','kode_bar' => 'kode_bar','nama_bar' => 'nama_bar','qty' => 'qty','jml_beli' => 'jml_beli','jml_jual' => 'jml_jual','laba' => 'laba');
			   $SheetDataKey = array();
			   foreach ($allDataInSheet as $dataInSheet) {
				   foreach ($dataInSheet as $key => $value) {
					   if (in_array(trim($value), $createArray)) {
						   $value = preg_replace('/\s+/', '', $value);
						   $SheetDataKey[trim($value)] = $key;
					   } 
				   }
			   }
			   $dataDiff = array_diff_key($makeArray, $SheetDataKey);
			   if (empty($dataDiff)) {
				   $flag = 1;
			   }
			   // match excel sheet column
			   if ($flag == 1) {
				   for ($i = 2; $i <= $arrayCount; $i++) {
					   $addresses = array();
					   $no_faktur = $SheetDataKey['no_faktur'];
					   $no = $SheetDataKey['no'];
					   $kode_bar = $SheetDataKey['kode_bar'];
					   $nama_bar = $SheetDataKey['nama_bar'];
					   $qty = $SheetDataKey['qty'];
					   $jml_beli = $SheetDataKey['jml_beli'];
					   $jml_jual = $SheetDataKey['jml_jual'];
					   $laba = $SheetDataKey['laba'];

					   $no_faktur = filter_var(trim($allDataInSheet[$i][$no_faktur]), FILTER_SANITIZE_STRING);
					   $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
					   $kode_bar = filter_var(trim($allDataInSheet[$i][$kode_bar]), FILTER_SANITIZE_STRING);
					   $nama_bar = filter_var(trim($allDataInSheet[$i][$nama_bar]), FILTER_SANITIZE_STRING);
					   $qty = filter_var(trim($allDataInSheet[$i][$qty]), FILTER_SANITIZE_STRING);
					   $jml_beli = filter_var(trim($allDataInSheet[$i][$jml_beli]), FILTER_SANITIZE_STRING);
					   $jml_jual = filter_var(trim($allDataInSheet[$i][$jml_jual]), FILTER_SANITIZE_STRING);
					   $fetchData[] = array('no_faktur' => $no_faktur,'no' => $no,'kode_bar' => $kode_bar,'nama_bar' => $nama_bar,'qty' => $qty,'jml_beli' => $jml_beli,'jml_jual' => $jml_jual,'laba' => $laba);
				   }   
				   $data['dataInfo'] = $fetchData;
				   $this->detailpenjualan_m->setBatchImport($fetchData);
				   $this->detailpenjualan_m->importData();
			   } else {
				   $this->session->set_flashdata('danger','Please choose a file has a same column.');
				   redirect('detailpenjualan');
			   }
			   if($this->db->affected_rows() > 0){
				   $this->session->set_flashdata('success','Data berhasil disimpan');
			   }
			   redirect('detailpenjualan');
		   }              
	   }
   }

   // checkFileValidation
   public function checkFileValidation($string) {
	 $file_mimes = array('text/x-comma-separated-values', 
		 'text/comma-separated-values', 
		 'application/octet-stream', 
		 'application/vnd.ms-excel', 
		 'application/x-csv', 
		 'text/x-csv', 
		 'text/csv', 
		 'application/csv', 
		 'application/excel', 
		 'application/vnd.msexcel', 
		 'text/plain', 
		 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
	 );
	 if(isset($_FILES['fileURL']['name'])) {
		   $arr_file = explode('.', $_FILES['fileURL']['name']);
		   $extension = end($arr_file);
		   if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
			   return true;
		   }else{
			   $this->session->set_flashdata('danger','Please choose correct file.');
			   redirect('detailpenjualan');
		   }
	   }else{
		   $this->session->set_flashdata('danger','Please choose a file.');
		   redirect('detailpenjualan');
	   }
   }
}

