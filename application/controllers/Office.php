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

	public function __construct()
	{
		parent::__construct();

        $this->user_id = $this->session->userdata('user_id');
        if (!$this->user_id) {
            // not logged in
            redirect('');
            return;
        }
	}

	public function index()
	{   
        $data['page_title'] = 'Office Dashboard';
        $data['page_name'] = 'office/dashboard';

		// total user
		// get where role user
		$data['total_users'] = $this->db->get_where('users', array('role' => '0'))->num_rows();

		// total packages
		$data['total_packages'] = $this->db->get('packages')->num_rows();

		// total bookings
		$data['total_bookings'] = $this->db->get('bookings')->num_rows();

		$bookings = $this->db->get('bookings')->result_array();

		$data['online_user'] = $this->db->get_where('users', array('role' => '0', 'online' => '1'))->num_rows();

		// total payments
		$data['total_payments'] = 0;
		foreach ($bookings as $booking) {
			$package_detail = get_any_table_row(['id' => $booking['package_id']],'packages');
			$data['total_payments'] += $package_detail['price'];
		}

		// total payment this month
		$data['total_payments_this_month'] = 0;
		$current_month = date('m');
		foreach ($bookings as $booking) {
			$booking_month = date('m', strtotime($booking['created_at']));
			if ($booking_month == $current_month) {
				$package_detail = get_any_table_row(['id' => $booking['package_id']],'packages');
				$data['total_payments_this_month'] += $package_detail['price'];
			}
		}

		$start = date('M 1');           // First day of current month
		$end = date('M j');             // Current date (day only)

		$data['this_month'] = $start . ' - ' . $end;

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

	function vendor_application($data=false)
	{
		$data['page_title'] = 'Vendor Application';
		$data['page_name'] = 'office/vendor_application';

		// get where status pending

		// $data['applications'] = $this->db->get('vendor_form')->result_array();

		$data['applications'] = $this->db->get_where('vendor_form', array('status' => 'pending'))->result_array();
		$data['approved_applications'] = $this->db->get_where('vendor_form', array('status' => 'approved'))->result_array();
		$data['rejected_applications'] = $this->db->get_where('vendor_form', array('status' => 'rejected'))->result_array();


		// count pending vendor form
		$data['pending_count'] = $this->db->get_where('vendor_form', array('status' => 'pending'))->num_rows();
		$data['approved_count'] = $this->db->get_where('vendor_form', array('status' => 'approved'))->num_rows();
		$data['rejected_count'] = $this->db->get_where('vendor_form', array('status' => 'rejected'))->num_rows();

		$this->load->view('office/main', $data);
	}

	function manage_category()
	{   
		$data['page_title'] = 'Manage Category';
		$data['page_name'] = 'office/manage_category';

		$data['categories'] = $this->db->get('categories')->result_array();

		$this->load->view('office/main', $data);
	}

	function user_list()
	{   
		$data['page_title'] = 'User List';
		$data['page_name'] = 'office/user_list';

		$data['users'] = $this->db->get_where('users', array('role' => '0'))->result_array();

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
		$data['durations'] = $this->db->get('durations')->result_array();

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
		$duration = $this->input->post('duration');
		$price = $this->input->post('price');
		$cover_photo = $_FILES['cover_photo'];

		$itinerary_titles = $this->input->post('itinerary_title');
		$itinerary_descriptions = $this->input->post('itinerary_description');

		// echo '<pre>';
		// print_r($_POST);
		// print_r($_FILES);
		// echo '</pre>';
		// exit;

		// check photo upload
		if (empty($cover_photo['name'])) {
			$this->session->set_flashdata('error', 'Cover photo is required.');
			redirect('office/add_package');
		}

		// itineraries must be added at least one
		$itineraries = $this->input->post('itinerary_title'); // This will be an array

		if (empty($itineraries)) {
			$this->session->set_flashdata('error', 'At least one itinerary must be added.');
			redirect('office/add_package');
		}

		

		// package items at least one
		$package_items = $this->input->post('package_item'); // This will be an array
		// if (empty($package_items)) {
		// 	$this->session->set_flashdata('error', 'At least one package item must be added.');
		// 	redirect('office/add_package');
		// }

		// print_r($categories);exit;

		$data = array(
			'package_name' => $package_name,
			'description' => $description,
			'tag' => $tag,
			'status' => '1',
			'duration' => $duration,
			'price' => $price,
			'categories' => json_encode($categories) // Store as JSON
		);

		// print_r($data);exit;

		// Here you would typically save the package to the database
		// For demonstration, we'll just set a flash message and redirect

		// validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('package_name', 'Package Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('package_item[]', 'Package Item', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('office/add_package');

		}else{
			$id = $this->add_package_to_db($data);

			// add itineraries

			
			$batch_data = [];

			foreach ($itinerary_titles as $i => $title) {
				$batch_data[] = [
					'package_id'  => $id,
					'seq' 	   => $i + 1,
					'title'       => $title,
					'description' => $itinerary_descriptions[$i]
				];
			}

			$this->db->insert_batch('itineraries', $batch_data);

			// add package items
			if (!empty($package_items)) {
				$batch_items = [];
				foreach ($package_items as $item) {
					$batch_items[] = [
						'package_id' => $id,
						'item'       => $item
					];
				}
				$this->db->insert_batch('package_items', $batch_items);
			}
			

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

			// upload photo gallery
			$photo_gallery = $_FILES['photo_gallery'];

			// Debug only (optional)
			// echo "<pre>"; print_r($photo_gallery); echo "</pre>"; 

			$gallery_count = count($photo_gallery['name']);

			// echo "Gallery Count: " . $gallery_count . "<br>";

			// exit;

			if ($gallery_count > 0) {
				// Load upload library once
				$this->load->library('upload');

				for ($i = 0; $i < $gallery_count; $i++) {
					if (!empty($photo_gallery['name'][$i])) {
						
							// echo "Uploading gallery photo: " . $photo_gallery['name'][$i] . "<br>";
							$ext = pathinfo($photo_gallery['name'][$i], PATHINFO_EXTENSION);
							$hashed_name = md5($photo_gallery['name'][$i] . time());
							$gallery_photo_name = 'package_' . $id . '_gallery_' . $hashed_name . '.' . $ext;

							// Map file data
							$_FILES['gallery_photo']['name'] = $photo_gallery['name'][$i];
							$_FILES['gallery_photo']['type'] = $photo_gallery['type'][$i];
							$_FILES['gallery_photo']['tmp_name'] = $photo_gallery['tmp_name'][$i];
							$_FILES['gallery_photo']['error'] = $photo_gallery['error'][$i];
							$_FILES['gallery_photo']['size'] = $photo_gallery['size'][$i];

							// Upload config
							$config['upload_path']   = './uploads/packages/gallery/';
							$config['allowed_types'] = 'jpg|jpeg|png|gif';
							$config['file_name']     = $gallery_photo_name;
							$config['overwrite']     = false;

						
							$this->upload->initialize($config);

							if ($this->upload->do_upload('gallery_photo')) {
								$gallery_data = $this->upload->data();
								$gallery_photo_path = 'uploads/packages/gallery/' . $gallery_data['file_name'];

								// Save record into DB
								$this->db->insert('package_galleries', [
									'package_id' => $id,
									'image'      => $gallery_photo_path,
									'created_dt' => date('Y-m-d H:i:s')
								]);
							} else {
								// Optional: display error if upload fails
								log_message('error', 'Upload failed: ' . $this->upload->display_errors());
							}
					}
				}
			}
			// end upload photo gallery
			// exit;
			
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

		$data['durations'] = $this->db->get('durations')->result_array();

		$data['itinerarys'] = $this->db->get_where('itineraries', array('package_id' => $id))->result_array();

		$data['package_items'] = $this->db->get_where('package_items', array('package_id' => $id))->result_array();

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

	function save_gallery()
	{   
		$this->load->helper('form');

		$galery_photo = $_FILES['galery_photo'];

		// upload gallery photo
		if (!empty($galery_photo['name'])) {
			$ext = pathinfo($galery_photo['name'], PATHINFO_EXTENSION);
			// hash the file name to avoid conflicts
			$hashed_name = md5($galery_photo['name'] . time());
			$galery_photo_name = 'gallery_' . $hashed_name . '.' . $ext;
			$config['upload_path'] = './uploads/gallery/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $galery_photo_name;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('galery_photo')) {
				// Save the gallery record with the photo path
				$gallery_data = $this->upload->data();
				$galery_photo_path = 'uploads/gallery/' . $gallery_data['file_name'];
				$this->db->insert('galleries', array('image' => $galery_photo_path, 'created_dt' => date('Y-m-d H:i:s')));
				
				$this->session->set_flashdata('success', 'Photo has been added successfully.');
				redirect('office/manage_gallery');
			} else {
				// Upload failed
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('office/manage_gallery');
			}
		} else {
			$this->session->set_flashdata('error', 'Please select a photo to upload.');
			redirect('office/manage_gallery');
		}
		
	}

	function delete_gallery($id) {
		$this->db->where('id', $id);
		$this->db->delete('galleries');
		$this->session->set_flashdata('success', 'Gallery photo has been deleted successfully.');
		redirect('office/manage_gallery');
	}

	function manage_duration() {   
		$data['page_title'] = 'Manage Duration Package';
		$data['page_name'] = 'office/manage_duration';

		$data['durations'] = $this->db->get('durations')->result_array();

		$this->load->view('office/main', $data);
	}

	function save_duration()
	{   
		$duration_name = $this->input->post('duration_name');
		// Here you would typically save the duration to the database
		// For demonstration, we'll just return a success message
		if (empty($duration_name)) {
			$response = array(
				'status' => 'error',
				'message' => 'Duration name cannot be empty.'
			);
			echo json_encode($response);
			return;
		}
		// Simulate saving to database...
		$save = $this->db->insert('durations', array('name' => $duration_name));

		$response = array(
			'status' => 'success',
			'message' => 'Duration has been added successfully.'
		);
		echo json_encode($response);
	}

	function get_itinerary($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('itineraries');
		$result = $query->row_array();
		echo json_encode($result);
	}

	function update_itinerary()
	{   
		$itinerary_id = $this->input->post('itinerary_id');
		$itinerary_title = $this->input->post('title');
		$itinerary_description = $this->input->post('description');

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		if (empty($itinerary_title)) {
			$response = array(
				'status' => 'error',
				'message' => 'Itinerary title cannot be empty.'
			);
			echo json_encode($response);
			return;
		}

		// Update itinerary in database
		$this->db->where('id', $itinerary_id);
		$this->db->update('itineraries', array(
			'title' => $itinerary_title,
			'description' => $itinerary_description
		));

		$package_id = $this->db->get_where('itineraries', array('id' => $itinerary_id))->row()->package_id;
		$this->session->set_flashdata('success', 'Itinerary has been updated successfully.');
		// redirect('office/edit_package/' . $package_id);

		$response = array(
			'status' => 'success',
			'message' => 'Itinerary has been updated successfully.',
			'package_id' => $this->db->get_where('itineraries', array('id' => $itinerary_id))->row()->package_id
		);
		echo json_encode($response);
	}

	function save_itinerary()
	{   
		$package_id = $this->input->post('package_id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');

		if (empty($title)) {
			$response = array(
				'status' => 'error',
				'message' => 'Itinerary title cannot be empty.'
			);
			echo json_encode($response);
			return;
		}

		// get the current max seq for the package
		$this->db->where('package_id', $package_id);
		$this->db->select_max('seq');
		$query = $this->db->get('itineraries');
		$row = $query->row();
		$max_seq = $row->seq ? $row->seq : 0;

		$data = array(
			'package_id' => $package_id,
			'seq' => $max_seq + 1,
			'title' => $title,
			'description' => $description
		);

		$this->db->insert('itineraries', $data);

		$this->session->set_flashdata('success', 'Itinerary has been added successfully.');

		// $response = array(
		// 	'status' => 'success',
		// 	'message' => 'Itinerary has been added successfully.'
		// );
		// echo json_encode($response);
	}

	function delete_itinerary($id) {
		$package_id = $this->db->get_where('itineraries', array('id' => $id))->row()->package_id;

		$this->db->where('id', $id);
		$this->db->delete('itineraries');
		$this->session->set_flashdata('success', 'Itinerary has been deleted successfully.');
		redirect('office/edit_package/' . $package_id);
	}

	function get_package_item($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('package_items');
		$result = $query->row_array();
		echo json_encode($result);
	}

	function update_package_item()
	{   
		$package_item_id = $this->input->post('package_item_id');
		$package_item = $this->input->post('item');

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		// if (empty($package_item)) {
		// 	$response = array(
		// 		'status' => 'error',
		// 		'message' => 'Package item cannot be empty.'
		// 	);
		// 	echo json_encode($response);
		// 	return;
		// }

		// Update package item in database
		$this->db->where('id', $package_item_id);
		$this->db->update('package_items', array(
			'item' => $package_item,
		));

		// $package_id = $this->db->get_where('package_items', array('id' => $package_item_id))->row()->package_id;
		$this->session->set_flashdata('success', 'Package item has been updated successfully.');
		// redirect('office/edit_package/' . $package_id);

		$response = array(
			'status' => 'success',
			'message' => 'Package item has been updated successfully.',
			// 'package_id' => $this->db->get_where('package_items', array('id' => $package_item_id))->row()->package_id
		);
		echo json_encode($response);
	}

	function delete_package_item($id) {
		$package_id = $this->db->get_where('package_items', array('id' => $id))->row()->package_id;

		$this->db->where('id', $id);
		$this->db->delete('package_items');
		$this->session->set_flashdata('success', 'Package item has been deleted successfully.');
		redirect('office/edit_package/' . $package_id);
	}

	function save_package_item()
	{   
		$package_id = $this->input->post('package_id');
		$item = $this->input->post('item');

		if (empty($item)) {
			$response = array(
				'status' => 'error',
				'message' => 'Package item cannot be empty.'
			);
			echo json_encode($response);
			return;
		}

		$data = array(
			'package_id' => $package_id,
			'item' => $item
		);

		$this->db->insert('package_items', $data);

		$this->session->set_flashdata('success', 'Package item has been added successfully.');

		// $response = array(
		// 	'status' => 'success',
		// 	'message' => 'Package item has been added successfully.'
		// );
		// echo json_encode($response);
	}

	function booking($data=false)
	{
		$data['page_title'] = 'Booking';
		$data['page_name'] = 'office/booking';
		$data['bookings'] = $this->db->get('bookings')->result_array();

		$this->load->view('office/main', $data);
	}

	function payment_transaction($data=false)
	{
		$data['page_title'] = 'Payment Transaction';
		$data['page_name'] = 'office/payment_transaction';
		$data['transactions'] = $this->db->get('bookings')->result_array();

		$this->load->view('office/main', $data);
	}

	function get_booking_details($data=false)
	{
		$id = $this->input->post('bookingId');
		$data['booking'] = $this->db->get_where('bookings', array('id' => $id))->row_array();
		$data['package'] = $this->db->get_where('packages', array('id' => $data['booking']['package_id']))->row_array();
		$this->load->view('office/booking_details', $data);
	}

	function process_vendor_modal($data=false)
	{
		$id = $this->input->post('id');
		$data['vendor_form'] = $this->db->get_where('vendor_form', array('id' => $id))->row_array();

		// get user details
		$data['user'] = $this->db->get_where('users', array('id' => $data['vendor_form']['user_id']))->row_array();

		// get ic_file and ssm_file from vendor_documents table
		$data['ic_file'] = $this->db->get_where('vendor_documents', array('vendor_form_id' => $id, 'user_id' => $data['vendor_form']['user_id'], 'document_type' => 'ic'))->row_array();
		$data['ssm_file'] = $this->db->get_where('vendor_documents', array('vendor_form_id' => $id, 'user_id' => $data['vendor_form']['user_id'], 'document_type' => 'ssm'))->row_array();


		$this->load->view('office/process_vendor_details', $data);
	}

	function view_vendor_modal($data=false)
	{
		$id = $this->input->post('id');
		$data['vendor_form'] = $this->db->get_where('vendor_form', array('id' => $id))->row_array();

		// get user details
		$data['user'] = $this->db->get_where('users', array('id' => $data['vendor_form']['user_id']))->row_array();

		// get ic_file and ssm_file from vendor_documents table
		$data['ic_file'] = $this->db->get_where('vendor_documents', array('vendor_form_id' => $id, 'user_id' => $data['vendor_form']['user_id'], 'document_type' => 'ic'))->row_array();
		$data['ssm_file'] = $this->db->get_where('vendor_documents', array('vendor_form_id' => $id, 'user_id' => $data['vendor_form']['user_id'], 'document_type' => 'ssm'))->row_array();


		$this->load->view('office/view_vendor_details', $data);
	}

	function block_user($id) {
		$this->db->where('id', $id);
		$this->db->update('users', array('blocked' => '1'));
		$this->session->set_flashdata('success', 'User has been blocked successfully.');
		redirect('office/user_list');
	}

	function proceed_vendor_application($data=false)
	{
		$post = $this->input->post();

		// echo "<pre>"; print_r($post); echo "</pre>"; exit;

		$vendor_form_id = $post['vendor_form_id'];
		$decision = $post['decision'];
		$remarks = $post['remarks'];

		// if remark empty set to '-'
		if (empty($remarks)) {
			$remarks = '-';
		}

		// update vendor_form table
		$this->db->where('id', $vendor_form_id);
		$this->db->update('vendor_form', array(
			'status' => $decision,
			'remarks' => $remarks,
			'processed_at' => date('Y-m-d H:i:s')
		));

		// echo $this->db->last_query();exit;

		$response = array(
			'status' => 'success',
			'message' => 'Vendor application has been processed successfully.'
		);
		echo json_encode($response);
	}

	function view_document($id)
	{
		$document = $this->db->get_where('vendor_documents', array('id' => $id))->row_array();

		# only view
		if ($document) {
			$file_path = FCPATH . $document['file_path'];
			if (file_exists($file_path)) {
				// Get MIME type
				$mime = mime_content_type($file_path);
		
				// Set headers to display in browser
				header('Content-Type: ' . $mime);
				header('Content-Length: ' . filesize($file_path));
				header('Content-Disposition: inline; filename="' . basename($document['original_filename']) . '"');
				header('Cache-Control: public, max-age=0');
		
				// Clear output buffer
				ob_clean();
				flush();
		
				// Read the file
				readfile($file_path);
				exit;
			} else {
				show_404();
			}
		} else {
			show_404();
		}
		
	}
}
