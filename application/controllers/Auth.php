<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	// load app model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model');
        $this->load->model('app_model');
	}

    function login()
    {
        $this->load->view('login_page', $data);
    }

    function login_process()
    {
        // process login form submission
        // (implementation not shown)
        $post = $_POST;

        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
        // exit;

        $email = $post['email'];
        $password = $post['password'];

        // check user in database
        $user = $this->db->get_where('users', array('email' => $email))->row();

        if ($user && password_verify($password, $user->password)) {
            // login success
            // echo "Login successful.";exit;
            // set session
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('user_name', $user->name);

            update_any_table(
                array('online' => '1'),
                array('id' => $user->id),
                'users'
            );

            // redirect to home page
            if($user->role == '1'){
                redirect('office');
                return;
            }
            $this->session->set_flashdata('success_login', 'Login successful.');
            redirect('/');
        } else {
            // login failed
            // reload login page with error
            // flashdata can be used to show error message
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('auth/login');
        }
    }

    function register()
    {
        $this->load->view('register_page', $data);
    }

    function register_process()
    {
        // process registration form submission
        // (implementation not shown)
        $post = $_POST;
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
        // exit;

        $name = $post['name'];
        $email = $post['email'];
        $password = $post['password'];
        $cpassword = $post['cpassword'];



        // check password match
        if ($password != $cpassword) {
            // passwords do not match
            // reload register page with error
            // flashdata can be used to show error message
            $this->session->set_flashdata('error', 'Passwords do not match.');
            redirect('auth/register');
            // return;
        }else{
            // save to database
            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            );
            $this->db->insert('users', $data);
            $this->session->set_flashdata('success', 'Registration successful. Please login.');
            // redirect to login page
            redirect('auth/login');
        }

        // $this->load->view('register_page', $data);
    }

    function logout()
    {   
        $user_id = $this->session->userdata('user_id');

        update_any_table(
            array('online' => '0'),
            array('id' => $user_id),
            'users'
        );

        // destroy session
        $this->session->sess_destroy();
        // redirect to home page
        redirect('/');
    }
}
