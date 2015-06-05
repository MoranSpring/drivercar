<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
    public function select_school() {//返回该用户名所有信息
        $this->db->select('jp_id');
        $this->db->select('jp_name');
        $query = $this->db->get('School');
        return $query->result_array();
    }
    public function select_name($id) {//返回该用户名所有信息
        $this->db->select('jp_name');
        $this->db->where('jp_id',$id);
        $query = $this->db->get('School');
        return $query->result_array();
    }
    
 public function getJPNameById($id) {//根据Id返回驾培点名称
        $this->db->select('jp_name');
        $this->db->where('jp_id',$id);
        $query = $this->db->get('School');
        return $query->result_array();
    }
    
    public function get_from_city($city){
         $this->db->select();
        $this->db->where('jp_city',$city);
        $query = $this->db->get('School');
        return $query->result_array();
    }
    public function get_from_id($city){
        $this->db->select();
        $this->db->where('jp_id',$city);
        $query = $this->db->get('School');
        return $query->result_array();
    }
    //根据城市代号id获取该城市驾校id 和驾校名
//    public function getSchoolidByCity($city_id){
//        
//    }
    
}