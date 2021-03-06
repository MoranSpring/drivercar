<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of coachbook_model
 *
 * @author Kyle
 */
class Coachbook_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {    //把数据增加到sites表中.
        $result = $this->db->insert_batch('CoachBook', $data);
        return $result;
    }

    public function select($data,$time,$cls) {
        $this->db->select('coabk_cls_num');
        $this->db->where('coabk_time >', $time);
        $this->db->where('coabk_coach_id', $data['coabk_coach_id']);
        $this->db->where('coabk_time', $data['coabk_time']);
        $query1 = $this->db->get('CoachBook');
        
        $this->db->select('coabk_cls_num');
        $this->db->where('coabk_time', $time);
        $this->db->where('coabk_cls_num >', $cls+2);
        $this->db->where('coabk_coach_id', $data['coabk_coach_id']);
        $this->db->where('coabk_time', $data['coabk_time']);
        $query2 = $this->db->get('CoachBook');
         $query = array_merge($query2->result_array(), $query1->result_array());
        return $query;
    }

    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('news_id', $id);
        $query = $this->db->get('CoachBook');
        return $query->result_array();
    }

    public function select_coach($id) {//返回该用户名所有信息
        $this->db->select('coach_id');
        $this->db->select('coach_name');
        $this->db->where('coach_sch_id', $id);
        $query = $this->db->get('CoachBook');
        return $query->result_array();
    }

    public function delete($data) {
        $this->db->where('coabk_coach_id', $data['coabk_coach_id']);
        $this->db->where('coabk_time', $data['coabk_time']);
        $this->db->where('coabk_cls_num', $data['coabk_cls_num']);
        $query = $this->db->delete('CoachBook');
        return $query;
    }

}
