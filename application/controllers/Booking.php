<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	// load app model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model');
        $this->load->model('app_model');
	}

    function application($package_id)
    {
        $data['package'] = $this->app_model->get_package_details($package_id);
        $data['package_items'] = $this->app_model->get_package_items($package_id);

        // check session
        if (!$this->session->userdata('user_id')) {
            // not logged in
            redirect('auth/login');
            return;
        }

        $this->load->view('booking_form', $data);
    }

    function preview_booking()
    {
        $post = $this->input->post();

        // echo '<pre>'; print_r($post); echo '</pre>';


        $data['booking'] = $post;
        $data['package'] = $this->app_model->get_package_details($post['package_id']);
        $this->load->view('booking_preview', $data);
    }

    function submit_booking()
    {
        $post = $this->input->post();

        // echo '<pre>';
        // print_r($post);
        // echo '</pre>';
        // exit;

        // process booking here (e.g., save to database, send confirmation email, etc.)
        $insert = $this->booking_model->create_booking($post);

        if ($insert) {
            // $this->load->view('booking_success', array('booking_id' => $insert));
            $this->session->set_flashdata('success_booking', 'Booking successful. Your booking ID is #' . $insert);
            redirect('/');
        } else {
            $this->session->set_flashdata('error_booking', 'Booking failed. Please try again.');
            redirect('/');
            // $this->load->view('booking_failure');
        }

    }

    function check_duplicate_date()
    {
        $post = $this->input->post();

        $package_id = $post['id'];
        $preferred_date = $post['checkinDate'];

        // echo $package_id;

        $is_duplicate = $this->app_model->is_duplicate_booking_date($package_id, $preferred_date);

        if ($is_duplicate) {
            $response = array('status' => true);
        } else {
            $response = array('status' => false);
        }

        echo json_encode($response);
    }
}
