<?php

class model_hewan extends CI_Model{

    //membuat fungsi yang kita tadi panggil pada controller

    public function tampil_data(){

        return $this->db->get('tb_hewan');
    }

    public function tambah_hewan($data,$table){

        $this->db->insert($table,$data);
    }

    public function edit_hewan($where,$table){

        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){

        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table){

        $this->db->where($where);
        $this->db->delete($table);        
    }
}