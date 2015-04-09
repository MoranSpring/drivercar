<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Course_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function select($data) {
        $this->db->select();
        $this->db->where('cls_id', $data);
        $query = $this->db->get('Course');
        return $query->result_array();
    }
    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('news_id', $id);
        $query = $this->db->get('Course');
        return $query->result_array();
    }

    public function select_coach($id) {//返回该用户名所有信息
        $this->db->select('coach_id');
        $this->db->select('coach_name');
        $this->db->where('coach_sch_id', $id);
        $query = $this->db->get('Course');
        return $query->result_array();
    }



}


