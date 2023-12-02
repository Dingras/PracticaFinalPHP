<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
        parent :: __construct();
        $this->load->model("user_model");
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

    public function login()
	{
		$user = $this->input->post("user");
		$password = $this->input->post("password");
		$result = $this->user_model->auth($user,$password);
		if (is_numeric($result)){
			$this->session->set_userdata(["user_id" => $result]);
			redirect("Task");
		}else{
			$error["error"]="Las credenciales ingresadas son invalidas, intente nuevamente.";
			$this->load->view('header');
			$this->load->view('login',$error);
			$this->load->view('footer');
		}
	}
	public function exit(){
		$this->session->sess_destroy();
		redirect("Auth");
	}
}