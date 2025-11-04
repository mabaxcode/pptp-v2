<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// load app model
	public function __construct()
	{
		parent::__construct();
        $this->load->model('app_model');

        $this->user_id = $this->session->userdata('user_id');
        if (!$this->user_id) {
            // not logged in
            redirect('auth/login');
            return;
        }
	}

    function profile()
    {
        $data['user'] = $this->app_model->get_user_details($this->user_id);

        $this->load->view('user_profile', $data);
    }

    function update_profile()
    {
        $post = $this->input->post();

        // update user details
        $update_data = array(
            'name' => $post['name'],
            'email' => $post['email'],
            // 'phone' => $post['phone'],
        );

        $this->db->where('id', $this->user_id);
        $this->db->update('users', $update_data);

        // redirect back to profile with success message
        $this->session->set_flashdata('success', 'Profile updated successfully.');
        redirect('user/profile');
    }

    function change_password_form()
    {   
        $data['user'] = $this->app_model->get_user_details($this->user_id);
        $this->load->view('change_password_form', $data);
    }

    function change_password()
    {
        $post = $this->input->post();

        $current_password = $post['current_password'];
        $new_password = $post['new_password'];
        $confirm_password = $post['confirm_password'];

        // get user details
        $user = $this->app_model->get_user_details($this->user_id);

        // verify current password
        if (!password_verify($current_password, $user['password'])) {
            // incorrect current password
            $this->session->set_flashdata('error', 'Current password is incorrect.');
            redirect('user/change_password_form');
            return;
        }

        // check new password and confirm password match
        if ($new_password !== $confirm_password) {
            $this->session->set_flashdata('error', 'New password and confirm password do not match.');
            redirect('user/change_password_form');
            return;
        }

        // update password
        $update_data = array(
            'password' => password_hash($new_password, PASSWORD_BCRYPT),
        );

        $this->db->where('id', $this->user_id);
        $this->db->update('users', $update_data);

        // redirect back to profile with success message
        $this->session->set_flashdata('success', 'Password changed successfully.');
        redirect('user/change_password_form');
    }
}
