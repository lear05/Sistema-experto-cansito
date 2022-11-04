<?php
class Files_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper("file");
	}

	function upload($file, $name, $ruta = "", $type = "gif|jpg|png"){
		$ext = explode('.', $file['name']);
        $img = 'img_'.rand('0', '9999').'.'.$ext[1];
        $file_element_name = $name;
        $config['upload_path'] = './public/img/'.$ruta;
        $config['allowed_types'] = $type;
        //$config['max_size'] = 1024 * 8;
        //$config['max_width'] = '2024';
        //$config['max_height'] = '2008';
        $config['file_name'] = $img;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_element_name))
        {
            return array("result"=>false, "msg"=>$this->upload->display_errors());
        }else{
        	return array("result"=>true, "msg"=>$img);
        }
	}

	function delete_file($file){
		if(unlink("./public/img/".$file)){
			return true;
		}else{
			return false;
		}
	}
}
?>