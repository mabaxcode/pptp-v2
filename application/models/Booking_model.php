<?php

class Booking_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function create_booking($data)
    {
        // Prepare booking data
        $booking_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'package_id' => $data['package_id'],
            'check_in_date' => $data['preferred_date'],
            'adults' => $data['adults'],
            'children' => $data['children'],
            'special_requests' => $data['special_requests'],
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'phone'         => $data['phone'],
            'card_number'  => $data['card_number'],
            'card_expiry'  => $data['card_expiry'],
            'card_cvv'     => $data['card_cvv'],
            'card_name'   => $data['card_name'],
            'created_at' => date('Y-m-d H:i:s')
        );

        // Insert booking into database
        $this->db->insert('bookings', $booking_data);
        return $this->db->insert_id();
    }

}