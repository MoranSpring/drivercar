<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserCoin_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {    //把数据增加到UserCoin表中.
        $result = $this->db->insert('UserCoin', $data);
        return $result;
    }

    public function selectById($data) {//
        $this->db->select();
        $this->db->where('uc_stu_id', $data);
        $query = $this->db->get('UserCoin');
        return $query->result_array();
    }
    
    public function update($id, $data) {//更新积分
        $this->db->where('uc_stu_id', $id);
        $result = $this->db->update('UserCoin', $data);
        return $result;
    }

}
