<?php defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Unit extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->load->model('unit_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->unit_m->get();
		$this->template->load('template', 'unit/unit_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('unit_nama','Nama Unit','required|is_unique[unit.unit_nama]');
	
		$this->form_validation->set_message('required','%s masih kosong, Silahkan diisi');
		$this->form_validation->set_message('is_unique','%s Inputan harus bersifat unique');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE){
			$this->template->load('template', 'unit/unit_form_add');
		}else{
			$post = $this->input->post(null, TRUE);
			$this->unit_m->add($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('unit');
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('unit_nama','Nama Unit','required|callback_unit_check');
		
		$this->form_validation->set_message('required','%s masih kosong, Silahkan diisi');
		$this->form_validation->set_message('is_unique','%s Inputan harus bersifat unique');
		
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE){
			$query = $this->unit_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'unit/unit_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('unit')."';</script>";
			}
		}else{
			$post = $this->input->post(null, TRUE);
			$this->unit_m->edit($post);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('unit');
		}
	}

	public function unit_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM unit WHERE unit_nama = '$post[unit_nama]' AND unit_id != '$post[unit_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('unit_check','%s ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function del()
	{
		$id = $this->input->post('unit_id');
		$this->unit_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('unit');
	}

	public function upload() {
		// Load form validation library
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
		if($this->form_validation->run() == false) {
		   
		   $this->template->load('template', 'unit/unit_data', $data);
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
			   $createArray = array('unit_nama');
			   $makeArray = array('unit_nama' => 'unit_nama');
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
					   $unit_nama = $SheetDataKey['unit_nama'];

					   $unit_nama = filter_var(trim($allDataInSheet[$i][$unit_nama]), FILTER_SANITIZE_STRING);

					   $fetchData[] = array('unit_nama' => $unit_nama);
				   }   
				   $data['dataInfo'] = $fetchData;
				   $this->unit_m->setBatchImport($fetchData);
				   $this->unit_m->importData();
			   } else {
				$this->session->set_flashdata('danger','Please choose a file has a same column.');
				redirect('unit');
			   }
			   if($this->db->affected_rows() > 0){
				   $this->session->set_flashdata('success','Data berhasil disimpan');
			   }
			   redirect('unit');
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
				redirect('unit');
			}
		}else{
			$this->session->set_flashdata('danger','Please choose a file.');
			redirect('unit');
		}
   }
}