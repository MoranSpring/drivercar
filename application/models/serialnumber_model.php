<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Serialnumber_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function insert($data) {    //把数据增加到SerialNumber表中.
        $result=$this->db->insert('SerialNumber', $data); 
        return $result; 
    }
    
    public function selectBySerNum($serial_num) {//根据序列号查找
        $this->db->select();
        $this->db->where('serial_num',$serial_num);
        $query = $this->db->get('SerialNumber');
        $data=$query->result_array();
        return $data;
    }
    public function SerValidChange($serial_num,$attr_arr) {//根据序列号查找
//        $this->db->select();
//        $this->db->where('serial_num',$serial_num);
//        $query = $this->db->get('SerialNumber');
//        $data=$query->result_array();
//        foreach ($data as $row) {
//            $serial_valid=$row['serial_valid'];
//        }
//        if($serial_valid==1){
            $this->db->where('serial_num',$serial_num);
            $result=$this->db->update('SerialNumber', $attr_arr);
//        }else{
//            $result=0;
//        }
        
        return $result;
    }

}
