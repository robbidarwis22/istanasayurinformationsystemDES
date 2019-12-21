<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model {

    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('penjualan', $data);
    }

    public function get($id = null)
    {
        $this->db->from('penjualan');
        $this->db->join('user','user.user_id = penjualan.kasir');
        if($id != null) {
            $this->db->where('no_faktur', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function tampil_penjualan(){
		$hsl=$this->db->query("select * from penjualan order by penjualan_id desc");
		return $hsl;
    }
    
    public function simpan_penjualan($no_faktur,$tgl_faktur,$kasir,$jam_in,$dibayar,$kembali){
		$this->db->query("INSERT INTO tbl_jual (no_faktur,tgl_faktur,kasir,jam_in,dibayar,kembali) VALUES ('$no_faktur','$tgl_faktur','$kasir','$jam_in','$dibayar','$kembali')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'faktur' 			=>	$nofak,
				'kode_bar'		    =>	$item['kode_bar'],
				'nama_bar'  	    =>	$item['nama_bar'],
				'qty'	            =>	$item['qty'],
				'jml_beli'	        =>	$item['jml_beli'],
				'jml_jual'      	=>	$item['jml_jual'],
				'laba'		    	=>	$item['laba']
			);
			$this->db->insert('data_penjualan',$data);
			$this->db->query("update barang set stok=stok-'$item[qty]' where barang_id='$item[kode_bar]'");
		}
		return true;
	}

    public function add($post)
    {
        $params = [
            'tgl_faktur' => date('Y-m-d'),
            'kasir' => $post['kasir'],
            'jam_in' => date('H:i:s'),
            'dibayar' => $post['dibayar'],
            'kembali' => $post['kembali']
        ];
        $this->db->insert('penjualan', $params);
    }

    public function edit($post)
    {
        $params = [
            'no_faktur' => $post['id'],
            'tgl_faktur' => date('Y-m-d'),
            'kasir' => $post['kasir'],
            'jam_in' => date('H:i:s'),
            'dibayar' => $post['dibayar'],
            'kembali' => $post['kembali']
        ];
        $this->db->where('no_faktur', $post['id']);
        $this->db->update('penjualan', $params);
    }   

    public function del($id)
	{
		$this->db->where('no_faktur', $id);
		$this->db->delete('penjualan');
	}
    
   
}