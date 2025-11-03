<?php if (!defined('BASEPATH'))
exit('No direct script access allowed');

function load_instance()
{
    $ci =& get_instance();
    return $ci;
}

function current_date()
{
    $now = date('Y-m-d H:i:s');
    return $now;
}

function current_date_year(){
    $current_date = date("Y-m-d");
    return $current_date;
}

function encode($str)
{
    if ($str == "false") {
        $str = array('status' => false);
    }
    if ($str == "true") {
        $str = array('status' => true);
    }
    $return = json_encode($str, JSON_PRETTY_PRINT);
    return $return;
}

function insert_any_table($data_insert, $table)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->insert($table, $data_insert);
    return $ci->db->affected_rows();
}

function get_any_table_row($data_where, $table, $order_latest = false)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->where($data_where);
    if ($order_latest <> false) {
        $ci->db->order_by($order_latest, 'desc');
    }
    $query = $ci->db->get($table);

    if ($query->num_rows() > 0) { return $query->row_array(); }

    return false;
}

function update_any_table($data_upd, $data_where, $table)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->set($data_upd);
    $ci->db->where($data_where);
    $ci->db->update($table);
    return $ci->db->affected_rows();
}


function get_any_table_array($data_where = false, $table = false, $col_sort = false, $type_sort = false)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    if($data_where <> false){
        $ci->db->where($data_where);
    }
    
    if ($col_sort <> false) {
        $sort = ($type_sort == false) ? "desc" : $type_sort;
        $ci->db->order_by($col_sort, $sort);
    }
    $query = $ci->db->get($table);

    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return false;
    }
}

function get_value_from_any_table($tbl, $col, $where, $order_by = false)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select($col);
    $ci->db->where($where);
    if ($order_by <> false) {
        $ci->db->order_by($order_by, 'DESC');
        $ci->db->limit(1);
    }
    $query = $ci->db->get($tbl);

    if ($query->num_rows() > 0) {
        $result = $query->row();
        return $result->$col;
    } else {
        return false;
    }
}

function dmy($p_ymd, $p_sep = "/")
{
    $yy = substr($p_ymd, 0, 4);
    $mm = substr($p_ymd, 5, 2);
    $dd = substr($p_ymd, 8, 2);

    $r_dmy = $dd . $p_sep . $mm . $p_sep . $yy;

    if ($r_dmy == $p_sep . $p_sep or $r_dmy == "00" . $p_sep . "00" . $p_sep . "0000") {
        $r_dmy = "";
    }

    return $r_dmy;
}


function timeservice($time)
{
    $timeConvert = date("h:i A", strtotime($time)); // Outputs: 12:00 PM
    return $timeConvert;
}

function getRandomString($n) {
    $timestamp = microtime(true);  // Add current timestamp as additional entropy
    $randomBytes = random_bytes($n / 2);
    
    // Mix timestamp into random bytes to increase uniqueness
    return bin2hex(random_bytes($n / 2) . pack('d', $timestamp));
}

function delete_any_table($where, $table)
{
    $ci = load_instance();
    $ci->load->database();
    $ci->db->delete($table, $where);
    return $ci->db->affected_rows();
}

function count_any_table($where, $table)
{   
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from($table);
    $ci->db->where($where);
    $query = $ci->db->get();
   
    $row_count = $query->num_rows();
    return $row_count;
    
}

function get_code_desc($id, $table)
{
    $ci = load_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->where('id', $id);
    $query = $ci->db->get($table);

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
}



