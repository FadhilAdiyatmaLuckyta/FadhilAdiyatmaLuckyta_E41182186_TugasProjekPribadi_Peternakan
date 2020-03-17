<?php 

class dashboard_admin extends CI_Controller{
    public function index()
    {
        //untuk menampilkan template yang sudah download
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('template_admin/footer');

    }
}