<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {
	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;


		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');

		//libraries for framework
		$this->load->helper('url');
		$this->base_url = base_url();
		$this->base_url_public = $this->base_url."public/lib/";

		$this->lib_css = [

		];
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}
}

//CLASE BASE Y OTRAS FUNCIONES
class CI_ControllerBase extends CI_Controller{
	public $base_url;
	public $base_url_public_js;
	public $base_url_public_css;
	public $base_url_public_lib;
	public $lib_css;
	public $lib_js;
	public $js;
	public $cs;
	public $title;
	public $number;
	public $putCss = [];
	public $putJS = [];
	public $messages = ["error"=>"", "success"=>"", "warning"=>""];
	public $response = ["data"=>"", "result"=>"", "msg"=>""];
	public $nombre_modulo;

	//variables user and login;
	public $user_name, $user_perfil, $user_id;

	public function __construct(){
		parent::__construct();

		//helpers
		$this->load->helper("url");
		$this->load->helper('cookie');
		$this->load->library('encrypt');
		$this->load->database();

		//urls
		$this->base_url = base_url();
		$this->base_url_public_js = $this->base_url."public/js/";
		$this->base_url_public_css = $this->base_url."public/css/";
		$this->base_url_public_lib = $this->base_url."public/lib/";

		$this->lib_css = [
			[

			],
			[
				//$this->base_url_public_lib."plugins/datatable/css/dataTables.bootstrap.min.css",
				//$this->base_url_public_lib."plugins/datatable/css/responsive.bootstrap.min.css"
			]
		];

		$this->lib_js = [
			[
				//$this->base_url_public_lib."plugins/select2/select2.full.min.js",
			],
			[
				/*$this->base_url_public_lib."plugins/datatable/js/jquery.dataTables.min.js",
				$this->base_url_public_lib."plugins/datatable/js/dataTables.bootstrap.min.js",
				$this->base_url_public_lib."plugins/datatable/js/dataTables.responsive.min.js",
				$this->base_url_public_lib."plugins/datatable/js/responsive.bootstrap.min.js",
				$this->base_url_public_lib."plugins/datatable/js/fnReloadAjax.js",
				$this->base_url_public_lib."plugins/datatable/js/jquery.dataTables.columnFilter.js"*/
			]
		];
	}


	public function addLibJs($lib){
		$this->putJS[] = $this->base_url_public_lib.$lib;
	}

	public function addJs($lib){
		$this->putJS[] = $this->base_url_public_js.$lib;
	}

	public function addLibCss($lib){
		$this->putCss[] = $this->base_url_public_lib.$lib;
	}

	public function addCss($lib){
		$this->putCss[] = $this->base_url_public_css.$lib;
	}

	public function setTempleate($title = '', $view, $var = '', $num = 0){
		$load_lib = ($num>2)? $load_lib = 1 : $load_lib = 0;

		foreach ($this->putCss as $key => $value) {
			$this->lib_css[$load_lib][] = $value;
		}
		foreach ($this->putJS as $key => $value) {
			$this->lib_js[$load_lib][] = $value;
		}

		//print_r($this->lib_js);exit;
		$this->title = ($title=="") ? $this->title = "Cansito" : $this->title = "Cansito | ".$title;
		$this->nombre_modulo = $title;

		switch ($num) {
			case 0:
				$this->load->view("head", array("title"=>$this->title, "lib_css"=>$this->lib_css[$load_lib], "class_body"=>"hold-transition skin-blue layout-top-nav layout-boxed"));
				$this->load->view($view, $var);
				$this->load->view("footer", array("lib_js"=>$this->lib_js[$load_lib]));
				break;

			case 1:
				$this->messages["error"] = $this->input->cookie("msg-error");
				//echo $this->input->cookie("msg-error");
				//print_r($this->messages);die;
				//echo $this->input->cookie("msg-error");die;
				//delete_cookie("msg-error");

				$this->load->view("head", array("title"=>$this->title, "lib_css"=>$this->lib_css[$load_lib], "class_body"=>"hold-transition login-page", "messages"=>$this->messages));
				$this->load->view($view, $var);
				$this->load->view("footer", array("lib_js"=>$this->lib_js[$load_lib]));
				break;

			case 2:
				$this->load->view("head", array("title"=>$this->title, "lib_css"=>$this->lib_css[$load_num], "class_body"=>"hold-transition lockscreen"));
				$this->load->view($view, $var);
				$this->load->view("footer", array("lib_js"=>$this->lib_js[$load_num]));
				break;

			case 3:
				if($this->input->cookie("sys_cansito_name_usu")){
					$this->load->view("head_admin", array(
						"title"=>$this->title,
						"nombre_modulo"=>$this->nombre_modulo,
						"lib_css"=>$this->lib_css[$load_lib],
						"class_body"=>"hold-transition sidebar-mini skin-blue",
						"menu"=>$this->getAcceso($this->encrypt->decode($this->input->cookie("sys_cansito_id_per"))),
						"fullname_usu"=>$this->encrypt->decode($this->input->cookie("sys_cansito_fullname_usu")),
						"id_usu"=>$this->encrypt->decode($this->input->cookie("sys_cansito_id_usu")),
						"id_per"=>$this->encrypt->decode($this->input->cookie("sys_cansito_id_per")),
						"name_per"=>$this->encrypt->decode($this->input->cookie("sys_cansito_name_per"))
					));

					$this->load->view($view, $var);
					$this->load->view("footer_admin", array("lib_js"=>$this->lib_js[$load_lib]));
				}else{
					redirect($this->base_url."admin", "refresh");
				}
				break;

			case 4:
				$this->load->view("head_admin", array(
						"title"=>$this->title,
						"lib_css"=>$this->lib_css[$load_lib],
						"class_body"=>"hold-transition sidebar-mini skin-blue"
				));

				$this->load->view($view, $var);
				$this->load->view("footer_admin", array("lib_js"=>$this->lib_js[$load_lib]));
				break;
		}

	}

	public function validateAccess($data){
		$obj = $this->db->from("persona")
		->join("perfil", "persona.id_per = perfil.id_per")
		->where("name_usu", $data["name_usu"])
		->where("pass_usu", $data["pass_usu"])
		->where("persona.estado", "A")
		->get()->result();

		if(count($obj)>0){
			$this->input->set_cookie("id_pers", $this->encrypt->encode($obj[0]->id_pers), 28800);
			$this->input->set_cookie("name_usu", $this->encrypt->encode($obj[0]->nombre_pers), 28800);
			$this->input->set_cookie("fullname_usu", $this->encrypt->encode($obj[0]->nombre_pers), 28800);
			$this->input->set_cookie("name_per", $this->encrypt->encode($obj[0]->name_per), 28800);
			$this->input->set_cookie("id_per", $this->encrypt->encode($obj[0]->id_per), 28800);
		}else{
			$this->input->set_cookie("msg-error", "Datos incorrectos", 1200);
		}
		//redirect(current_url(), 'refresh');
		redirect("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 'refresh');
	}

	public function getAcceso($per_id){
		$obj = $this->db->from("acceso")
		->join("modulo", "acceso.id_mod = modulo.id_mod")
		->where("acceso.id_per", (int)$per_id)
		->where("acceso.estado", 'A')
		->where("modulo.estado", 'A')
		->order_by("modulo.orden", "ASC")
		->get()->result();
		return $obj;
	}
}
