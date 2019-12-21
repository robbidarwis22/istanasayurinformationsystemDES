<?php defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->load->model(['barang_m','unit_m','kategori_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->barang_m->get();
		$this->template->load('template', 'barang/barang_data', $data);
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('barang_id,nama_bar,kategori.kategori_nama,unit.unit_nama,harga_beli,harga_jual,stok')->from('barang')->join('kategori','kategori.kategori_id = barang.kategori')->join('unit','unit.unit_id = barang.unit');
		echo $this->datatables->generate();
	}

	public function add()
	{
		$barang = new stdClass();
		$barang->barang_id = null;
		$barang->nama_bar = null;
		$barang->kategori = null;
		$barang->unit = null;
		$barang->harga_beli = null;
		$barang->harga_jual = null;
		$barang->stok = null;

		$query_kategori = $this->kategori_m->get();
		
		$query_unit = $this->unit_m->get();
		// $unit[null] = '-Pilih Unit-';
		// foreach($query_unit->result() as $unt){
		// 	$unit[$unt->unit_id] = $unt->unit_nama;
		// }

		$data = array(
			'page' => 'add',
			'row' => $barang,
			'kategori' => $query_kategori,
			// 'unit' => $unit, 'selectedunit' => null,
			'unit' => $query_unit,
		);
		$this->template->load('template','barang/barang_form', $data);
	}

	public function edit($id)
	{
		$query_kategori = $this->kategori_m->get();
		
		$query_unit = $this->unit_m->get();
		// $unit[null] = '-Pilih Unit-';
		// foreach($query_unit->result() as $unt){
		// 	$unit[$unt->unit_id] = $unt->unit_nama;
		// }
		$query = $this->barang_m->get($id);
		if($query->num_rows() > 0) {
			$barang = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $barang,
				'kategori' => $query_kategori,
				'unit' => $query_unit,
				// 'unit' => $unit, 'selectedunit' => null ,
			);
			$this->template->load('template','barang/barang_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('barang')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->barang_m->add($post);
		}else if(isset($_POST['edit'])) {
			$this->barang_m->edit($post);
		} 
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('barang');
	}

	public function barang_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM barang WHERE barang_nama = '$post[barang_nama]' AND barang_id != '$post[barang_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('barang_check','%s ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function del($id)
	{
		$this->barang_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('barang');
	}

	public function upload() {
		// Load form validation library
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
		if($this->form_validation->run() == false) {
		   
		   $this->template->load('template', 'barang/barang_data', $data);
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
			   $createArray = array('barang_id','nama_bar','kategori','unit','harga_beli','harga_jual','stok');
			   $makeArray = array('barang_id' => 'barang_id','nama_bar' => 'nama_bar','kategori' => 'kategori','unit' => 'unit','harga_beli' => 'harga_beli','harga_jual' => 'harga_jual', 'stok' => 'stok');
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
					   $barang_id = $SheetDataKey['barang_id'];
					   $nama_bar = $SheetDataKey['nama_bar'];
					   $kategori = $SheetDataKey['kategori'];
					   $unit = $SheetDataKey['unit'];
					   $harga_beli = $SheetDataKey['harga_beli'];
					   $harga_jual = $SheetDataKey['harga_jual'];
					   $stok = $SheetDataKey['stok'];

					   $barang_id = filter_var(trim($allDataInSheet[$i][$barang_id]), FILTER_SANITIZE_STRING);
					   $nama_bar = filter_var(trim($allDataInSheet[$i][$nama_bar]), FILTER_SANITIZE_STRING);
					   $kategori = filter_var(trim($allDataInSheet[$i][$kategori]), FILTER_SANITIZE_STRING);
					   $unit = filter_var(trim($allDataInSheet[$i][$unit]), FILTER_SANITIZE_STRING);
					   $harga_beli = filter_var(trim($allDataInSheet[$i][$harga_beli]), FILTER_SANITIZE_STRING);
					   $harga_jual = filter_var(trim($allDataInSheet[$i][$harga_jual]), FILTER_SANITIZE_STRING);
					   $stok = filter_var(trim($allDataInSheet[$i][$stok]), FILTER_SANITIZE_STRING);
					   $fetchData[] = array('barang_id' => $barang_id,'nama_bar' => $nama_bar,'kategori' => $kategori,'unit' => $unit,'harga_beli' => $harga_beli,'harga_jual' => $harga_jual, 'stok' => $stok);
				   }   
				   $data['dataInfo'] = $fetchData;
				   $this->barang_m->setBatchImport($fetchData);
				   $this->barang_m->importData();
			   } else {
				   $this->session->set_flashdata('danger','Please choose a file has a same column.');
				   redirect('barang');
			   }
			   if($this->db->affected_rows() > 0){
				   $this->session->set_flashdata('success','Data berhasil disimpan');
			   }
			   redirect('barang');
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
			   redirect('barang');
		   }
	   }else{
		   $this->session->set_flashdata('danger','Please choose a file.');
		   redirect('barang');
	   }
   }
}
