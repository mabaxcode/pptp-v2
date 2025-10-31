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

		// how to join categories table to get category names add where status = 1
		$this->db->select('packages.*, categories.name as category_name');
		$this->db->from('packages');
		$this->db->join('categories', 'FIND_IN_SET(categories.id, packages.categories) > 0', 'left');
		$this->db->where('packages.status', 1);
		$query = $this->db->get();
		$data['packages'] = $query->result_array();
		// $data['packages'] = $this->db->get_where('packages', array('status' => 1))->result_array();

		


		$this->load->view('office/main', $data);
	}

	function manage_category()
	{   
		$data['page_title'] = 'Manage Category';
		$data['page_name'] = 'office/manage_category';

		$data['categories'] = $this->db->get('categories')->result_array();

		$this->load->view('office/main', $data);
	}

	function manage_gallery()
	{   
		$data['page_title'] = 'Manage Gallery';
		$data['page_name'] = 'office/manage_gallery';

		$data['galleries'] = $this->db->get('galleries')->result_array();

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
		$cover_photo = $_FILES['cover_photo'];

		

		// print_r($categories);exit;

		$data = array(
			'package_name' => $package_name,
			'description' => $description,
			'tag' => $tag,
			'status' => '1',
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
			$id = $this->add_package_to_db($data);

			// upload cover photo
			if (!empty($cover_photo['name'])) {
				$ext = pathinfo($cover_photo['name'], PATHINFO_EXTENSION);
				// hash the file name to avoid conflicts
				$hashed_name = md5($cover_photo['name'] . time());
				// $cover_photo_name = 'package_' . $id . '_cover.' . $ext;
				$cover_photo_name = 'package_' . $id . '_' . $hashed_name . '.' . $ext;
				$config['upload_path'] = './uploads/packages/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $cover_photo_name;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('cover_photo')) {
					// Update the package record with the cover photo path
					$cover_data = $this->upload->data();
					$cover_photo_path = 'uploads/packages/' . $cover_data['file_name'];
					$this->db->where('id', $id);
					$this->db->update('packages', array('cover_photo' => $cover_photo_path));
				} else {
					// Upload failed
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('office/add_package');
				}
			}
			
			$this->session->set_flashdata('success', 'Package has been added successfully.');
			redirect('office/add_package');
		}
		
	}

	function add_package_to_db($data) {
		$insert = $this->db->insert('packages', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function edit_package($id)
	{   
		$data['page_title'] = 'Edit Package';
		$data['page_name'] = 'office/edit_package';

		$data['package'] = $this->db->get_where('packages', array('id' => $id))->row_array();
		$data['categories'] = $this->db->get('categories')->result_array();

		$this->load->view('office/main', $data);
	}

	function do_edit_package(){
		$this->load->helper('form');

		$package_name = $this->input->post('package_name');
		$description = $this->input->post('description');
		$tag = $this->input->post('tag');
		$categories = $this->input->post('categories'); // This will be an array
		$package_id = $this->input->post('package_id');
		$cover_photo = $_FILES['cover_photo'];

		

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
			$id = $this->edit_package_to_db($data);

			// upload cover photo
			if (!empty($cover_photo['name'])) {
				$ext = pathinfo($cover_photo['name'], PATHINFO_EXTENSION);
				// hash the file name to avoid conflicts
				$hashed_name = md5($cover_photo['name'] . time());
				// $cover_photo_name = 'package_' . $id . '_cover.' . $ext;
				$cover_photo_name = 'package_' . $id . '_' . $hashed_name . '.' . $ext;
				$config['upload_path'] = './uploads/packages/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $cover_photo_name;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('cover_photo')) {
					// Update the package record with the cover photo path
					$cover_data = $this->upload->data();
					$cover_photo_path = 'uploads/packages/' . $cover_data['file_name'];
					$this->db->where('id', $package_id);
					$this->db->update('packages', array('cover_photo' => $cover_photo_path));
				} else {
					// Upload failed
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('office/edit_package/' . $package_id);
				}
			}

			$this->session->set_flashdata('success', 'Package has been updated successfully.');
			redirect('office/edit_package/' . $package_id);
		}
	}

	function edit_package_to_db($data) {
		$package_id = $this->input->post('package_id');
		$this->db->where('id', $package_id);
		$update = $this->db->update('packages', $data);
		return $package_id;
	}

	function delete_package($id) {
		$this->db->where('id', $id);
		$this->db->delete('packages');
		$this->session->set_flashdata('success', 'Package has been deleted successfully.');
		redirect('office/manage_package');
	}

	function delete_category($id) {
		$this->db->where('id', $id);
		$this->db->delete('categories');
		$this->session->set_flashdata('success', 'Category has been deleted successfully.');
		redirect('office/manage_category');
	}

	function update_category()
	{   
		$category_id = $this->input->post('category_id');
		$category_name = $this->input->post('category_name');

		if (empty($category_name)) {
			$response = array(
				'status' => 'error',
				'message' => 'Category name cannot be empty.'
			);
			echo json_encode($response);
			return;
		}

		// Update category in database
		$this->db->where('id', $category_id);
		$this->db->update('categories', array('name' => $category_name));

		$response = array(
			'status' => 'success',
			'message' => 'Category has been updated successfully.'
		);
		echo json_encode($response);
	}
}
