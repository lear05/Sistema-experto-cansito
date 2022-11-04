<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_ControllerBase {
	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if($this->input->cookie("sys_cansito_id_per")){
			$this->setTempleate("Home", "admin", "", 3);
		}else{
			if($this->input->method(TRUE)=='POST'){
				$data = $this->input->post();
				$data["pass_usu"] = md5(md5(md5($data["pass_usu"])));
				$this->validateAccess($data);
			}else{
				$this->setTempleate('', 'login', '', 1);
			}
		}
		//$this->setTempleate('', 'module', '', 3);
	}

	public function salir(){
		delete_cookie("name_usu");
		delete_cookie("id_usu");
		delete_cookie("name_per");
		delete_cookie("fullname_usu");
		delete_cookie("id_per");
		redirect($this->base_url."admin", "refresh");
	}
}
