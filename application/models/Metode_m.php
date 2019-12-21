<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Metode_m extends CI_Model{

    public function tampil_penjualan(){
        $query = $this->db->query(" SELECT year(penjualan.tgl_faktur) as tahun,MONTH(penjualan.tgl_faktur) as bulan ,SUM(data_penjualan.qty) as jumlah FROM `data_penjualan` INNER JOIN penjualan ON data_penjualan.no_faktur = penjualan.no_faktur GROUP BY  YEAR(penjualan.tgl_faktur),MONTH(penjualan.tgl_faktur)
                                    ");
        return $query->result();
    }
    public function tampil_barang(){
        $query = $this->db->query(" SELECT nama_bar FROM `data_penjualan` GROUP BY nama_bar asc
                                    ");
        return $query->result();
    }
    public function tampil_penjualan_id($nama_bar,$tahun,$bulan){
        $query = $this->db->query(" SELECT year(penjualan.tgl_faktur) as tahun,MONTH(penjualan.tgl_faktur) as bulan ,SUM(data_penjualan.qty) as jumlah FROM `data_penjualan` INNER JOIN penjualan ON data_penjualan.no_faktur = penjualan.no_faktur WHERE nama_bar = '$nama_bar' and penjualan.tgl_faktur between '2016-01-01' and '$tahun-$bulan-31' GROUP BY YEAR(penjualan.tgl_faktur),MONTH(penjualan.tgl_faktur)
                                    ");
        return $query->result();
    }
    
}