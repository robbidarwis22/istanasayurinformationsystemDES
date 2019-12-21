<?php defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Penjualan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->load->model(['penjualan_m','user_m','barang_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->penjualan_m->get();
		$this->template->load('template', 'penjualan/penjualan_data', $data);
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('no_faktur,tgl_faktur,user.name,jam_in,dibayar,kembali')->from('penjualan')->join('user','user.user_id = penjualan.kasir');
		echo $this->datatables->generate();
	}

	// public function get_barang(){
	// 	$kobar=$this->input->post('kode_brg');
	// 	$x['brg']=$this->m_barang->get_barang($kobar);
	// 	$this->load->view('admin/v_detail_barang_jual',$x);
	// }

	// public function add_to_cart(){
	// 		$kobar=$this->input->post('kode_brg');
	// 		$produk=$this->m_barang->get_barang($kobar);
	// 		$i=$produk->row_array();
	// 		$data = array(
	// 			   'id'       => $i['barang_id'],
	// 			   'name'     => $i['barang_nama'],
	// 			   'satuan'   => $i['barang_satuan'],
	// 			   'harpok'   => $i['barang_harpok'],
	// 			   'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
	// 			   'disc'     => $this->input->post('diskon'),
	// 			   'qty'      => $this->input->post('qty'),
	// 			   'amount'	  => str_replace(",", "", $this->input->post('harjul'))
	// 			);
	// 	if(!empty($this->cart->total_items())){
	// 		foreach ($this->cart->contents() as $items){
	// 			$id=$items['id'];
	// 			$qtylama=$items['qty'];
	// 			$rowid=$items['rowid'];
	// 			$kobar=$this->input->post('kode_brg');
	// 			$qty=$this->input->post('qty');
	// 			if($id==$kobar){
	// 				$up=array(
	// 					'rowid'=> $rowid,
	// 					'qty'=>$qtylama+$qty
	// 					);
	// 				$this->cart->update($up);
	// 			}else{
	// 				$this->cart->insert($data);
	// 			}
	// 		}
	// 	}else{
	// 		$this->cart->insert($data);
	// 	}
	
	// 		redirect('admin/penjualan');
	// }

	public function add()
	{
		$penjualan = new stdClass();
		$penjualan->no_faktur = null;
		$penjualan->tgl_faktur = null;
		$penjualan->kasir = null;
		$penjualan->jam_in = null;
		$penjualan->dibayar = null;
		$penjualan->kembali = null;

		$query_user = $this->user_m->get();
		
		// $unit[null] = '-Pilih Unit-';
		// foreach($query_unit->result() as $unt){
		// 	$unit[$unt->unit_id] = $unt->unit_nama;
		// }

		$data = array(
			'page' => 'add',
			'row' => $penjualan,
			'user' => $query_user,
			// 'unit' => $unit, 'selectedunit' => null,
		);
		$this->template->load('template','penjualan/penjualan_form', $data);
	}

	public function edit($id)
	{
		$query_user = $this->user_m->get();
		
		// $unit[null] = '-Pilih Unit-';
		// foreach($query_unit->result() as $unt){
		// 	$unit[$unt->unit_id] = $unt->unit_nama;
		// }
		$query = $this->penjualan_m->get($id);
		if($query->num_rows() > 0) {
			$penjualan = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $penjualan,
				'user' => $query_user,
				// 'unit' => $unit, 'selectedunit' => null ,
			);
			$this->template->load('template','penjualan/penjualan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('penjualan')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->penjualan_m->add($post);
		}else if(isset($_POST['edit'])) {
			$this->penjualan_m->edit($post);
		} 
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('penjualan');
	}

	public function penjualan_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM penjualan WHERE penjualan_nama = '$post[penjualan_nama]' AND penjualan_id != '$post[penjualan_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('penjualan_check','%s ini sudah dipakai, silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function del($id)
	{
		$this->penjualan_m->del($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('penjualan');
	}

	public function upload() {
		// Load form validation library
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
		if($this->form_validation->run() == false) {
		   
		   $this->template->load('template', 'penjualan/penjualan_data', $data);
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
			   $createArray = array('no_faktur','tgl_faktur','kasir','jam_in','dibayar','kembali');
			   $makeArray = array('no_faktur' => 'no_faktur','tgl_faktur' => 'tgl_faktur','kasir' => 'kasir','jam_in' => 'jam_in','dibayar' => 'dibayar','kembali' => 'kembali');
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
					   $tgl_faktur = $SheetDataKey['tgl_faktur'];
					   $kasir = $SheetDataKey['kasir'];
					   $jam_in = $SheetDataKey['jam_in'];
					   $dibayar = $SheetDataKey['dibayar'];
					   $kembali = $SheetDataKey['kembali'];

					   $no_faktur = filter_var(trim($allDataInSheet[$i][$no_faktur]), FILTER_SANITIZE_STRING);
					   $tgl_faktur = filter_var(trim($allDataInSheet[$i][$tgl_faktur]), FILTER_SANITIZE_STRING);
					   $kasir = filter_var(trim($allDataInSheet[$i][$kasir]), FILTER_SANITIZE_STRING);
					   $jam_in = filter_var(trim($allDataInSheet[$i][$jam_in]), FILTER_SANITIZE_STRING);
					   $dibayar = filter_var(trim($allDataInSheet[$i][$dibayar]), FILTER_SANITIZE_STRING);
					   $kembali = filter_var(trim($allDataInSheet[$i][$kembali]), FILTER_SANITIZE_STRING);
					   $fetchData[] = array('no_faktur' => $no_faktur,'tgl_faktur' => $tgl_faktur,'kasir' => $kasir,'jam_in' => $jam_in,'dibayar' => $dibayar,'kembali' => $kembali);
				   }   
				   $data['dataInfo'] = $fetchData;
				   $this->penjualan_m->setBatchImport($fetchData);
				   $this->penjualan_m->importData();
			   } else {
				   $this->session->set_flashdata('danger','Please choose a file has a same column.');
				   redirect('penjualan');
			   }
			   if($this->db->affected_rows() > 0){
				   $this->session->set_flashdata('success','Data berhasil disimpan');
			   }
			   redirect('penjualan');
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
			   redirect('penjualan');
		   }
	   }else{
		   $this->session->set_flashdata('danger','Please choose a file.');
		   redirect('penjualan');
	   }
   }
}
