<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['fill'] = true;
		if($this->input->get('referrer')){
			$data['referrer'] = $this->input->get('referrer');
		}
		$this->load->helper('url');
		$this->load->view('templates/header/headercore');
		$this->load->view('templates/header/headerstripe');
		$this->load->view('templates/header/headerend');
		$this->load->view('templates/body/bodystart');
		$this->load->view('templates/body/nav');
		$this->load->view('content/home', $data);
		$this->load->view('templates/footer/footer');
		$this->load->view('templates/body/bodyend');
		$this->load->view('templates/footer/htmlend');
	}
}
?>