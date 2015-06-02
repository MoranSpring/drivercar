<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Staticcoach_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {    //把数据增加到sites表中.
        $result = $this->db->insert('StaticCoach', $data);
        return $result;
    }

    public function select($data) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('sc_stu', $data);
        $query = $this->db->get('StaticCoach');
        return $query->result_array();
    }
    
    public function selectByStu($data) {//通过学员id查询已选的教练和驾培点
        $this->db->select();
        $this->db->where('sc_stu', $data);
        $query = $this->db->get('StaticCoach');
        return $query->result_array();
    }
    public function update($id, $data) {
        $this->db->where('sc_stu', $id);
        $result = $this->db->update('StaticCoach', $data);
        return $result;
    }
    
    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('news_id', $id);
        $query = $this->db->get('News');
        return $query->result_array();
    }



    public function select_TopNews() {
        $this->db->select();
        $query = $this->db->get('NewsTop');
        return $query->result_array();
    }

}

