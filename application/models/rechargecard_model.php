<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
class RechargeCard_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {    //把数据增加到sites表中.
        $result = $this->db->insert_batch('TeachBook', $data);
        return $result;
    }

    public function select_by_card_id($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('rc_card_id',$id);
        $query = $this->db->get('RechargeCard');
        return $query->result_array();
    }
}