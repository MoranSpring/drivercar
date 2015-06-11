<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Consumption_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {    //把数据增加到Consumption表中.
        $result = $this->db->insert_batch('Consumption', $data);
        return $result;
    }

    public function select_by_stu($data) {//通过用户id来查找记录
        $this->db->select();
        $this->db->where('csm_stu_id', $data);
        $this->db->order_by("csm_date", "desc");
        $query = $this->db->get('Consumption');
        return $query->result_array();
    }
}