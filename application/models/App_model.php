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

    function get_package_gallery($package_id)
    {
        $this->db->where('package_id', $package_id);
        $query = $this->db->get('package_galleries');
        return $query->result_array();
    }

    function get_package_itinerary($package_id)
    {
        $this->db->where('package_id', $package_id);
        // order by seq
        $this->db->order_by('seq', 'ASC');
        $query = $this->db->get('itineraries');
        return $query->result_array();
    }

    function get_package_items($package_id)
    {
        $this->db->where('package_id', $package_id);
        $query = $this->db->get('package_items');
        return $query->result_array();
    }

    function get_durations()
    {
        $query = $this->db->get('durations');
        return $query->result_array();
    }

    function get_user_details($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row_array();
    }   

    function get_gallery()
    {
        $query = $this->db->get('galleries');
        return $query->result_array();
    }

    function is_duplicate_booking_date($package_id, $preferred_date)
    {
        $this->db->where('package_id', $package_id);
        $this->db->where('check_in_date', $preferred_date);
        $query = $this->db->get('bookings');

        if ($query->num_rows() > 0) {
            return true; // duplicate found
        } else {
            return false; // no duplicate
        }
    }

    function get_user_bookings($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('bookings');
        return $query->result_array();
    }

    function get_booking_details($booking_id)
    {
        $this->db->where('id', $booking_id);
        $query = $this->db->get('bookings');
        return $query->row_array();
    }

}