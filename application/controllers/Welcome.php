<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// load app model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model');
	}

	public function index()
	{
		$data['packages'] = $this->app_model->get_package_list();
		// print_r($data['packages']);
		$this->load->view('welcome_message', $data);
	}

	public function package()
	{	
		$data['packages'] = $this->app_model->get_package_list();
		$this->load->view('package_list', $data);
	}

	public function package_details($id)
	{
		$data['package'] = $this->app_model->get_package_details($id);

		$data['gallery'] = $this->app_model->get_package_gallery($id);
		$data['itinerarys'] = $this->app_model->get_package_itinerary($id);
		$data['package_items'] = $this->app_model->get_package_items($id);

		

		$this->load->view('package_details', $data);
	}

	function gallery()
	{
		$data['gallery'] = $this->app_model->get_gallery();
		$this->load->view('gallery_page', $data);
	}
}
