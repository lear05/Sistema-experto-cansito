<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	require_once APPPATH."/third_party/mpdf/mpdf.php";
	class Pdf extends mPDF {
	    public function __construct() {
	        parent::__construct();
	    }
	}
?>
