<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coach_model
 *
 * @author Kyle
 */
class Clscomment_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data) {    //把数据增加到sites表中.
        $result=$this->db->insert('ClsComment', $data); 
        return $result;
    }
    
    
    public function select_simple() {//返回该用户名所有信息
        $this->db->select('news_id');
        $this->db->select('news_title');
        $this->db->select('news_date');
        $query = $this->db->get('ClsComment');
        return $query->result_array();
    }
    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('com_cls_id',$id);
        $query = $this->db->get('ClsComment');
        return $query->result_array();
    }
    public function select_coach($id) {//返回该用户名所有信息
        $this->db->select('coach_id');
        $this->db->select('coach_name');
        $this->db->where('coach_sch_id',$id);
        $query = $this->db->get('ClsComment');
        return $query->result_array();
    }
    public function select_exist($id) {//返回该用户名所有信息
        $this->db->select('com_id');
        $this->db->where('com_cls_id',$id);
        $query = $this->db->get('ClsComment');
        return $query->result_array();
    }
    
}