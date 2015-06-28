<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Accesscontrol_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function insert($data) {    //把数据增加到sites表中.
        $result=$this->db->insert('AccessControl', $data); 
        return $result;
        
    }
    public function select($name) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('name',$name);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }
      public function selectgetName($data) {//返回该用户名
        $this->db->select('Name');
        $this->db->where('UID',$data);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }
    public function selectgetThumbnail($data) {//返回该用户名所有头像
        $this->db->select('PortraitThumbnail');
        $this->db->where('UID',$data);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }
    public function selectUserName($data) {//返回该用户名所有头像
        $this->db->select('stu_true_name');
        $this->db->where('stu_id',$data);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }
    
    public function loginSelect($name){//返回该用户名对应的密码
         $this->db->select();
         $this->db->where('stu_name',$name);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }
    public function loginMailExist($email){//注册时验证邮箱是否存在
         $this->db->select();
         $this->db->where('stu_email',$email);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }

    public function selectSameName($name){   //返回是否已经有相同的用户名
        
        $this->db->select('Name');
        $this->db->where('Name',$name);
       $query = $this->db->get('AccessControl');
        return $query->result_array();
    }
    public function delete($id) {
        
    }
    
    public function update($data) {
        $this->db->where('UID',$data['UID']);
        $result=$this->db->update('AccessControl', $data);
        return $result;
    }
    public function  update_attr($id,$data){
        $this->db->where('stu_id',$id);
        $result=$this->db->update('AccessControl', $data);
        return $result;
    }
    public function selectById($id) {//根据session_id返回当前登录用户的所有信息
        $this->db->select();
        $this->db->where('stu_id',$id);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }
    public function ChangePwdByEmail($email,$pwd_md5) {//根据session_id返回当前登录用户的所有信息

        $data=array('stu_pwd'=>$pwd_md5);
        $result=$this->db->update('AccessControl', $data, array('stu_email' => $email));
        return $result;
    }
    public function emailUnique($email){//查找邮箱是否存在与数据库中
         $this->db->select();
         $this->db->where('stu_email',$email);
        $query = $this->db->get('AccessControl');
        return $query->num_rows();
    }
    public function select_phone($phone){
        $this->db->select();
        $this->db->where('stu_tel',$phone);
        $query = $this->db->get('AccessControl');
        return $query->result_array();
    }

}