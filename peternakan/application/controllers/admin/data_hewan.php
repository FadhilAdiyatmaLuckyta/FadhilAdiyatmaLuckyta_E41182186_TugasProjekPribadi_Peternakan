<?php  

    class Data_hewan extends CI_Controller {

        public function index()
        {
            //memampilkan template yang sudah kita download 
        $data['hewan'] = $this->model_hewan->tampil_data()->result();   
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_hewan', $data);
        $this->load->view('template_admin/footer');
        }

        public function tambah_aksi()
        {
            //untuk menampilkan data dari database sesuai dengan isi dari tabel database
            $jenis_hewan    = $this->input->post('jenis_hewan');
            $harga_hewan    = $this->input->post('harga_hewan');
            $Stok            = $this->input->post('Stok');
            $Kategori       = $this->input->post('Kategori');
            $jenis_hewan    = $this->input->post('jenis_hewan');
            $gambar         = $_FILES['gambar']['name'];
                //fungsi untuk menambahkan gambar saat kita mengupload data baru dan tempat uploadnya itu di uploads dengan format fotonya yaitu 
                if ($gambar =''){}else{
                    $confiq ['upload_path'] = './uploads';
                    $confiq ['allowed_types'] = 'jpg|jpeg|png|gif';
                    //fungsi ketika kita lagi upload gambar dan gmabr kita tidak sesuai dengan ketentuan 
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
            //ini adalah fungsi yang sudah kita buat di models yang datanya diambil daro tb_hewan, setelah kita berhasil nembah data baru maka kita akan di redirect ke admin/data_hewan
            $this->model_hewan->tambah_hewan($data, 'tb_hewan');
            redirect('admin/data_hewan/index');
        }

        public function edit($id){
            //ini adalah fungsi edit dimana fungsi edit_hewan itu kita sudah biat di models dan mengambil data nya itu berdasarkan data di database
            $where = array('id_hewan' => $id);
            $data['hewan'] = $this->model_hewan->edit_hewan($where, 'tb_hewan')->result();
            //menampilan template dan menampilkan admin/edit_hewan yang sudah kita buat di view admin
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/edit_hewan', $data);
            $this->load->view('template_admin/footer');
        }

        public function update(){
            //fungsi ini adalah fungsi update dari lama dan disesuaikan dengan isi field database kita
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
                //dicari berdasarkan id
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
