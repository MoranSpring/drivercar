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

    public function select($data) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('sc_stu', $data);
        $query = $this->db->get('StaticCoach');
        return $query->result_array();
    }
}