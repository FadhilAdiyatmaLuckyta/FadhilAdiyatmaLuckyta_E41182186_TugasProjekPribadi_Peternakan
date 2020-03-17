<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		//menampilkan models yang sudah kita buat di models dengan nama m_login
		$this->load->model('m_login');

	}

	function index(){
		//menampilkan view yang bernama v_login
		$this->load->view('v_login');
	}

	function aksi_login(){
		//pada aksi login ini menampilkan username dan password
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
			//pada ii yang dicek hanyalah admin 
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			//pada bagian setelah login akan langsung di tampilkan halaman admin pada data_hewan

			redirect(base_url("admin/data_hewan"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		//fungsi logout kita kita menekan tombol logout maka akan dikembalikan lagi login	
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}