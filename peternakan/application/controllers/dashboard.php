<?php

class dashboard extends CI_Controller{

    public function index()
    {
        $data['hewan'] = $this->model_hewan->tampil_data()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');

        

        

        

      

    }

}