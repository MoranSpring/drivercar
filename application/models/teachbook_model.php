<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teachbook_model
 *
 * @author Kyle
 */
class Teachbook_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data) {    //把数据增加到sites表中.
        $result=$this->db->insert('TeachBook', $data); 
        return $result;
    }
    public function select_simple() {//返回该用户名所有信息
        $this->db->select('news_id');
        $this->db->select('news_title');
        $this->db->select('news_date');
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }
    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('news_id',$id);
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }
    public function select_school() {//返回该用户名所有信息
        $this->db->select('jp_id');
        $this->db->select('jp_name');
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }
     public function select_info_coa($data) {//返回该用户名所有信息
        $this->db->select('book_cls_num');
        $this->db->where('book_date',$data['book_date']);
        $this->db->where('book_coa_id',$data['book_coa_id']);
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }
}
