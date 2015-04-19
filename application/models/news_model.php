<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class News_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {    //把数据增加到sites表中.
        $result = $this->db->insert('News', $data);
        return $result;
    }

    public function select_simple() {//返回该用户名所有信息
        $this->db->select('news_id');
        $this->db->select('news_title');
        $this->db->select('news_date');
        $this->db->select('news_imge');
        $this->db->select('news_type');
        $this->db->select('news_mainidea');
        $this->db->select('news_author');
        $query = $this->db->get('News');
        return $query->result_array();
    }

    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('news_id', $id);
        $query = $this->db->get('News');
        return $query->result_array();
    }

    public function update_TopNews($id, $data) {
        $this->db->where('news_postion', $id);
        $result = $this->db->update('NewsTop', $data);
        return $result;
    }

    public function select_TopNews() {
        $this->db->select();
        $query = $this->db->get('NewsTop');
        return $query->result_array();
    }

}
