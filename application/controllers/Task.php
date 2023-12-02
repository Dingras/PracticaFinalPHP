<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function __construct(){
        parent :: __construct();
        $this->load->model("task_model");
    }

	public function index()
	{
		if ($this->session->userdata('user_id')){
			$data["tasks"]=$this->task_model->getAll($this->session->userdata('user_id'));
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('list_task',$data);
			$this->load->view('footer');
		}else{
			redirect("Auth");
		}
	}

	public function form($id=null){
			$this->load->view('header');
			$this->load->view('navbar');
			if (is_null($id)){
				$this->load->view('form_task');
			}else{
				$data["task"] = $this->task_model->getById($id);
				$this->load->view('form_task',$data);
			}
			$this->load->view('footer');
	}

    public function new()
	{
		if ($this->session->userdata('user_id')){
			$task["user_id"]=$this->session->userdata('user_id');
			$task["title"]=$this->input->post("title");
			$task["description"]=$this->input->post("description");
			$this->task_model->create($task);
		}
		redirect("Task");
	}

    public function edit($id)
	{

		$task["title"]=$this->input->post("title");
		$task["description"]=$this->input->post("description");
		$this->task_model->update($id,$task);
		redirect("Task");
	}

	public function change_state($id=null,$state=null){
		if (!is_null($id)){
			if ($state==0){
				$this->task_model->setState($id,1);
			}else{
				$this->task_model->setState($id,0);
			}
		}
		redirect("Task");
	}

    public function delete($id=null)
	{
		$this->task_model->delete($id);
		redirect("Task");
	}
}