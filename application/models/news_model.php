<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class News_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data) {    //把数据增加到sites表中.
        $result=$this->db->insert('News', $data); 
        return $result;
        
    }
}

