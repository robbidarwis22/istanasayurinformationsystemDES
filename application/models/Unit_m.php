<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model{

    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('unit', $data);
    }

    public function get($id = null)
    {
        $this->db->from('unit');
        if($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function tampil_unit(){
		$hsl=$this->db->query("select * from unit order by unit_id desc");
		return $hsl;
	}

    public function add($post)
    {
        $params['unit_nama'] = $post['unit_nama'];
        $this->db->insert('unit', $params);
    }

    public function edit($post)
    {
        $params['unit_nama'] = $post['unit_nama'];
        $this->db->where('unit_id', $post['unit_id']);
        $this->db->update('unit', $params);
    }

    public function del($id)
	{
		$this->db->where('unit_id', $id);
		$this->db->delete('unit');
    }
}