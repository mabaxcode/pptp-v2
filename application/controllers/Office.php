<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{   
        $data['page_title'] = 'Office Dashboard';
        $data['page_name'] = 'office/dashboard';
		$this->load->view('office/main', $data);
	}

	public function manage_package()
	{   
		$data['page_title'] = 'Manage Package';
		$data['page_name'] = 'office/manage_package';
		$this->load->view('office/main', $data);
	}

	public function add_package()
	{   
		$data['page_title'] = 'Add Package';
		$data['page_name'] = 'office/add_package';

		$data['categories'] = $this->db->get('categories')->result_array();

		$this->load->view('office/main', $data);
	}

	public function save_category()
	{   
		$category_name = $this->input->post('category_name');
		// Here you would typically save the category to the database
		// For demonstration, we'll just return a success message
		if (empty($category_name)) {
			$response = array(
				'status' => 'error',
				'message' => 'Category name cannot be empty.'
			);
			echo json_encode($response);
			return;
		}
		// Simulate saving to database...
		$save = $this->db->insert('categories', array('name' => $category_name));

		$response = array(
			'status' => 'success',
			'message' => 'Category has been added successfully.'
		);
		echo json_encode($response);
	}

	public function save_package()
	{   

		$this->load->helper('form');

		$package_name = $this->input->post('package_name');
		$description = $this->input->post('description');
		$tag = $this->input->post('tag');
		$categories = $this->input->post('categories'); // This will be an array

		// print_r($categories);exit;

		$data = array(
			'package_name' => $package_name,
			'description' => $description,
			'tag' => $tag,
			'categories' => json_encode($categories) // Store as JSON
		);

		// print_r($data);exit;

		// Here you would typically save the package to the database
		// For demonstration, we'll just set a flash message and redirect

		// validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('package_name', 'Package Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('office/add_package');

		}else{
			$this->add_package_to_db($data);
			$this->session->set_flashdata('success', 'Package has been added successfully.');
			redirect('office/add_package');
		}
		
	}

	function add_package_to_db($data) {
		$insert = $this->db->insert('packages', $data);
		return $insert;
	}
}
