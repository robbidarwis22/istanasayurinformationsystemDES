<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detailpenjualan_m extends CI_Model {

    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('data_penjualan', $data);
    }

    public function get($id = null)
    {
        $this->db->from('data_penjualan');
        if($id != null) {
            $this->db->where('penjualan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function tampil_penjualan(){
		$hsl=$this->db->query("select * from penjualan order by penjualan_id desc");
		return $hsl;
	}

    public function add($post)
    {
        $params = [
            'penjualan_id' => $post['penjualan_id'],
            'faktur' => $post['faktur'],
            'no' => $post['no'],
            'kode_bar' => $post['kode_bar'],
            'qty' => $post['qty'],
            'jml_beli' => $post['jml_beli'],
            'jml_jual' => $post['jml_jual'],
            'laba' => $post['laba']
        ];
        $this->db->insert('data_penjualan', $params);
    }

    public function edit($post)
    {
        $params = [
            'penjualan_id' => $post['penjualan_id'],
            'faktur' => $post['faktur'],
            'no' => $post['no'],
            'kode_bar' => $post['kode_bar'],
            'qty' => $post['qty'],
            'jml_beli' => $post['jml_beli'],
            'jml_jual' => $post['jml_jual'],
            'laba' => $post['laba']
        ];
        $this->db->where('penjualan_id', $post['id']);
        $this->db->update('data_penjualan', $params);
    }   

    public function del($id)
	{
		$this->db->where('penjualan_id', $id);
		$this->db->delete('data_penjualan');
	}
    
   
}