<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {

    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('barang', $data);
    }

    public function get($id = null)
    {
        $this->db->from('barang');
        $this->db->join('kategori','kategori.kategori_id = barang.kategori');
        $this->db->join('unit','unit.unit_id = barang.unit');
        if($id != null) {
            $this->db->where('barang_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function tampil_barang(){
		$hsl=$this->db->query("select * from barang order by barang_id desc");
		return $hsl;
	}

    public function add($post)
    {
        $params = [
            'barang_id' => $post['id'],
            'nama_bar' => $post['nama_bar'],
            'kategori' => $post['kategori'],
            'unit' => $post['unit'],
            'harga_beli' => $post['harga_beli'],
            'harga_jual' => $post['harga_jual'],
            'stok' => $post['stok']
        ];
        $this->db->insert('barang', $params);
    }

    public function edit($post)
    {
        $params = [
            'barang_id' => $post['id'],
            'nama_bar' => $post['nama_bar'],
            'kategori' => $post['kategori'],
            'unit' => $post['unit'],
            'harga_beli' => $post['harga_beli'],
            'harga_jual' => $post['harga_jual'],
            'stok' => $post['stok']
        ];
        $this->db->where('barang_id', $post['id']);
        $this->db->update('barang', $params);
    }   

    public function del($id)
	{
		$this->db->where('barang_id', $id);
		$this->db->delete('barang');
	}
    
   
}