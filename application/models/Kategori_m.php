<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model{

    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('kategori', $data);
    }

    public function get($id = null)
    {
        $this->db->from('kategori');
        if($id != null) {
            $this->db->where('kategori_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function tampil_kategori(){
		$hsl=$this->db->query("select * from kategori order by kategori_id desc");
		return $hsl;
	}

    public function add($post)
    {
        $params = [
            'kategori_nama' => $post['kategori_nama']
        ];
        $this->db->insert('kategori', $params);
    }

    public function edit($post)
    {
        $params = [
            'kategori_nama' => $post['kategori_nama']
        ];
        $this->db->where('kategori_id', $post['id']);
        $this->db->update('kategori', $params);
    }   

    public function del($id)
	{
		$this->db->where('kategori_id', $id);
		$this->db->delete('kategori');
	}
}