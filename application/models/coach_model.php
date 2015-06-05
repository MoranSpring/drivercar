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
class Coach_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data) {    //把数据增加到sites表中.
        $result=$this->db->insert('Coach', $data); 
        return $result;
    }
    public function select_simple() {//返回该用户名所有信息
        $this->db->select('news_id');
        $this->db->select('news_title');
        $this->db->select('news_date');
        $query = $this->db->get('Coach');
        return $query->result_array();
    }
    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('coach_id',$id);
        $query = $this->db->get('Coach');
        return $query->result_array();
    }
    public function select_coach($id) {//返回该用户名所有信息
        $this->db->select('coach_id');
        $this->db->select('coach_face');
        $this->db->select('coach_name');
        $this->db->where('coach_sch_id',$id);
        $query = $this->db->get('Coach');
        return $query->result_array();
    }
    public function select_name($id) {//返回该用户名所有信息
        $this->db->select('coach_name');
        $this->db->select('coach_face');
        $this->db->where('coach_id',$id);
        $query = $this->db->get('Coach');
        return $query->result_array();
    }
       public function selectAllinfoById($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('coach_user_id',$id);
        $query = $this->db->get('Coach');
        return $query->result_array();
    }
   public function updateInfo($id,$data) {//更新self_info_edit页面内容
        $this->db->where('coach_user_id', $id);
        $result=$this->db->update('Coach', $data); 
        return $result;
    }
    /**
     * 根据驾校ID查询教练信息
     * @param type $coach_sch_id
     * @return type
     */
    function getCoachBySchoolId($coach_sch_id) {
        $this->db->select();
        $this->db->where('coach_sch_id',$coach_sch_id);
        $query=$this->db->get('Coach');
        return $query;
    }
    public function selectIdBySchool($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('coach_sch_id', $id);
        $query = $this->db->get('Coach');
        return $query->result_array();
    }
}