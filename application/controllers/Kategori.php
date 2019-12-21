<?php defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->load->model('kategori_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->kategori_m->get();
		$this->template->load('template', 'kategori/kategori_data', $data);
	}

	// public function add()
	// {
	// 	$this->form_validation->set_rules('kategori_nama','Nama Kategori','required|is_unique[kategori.kategori_nama]');
	
	// 	$this->form_validation->set_message('required','%s masih kosong, Silahkan diisi');
	// 	$this->form_validation->set_message('is_unique','%s Inputan harus bersifat unique');
	// 	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	// 	if($this->form_validation->run() == FALSE){
	// 		$this->template->load('template', 'kategori/kategori_form_add');
	// 	}else{
	// 		$post = $this->input->post(null, TRUE);
	// 		$this->kategori_m->add($post);
	// 		if($this->db->affected_rows() > 0){
	// 			echo "<script>alert('Data berhasil disimpan');</script>";
	// 		}
	// 		echo "<script>window.location='".site_url('kategori')."';</script>";
	// 	}
	// }

	public function add()
	{
		$kategori = new stdClass();
		$kategori->kategori_id = null;
		$kategori->kategori_nama = null;
		$data = array(
			'page' => 'add',
			'row' => $kategori
		);
		$this->template->load('template','kategori/kategori_form', $data);
	}

	public function edit($id)
	{
		$query = $this->kategori_m->get($id);
		if($query->num_rows() > 0) {
			$kategori = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $kategori
			);
			$this->template->load('template','kategori/kategori_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('kategori')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->kategori_m->add($post);
		}else if(isset($_POST['edit'])) {
			$this->kategori_m->edit($post);
		} 
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('kategori');
	}
	

	// public function edit($id)
	// {
	// 	$this->form_validation->set_rules('kategori_nama','Nama Kategori','required|callback_kategori_check');
		
	// 	$this->form_validation->set_message('required','%s masih kosong, Silahkan diisi');
	// 	$this->form_validation->set_message('is_unique','%s Inputan harus bersifat unique');
		
	// 	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	// 	if($this->form_validation->run() == FALSE){
	// 		$query = $this->kategori_m->get($id);
	// 		if($query->num_rows() > 0) {
	// 			$data['row'] = $query->row();
	// 			$this->template->load('template', 'kategori/kategori_form_edit', $data);
	// 		} else {
	// 			echo "<script>alert('Data tidak ditemukan');";
	// 			echo "window.location='".site_url('kategori')."';</script>";
	// 		}
	// 	}else{
	// 		$post = $this->input->post(null, TRUE);
	// 		$this->kategori_m->edit($post);
	// 		if($this->db->affected_rows() > 0){
	// 			echo "<script>alert('Data berhasil disimpan');</script>";
	// 		}
	// 		echo "<script>window.location='".site_url('kategori')."';</script>";
	// 	}
	// }

	public function kategori_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM kategori WHERE kategori_nama = '$post[kategori_nama]' AND kategori_id != '$post[kategori_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('kategori_check','%s ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function del()
	{
		$id = $this->input->post('kategori_id');
		$this->kategori_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('kategori');
	}

	public function upload() {
    	 // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            
            $this->template->load('template', 'kategori/kategori_data', $data);
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
	            $createArray = array('kategori_nama');
	            $makeArray = array('kategori_nama' => 'kategori_nama');
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
	                    $kategori_nama = $SheetDataKey['kategori_nama'];

	                    $kategori_nama = filter_var(trim($allDataInSheet[$i][$kategori_nama]), FILTER_SANITIZE_STRING);

	                    $fetchData[] = array('kategori_nama' => $kategori_nama);
	                }   
	                $data['dataInfo'] = $fetchData;
	                $this->kategori_m->setBatchImport($fetchData);
	                $this->kategori_m->importData();
	            } else {
	                $this->session->set_flashdata('danger','Please choose a file has a same column.');
					redirect('kategori');
	            }
	            if($this->db->affected_rows() > 0){
					$this->session->set_flashdata('success','Data berhasil disimpan');
				}
				redirect('kategori');
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
				redirect('kategori');
            }
        }else{
			$this->session->set_flashdata('danger','Please choose a file.');
			redirect('kategori');
        }
    }
}