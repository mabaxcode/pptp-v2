<?php

class App_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function check_user_login($data)
    {
        $this->db->where('username', $data['username']);
        $this->db->where('password', md5($data['password']));
        $query = $this->db->get('users');

        if($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    // get package list
    function get_package_list()
    {
        $query = $this->db->get('packages');
        // how to join categories table to get category name?
        // $this->db->select('packages.*, GROUP_CONCAT(categories.name) as categories');
        // $this->db->from('packages');
        // $this->db->join('categories', 'packages.id = categories.package_id');
        // $this->db->join('categories', 'categories.category_id = categories.id');
        // $this->db->group_by('packages.id');
        // $query = $this->db->get();
        return $query->result_array();
    }

    function get_package_details($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('packages');
        return $query->row_array();
    }

}