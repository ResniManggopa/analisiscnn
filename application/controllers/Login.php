<?php

class Login extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Mcrud');
		$this->load->library(array('session'));
		$this->load->library('pagination');
		$this->load->library('email');
	}

	public function index()
	{
		$this->load->model('Mcrud');
		if($this->session->userdata('level')=='admin' && $this->session->userdata('aktif') == 1){
			redirect('admin');
		}else{
			$this->load->view('admin/view_login');
		}
	}

	function do_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->db->query('SELECT * FROM admin where username= "'.$username.'" AND password = "'.$password.'"');
		$p = $this->db->query('SELECT * FROM admin where username= "'.$username.'" AND password = "'.$password.'"')->row();
		$cek = $data->num_rows();
		if($cek > 0){
			$this->session->set_userdata(array(
				'level'=>'admin',
				'id_admin' => $p->id_admin,
				'username' => $p->username,
				'aktif' =>$p->aktif,
			));
			redirect('admin/upload');
		}else{
			$this->session->set_flashdata('gagal', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Username/Password salah !</div></div>');
			redirect('login');
		}
	}

	public function register()
	{
		$this->load->view('admin/registrasi');
	}

	public function registeradmin()
	{
		$nama_admin = $this->input->post('nama_admin');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$token = bin2hex(random_bytes(16));
		$data= array(
			'nama_admin' => $nama_admin,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'token' => $token
		);
		$this->Mcrud->insert_data('admin',$data);
		$this->_sendEmail($data['email'],$data['token']);
		$this->session->set_flashdata('berhasil', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Pendaftaran Berhasil, silahkan cek email untuk melakukan aktivasi</div></div>');
		redirect('login');
	}

	private function _sendEmail($email,$token)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'analisiscnn@gmail.com',
			'smtp_pass' => 'i z m e n b w u l m h x y x p s',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];
		$this->load->library('email',$config);
		$this->email->initialize($config);
		$this->email->from('analisiscnn@gmail.com','Analisis CNN');
		$this->email->to($email);
		$this->email->subject('Aktifasi Akun');
		$this->email->message('Klik link berikut untuk aktivasi akun : <a href="'.base_url().'login/verif?email='.$email.'&token='.$token.'">Aktivasi</a>');
		if ($this->email->send()) {
			return true;
		}else{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verif()
	{
		$email = $_GET['email'];
		$token = $_GET['token'];
		$responseEmail = $this->db->get_where('admin',array('email' => $email))->row_array();
		$responseToken = $this->db->get_where('admin',array('token' => $token))->row_array();
		if ($responseEmail && $responseToken) {
			$data = array('aktif' => 1);
			$this->db->where('email', $email);
			$this->db->where('token', $token);
			$this->db->update('admin', $data);
			redirect('login');
		} else {
			redirect('login/register');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('user', 'refresh');
	}
}
