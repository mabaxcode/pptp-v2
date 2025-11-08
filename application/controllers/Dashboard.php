<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // public function get_booking_stats()
    // {
    //     // Join packages + bookings
    //     $this->db->select('packages.package_name AS package_name, COUNT(bookings.id) AS total_bookings');
    //     $this->db->from('bookings');
    //     $this->db->join('packages', 'packages.id = bookings.package_id', 'left');
    //     $this->db->group_by('packages.package_name');
    //     $this->db->order_by('packages.package_name', 'ASC');
    //     $query = $this->db->get();

    //     $result = $query->result_array();

    //     // Prepare data for Chart.js
    //     $labels = [];
    //     $data = [];
    //     foreach ($result as $row) {
    //         $labels[] = $row['package_name'];
    //         $data[] = (int)$row['total_bookings'];
    //     }

    //     echo json_encode([
    //         'labels' => $labels,
    //         'data' => $data
    //     ]);
    // }

    public function booking_statistics()
    {
        $this->load->database();

        // Query: count bookings grouped by package and month
        $query = $this->db->query("
            SELECT 
                p.package_name AS package_name,
                MONTH(b.created_at) AS month,
                COUNT(b.id) AS total
            FROM bookings b
            JOIN packages p ON p.id = b.package_id
            GROUP BY p.package_name, MONTH(b.created_at)
            ORDER BY p.package_name, month ASC
        ");

        $results = $query->result_array();

        // Prepare arrays
        $months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
        $packages = [];
        $datasets = [];

        // Collect all package names
        foreach ($results as $row) {
            $packages[$row['package_name']] = array_fill(1, 12, 0); // initialize 12 months
        }

        // Fill data counts
        foreach ($results as $row) {
            $packages[$row['package_name']][$row['month']] = (int)$row['total'];
        }

        // Assign random colors (optional)
        $colors = [
            '#177dff', '#f3545d', '#fdaf4b', '#00caac', '#a932ff', '#e83e8c'
        ];

        $i = 0;
        foreach ($packages as $package_name => $monthlyData) {
            $color = $colors[$i % count($colors)];
            $datasets[] = [
                'label' => $package_name,
                'borderColor' => $color,
                'pointBackgroundColor' => $color,
                'backgroundColor' => $color . '33', // semi-transparent
                'legendColor' => $color,
                'fill' => true,
                'borderWidth' => 2,
                'pointRadius' => 0,
                'data' => array_values($monthlyData)
            ];
            $i++;
        }

        echo json_encode([
            'labels' => $months,
            'datasets' => $datasets
        ]);
    }

}
