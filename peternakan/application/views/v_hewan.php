<?php  

    class Data_hewan extends CI_Controller {

        function __construct()
        {
        parent::__construct();
    
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }

        public function index()
        {
        $data['hewan'] = $this->model_hewan->tampil_data()->result();   
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_hewan', $data);
        $this->load->view('template_admin/footer');
        $this->load->view('v_hewan');
        }

        public function tambah_aksi()
        {
            $jenis_hewan    = $this->input->post('jenis_hewan');
            $harga_hewan    = $this->input->post('harga_hewan');
            $Stok            = $this->input->post('Stok');
            $Kategori       = $this->input->post('Kategori');
            $jenis_hewan    = $this->input->post('jenis_hewan');
            $gambar         = $_FILES['gambar']['name'];
                if ($gambar =''){}else{
                    $confiq ['upload_path'] = './uploads';
                    $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';

                    $this->load->library('upload', $confiq);
                    if (!$this->upload->do_upload('gambar')){
                        echo "Gambar Yang Anda Upload Gagal Rek!!";
                    }else{
                        $gambar=$this->upload->data('file_name');
                    }
                }
            $data = array(
                'jenis_hewan'   => $jenis_hewan,
                'harga_hewan'   => $harga_hewan,
                'Stok'          => $Stok,
                'Kategori'      => $Kategori,
                'gambar'        => $gambar 
            );

            $this->model_hewan->tambah_hewan($data, 'tb_hewan');
            redirect('admin/data_hewan/index');
        }

        public function edit($id){
            $where = array('id_hewan' => $id);
            $data['hewan'] = $this->model_hewan->edit_hewan($where, 'tb_hewan')->result();

            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/edit_hewan', $data);
            $this->load->view('template_admin/footer');
        }

        public function update(){
            $id             =$this->input->post('id_hewan'); 
            $jenis_hewan    =$this->input->post('jenis_hewan'); 
            $harga_hewan    =$this->input->post('harga_hewan'); 
            $Stok           =$this->input->post('Stok'); 
            $Kategori       =$this->input->post('Kategori'); 

            $data = array(

                'jenis_hewan'       => $jenis_hewan,
                'harga_hewan'       => $harga_hewan,
                'Stok'              => $Stok,
                'Kategori'          => $Kategori
            );

            $where = array(
                'id_hewan' => $id
            );

            $this->model_hewan->update_data($where,$data,'tb_hewan');
            redirect('admin/data_hewan/index');
        }

        public function hapus ($id){

            $where = array ('id_hewan' => $id);
            $this->model_hewan->hapus_data($where, 'tb_hewan');
            redirect('admin/data_hewan/index');
        }


   
    }
