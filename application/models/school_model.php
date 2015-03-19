<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of school_model
 *
 * @author Kyle
 */
class School_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data) {    //把数据增加到sites表中.
        $result=$this->db->insert('School', $data); 
        return $result;
    }
    public function select_simple() {//返回该用户名所有信息
        $this->db->select('news_id');
        $this->db->select('news_title');
        $this->db->select('news_date');
        $query = $this->db->get('School');
        return $query->result_array();
    }
    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('news_id',$id);
        $query = $this->db->get('School');
        return $query->result_array();
    }
}