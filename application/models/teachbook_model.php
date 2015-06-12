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
class Teachbook_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {    //把数据增加到sites表中.
        $result = $this->db->insert_batch('TeachBook', $data);
        return $result;
    }

    public function select_simple() {//返回该用户名所有信息
        $this->db->select('news_id');
        $this->db->select('news_title');
        $this->db->select('news_date');
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }

    public function select_detail($id) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('book_stu_id', $id);
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }
        public function select_study_record($id) {//学习进度查询并按照课程排序
        $this->db->select('TeachBook.*');
        $this->db->select('Course.cls_name');
        $STATE = array('1', '7');
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_stu_id', $id);
         $this->db->order_by("book_date", "asc");
         $this->db->from('TeachBook');
         $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function select_coach_comment($id) {//学习进度查询并按照课程排序
        $this->db->select('TeachBook.*');
        $this->db->select('Course.cls_name');
        $this->db->select('Coach.coach_name');
        $this->db->select('Coach.coach_face');
        $STATE = array('1', '7');
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_stu_id', $id);
         $this->db->order_by("book_date", "asc");
         $this->db->from('TeachBook');
        $this->db->join('Coach', 'Coach.coach_id=TeachBook.book_coa_id');
         $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_history_detail($id, $time, $cls) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('book_stu_id', $id);
        $this->db->where('book_date <', $time);
        $this->db->order_by("book_date", "desc");
        $this->db->order_by("book_cls_num", "desc");
        $query1 = $this->db->get('TeachBook');

        $this->db->select();
        $this->db->where('book_stu_id', $id);
        $this->db->where('book_date', $time);
        $this->db->where('book_cls_num <', $cls);
        $this->db->order_by("book_date", "desc");
        $this->db->order_by("book_cls_num", "desc");
        $query2 = $this->db->get('TeachBook');
        $query = array_merge($query2->result_array(), $query1->result_array());
        return $query;
    }

    public function select_history_details($id, $time, $cls) {//读取选课信息历史信息，用join
        $this->db->select('TeachBook.*');
        $this->db->select('Coach.coach_name');
        $this->db->select('Coach.coach_face');
        $this->db->select('Coach.coach_cls_cost');
        $this->db->select('Course.cls_name');
        $this->db->select('ClsComment.com_id');
        $this->db->select('School.jp_name');
        $this->db->where('book_stu_id', $id);
        $STATE = array('1', '7');
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_date <', $time);
        $this->db->from('TeachBook');
        $this->db->join('Coach', 'Coach.coach_id=TeachBook.book_coa_id');
        $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $this->db->join('School', 'School.jp_id=TeachBook.book_sch_id');
        $this->db->join('ClsComment', 'ClsComment.com_cls_id=TeachBook.book_id', 'left');
        $this->db->order_by("book_date", "desc");
        $this->db->order_by("book_cls_num", "desc");
        $query1 = $this->db->get();

        $this->db->select('TeachBook.*');
        $this->db->select('Coach.coach_name');
        $this->db->select('Coach.coach_face');
        $this->db->select('ClsComment.com_id');
        $this->db->select('Course.cls_name');
        $this->db->select('School.jp_name');
        $this->db->where('book_stu_id', $id);
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_date', $time);
        $this->db->where('book_cls_num <', $cls);
        $this->db->from('TeachBook');
        $this->db->join('Coach', 'Coach.coach_id=TeachBook.book_coa_id');
        $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $this->db->join('School', 'School.jp_id=TeachBook.book_sch_id');
        $this->db->join('ClsComment', 'ClsComment.com_cls_id=TeachBook.book_id', 'left');
        $this->db->order_by("book_date", "desc");
        $this->db->order_by("book_cls_num", "desc");
        $query2 = $this->db->get();
        $query = array_merge($query2->result_array(), $query1->result_array());
        return $query;
    }

    public function select_further_detail($id, $time, $cls) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('book_stu_id', $id);
        $this->db->where('book_date >', $time);
        $this->db->order_by("book_date", "asc");
        $this->db->order_by("book_cls_num", "asc");
        $query1 = $this->db->get('TeachBook');

        $this->db->select();
        $this->db->where('book_stu_id', $id);
        $this->db->where('book_date', $time);
        $this->db->where('book_cls_num >', $cls);
        $this->db->order_by("book_date", "asc");
        $this->db->order_by("book_cls_num", "asc");
        $query2 = $this->db->get('TeachBook');
        $query = array_merge($query2->result_array(), $query1->result_array());
        return $query;
    }

    public function select_further_details($id, $time, $cls) {//返回选课未消费选课订单详情
        $this->db->select('TeachBook.*');
        $this->db->select('Coach.coach_name');
        $this->db->select('Coach.coach_face');
        $this->db->select('Coach.coach_cls_cost');
        $this->db->select('Course.cls_name');
        $this->db->select('School.jp_name');
        $this->db->where('book_stu_id', $id);
        $STATE = array('1', '7');
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_date >', $time);
        $this->db->from('TeachBook');
        $this->db->join('Coach', 'Coach.coach_id=TeachBook.book_coa_id');
        $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $this->db->join('School', 'School.jp_id=TeachBook.book_sch_id');
        $this->db->order_by("book_date", "desc");
        $this->db->order_by("book_cls_num", "desc");
        $query1 = $this->db->get();

        $this->db->select('TeachBook.*');
        $this->db->select('Coach.coach_name');
        $this->db->select('Coach.coach_face');
        $this->db->select('Course.cls_name');
        $this->db->select('School.jp_name');
        $this->db->where('book_stu_id', $id);
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_date', $time);
        $this->db->where('book_cls_num >', $cls);
        $this->db->from('TeachBook');
        $this->db->join('Coach', 'Coach.coach_id=TeachBook.book_coa_id');
        $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $this->db->join('School', 'School.jp_id=TeachBook.book_sch_id');
        $this->db->order_by("book_date", "desc");
        $this->db->order_by("book_cls_num", "desc");
        $query2 = $this->db->get();
        $query = array_merge($query2->result_array(), $query1->result_array());
        return $query;
    }

    public function select_further_detail_coa($id, $time, $cls) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('book_coa_id', $id);
        $this->db->where('book_date >', $time);
        $this->db->order_by("book_date", "asc");
        $this->db->order_by("book_cls_num", "asc");
        $query1 = $this->db->get('TeachBook');

        $this->db->select();
        $this->db->where('book_coa_id', $id);
        $this->db->where('book_date', $time);
        $this->db->where('book_cls_num >', $cls);
        $this->db->order_by("book_date", "asc");
        $this->db->order_by("book_cls_num", "asc");
        $query2 = $this->db->get('TeachBook');
        $query = array_merge($query2->result_array(), $query1->result_array());
        return $query;
    }

    public function select_further_unbook_coa($id, $time, $cls) {//返回退订的所有订单
        $this->db->select();
        $this->db->where('book_coa_id', $id);
        $this->db->where('book_date >', $time);
        $this->db->where('book_state', '7');
        $this->db->order_by("book_date", "asc");
        $this->db->order_by("book_cls_num", "asc");
        $query1 = $this->db->get('TeachBook');

        $this->db->select();
        $this->db->where('book_coa_id', $id);
        $this->db->where('book_date', $time);
        $this->db->where('book_cls_num >', $cls);
        $this->db->where('book_state', '7');
        $this->db->order_by("book_date", "asc");
        $this->db->order_by("book_cls_num", "asc");
        $query2 = $this->db->get('TeachBook');
        $query = array_merge($query2->result_array(), $query1->result_array());
        return $query;
    }

    public function select_school() {//返回该用户名所有信息
        $this->db->select('jp_id');
        $this->db->select('jp_name');
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }

    public function select_coa_id($id) {
        $this->db->select('book_coa_id');
        $this->db->where('book_id', $id);
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }

    public function select_info_coa($data) {//返回该教练被预约的课程时间
        $this->db->select('book_cls_num');
        $this->db->where('book_date', $data['book_date']);
        $STATE = array('1', '7');
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_coa_id', $data['book_coa_id']);
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }

    public function select_from_id($id) {//通过id查找订单详情。。。join
        $this->db->select('TeachBook.*');
        $this->db->select('Coach.coach_name');
        $this->db->select('Coach.coach_face');
        $this->db->select('Coach.coach_cls_cost');
        $this->db->select('Course.cls_name');
        $this->db->select('School.jp_name');
        $this->db->select('ClsComment.com_content');
        $this->db->select('ClsComment.com_level');
        $this->db->where('book_id', $id);
        $this->db->from('TeachBook');
        $this->db->join('Coach', 'Coach.coach_id=TeachBook.book_coa_id');
        $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id', 'left');
        $this->db->join('School', 'School.jp_id=TeachBook.book_sch_id');
        $this->db->join('ClsComment', 'ClsComment.com_cls_id=TeachBook.book_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete($data) {
        $this->db->where('book_id', $data);
        $query = $this->db->delete('TeachBook');
        return $query;
    }

    public function update_state($id, $data) {
        $this->db->where('book_id', $id);
        $result = $this->db->update('TeachBook', $data);
        return $result;
    }

    public function select_detail_from_time($coachID, $time1, $time2) {//教练查询教学情况，通过
       $this->db->select('TeachBook.*');
        $this->db->select('Course.cls_name');
        $this->db->select('School.jp_name');
        $this->db->select('AccessControl.stu_true_name');
        $this->db->select('AccessControl.stu_name');
        $this->db->select('AccessControl.stu_nick_name');
        $this->db->where('book_coa_id', $coachID);
        $this->db->where('book_date >=', $time1);
        $this->db->where('book_date <=', $time2);
        $this->db->order_by("book_date", "asc");
        $this->db->order_by("book_cls_num", "asc");
        $this->db->from('TeachBook');
        $this->db->join('AccessControl', 'AccessControl.stu_id=TeachBook.book_stu_id');
        $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $this->db->join('School', 'School.jp_id=TeachBook.book_sch_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_stu_count($coachID, $time1, $time2) {
        $this->db->select("book_stu_id");
        $this->db->distinct();
        $this->db->where('book_coa_id', $coachID);
        $this->db->where('book_date >=', $time1);
        $this->db->where('book_date <=', $time2);
        $query = $this->db->get('TeachBook');
        return count($query->result_array());
    }

    public function update_suggest($id, $data) {
        $this->db->where('book_id', $id);
        $result = $this->db->update('TeachBook', $data);
        return $result;
    }

    public function get_book_infos($UID) {   //选择出用户学习进度相关信息
        $this->db->select('TeachBook.*');
        $this->db->select('Coach.coach_name');
        $this->db->select('Coach.coach_face');
        $this->db->select('Course.cls_name');
        $this->db->select('School.jp_name');
        $this->db->where('book_stu_id', $UID);
        $this->db->from('TeachBook');
        $this->db->order_by("book_date", "desc");
        $this->db->join('Coach', 'Coach.coach_id=TeachBook.book_coa_id');
        $this->db->join('Course', 'Course.cls_id=TeachBook.book_cls_id');
        $this->db->join('School', 'School.jp_id=TeachBook.book_sch_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function un_study_cla_sum($id, $time, $cls) {//未学习的课程数统计
        $this->db->where('book_stu_id', $id);
        $this->db->where('book_date >', $time);
        $STATE = array('1', '7');
        $this->db->where_in('book_state', $STATE);
        $this->db->from('TeachBook');
        $query1 = $this->db->count_all_results();

        $this->db->select('TeachBook.*');
        $this->db->select('School.jp_name');
        $this->db->where('book_stu_id', $id);
        $this->db->where('book_date', $time);
        $this->db->where_in('book_state', $STATE);
        $this->db->where('book_cls_num >', $cls);
        $this->db->from('TeachBook');
        $query2 = $this->db->count_all_results();
        $query = $query1 + $query2;
        return $query;
    }

    public function un_comment_cla_sum($id, $time) {//未学习的课程数统计
        $this->db->where('book_stu_id', $id);
        $this->db->where('book_date <', $time);

        $this->db->where('ClsComment.com_cls_id', null);
        $this->db->from('TeachBook');
        $this->db->join('ClsComment', 'ClsComment.com_cls_id=TeachBook.book_id', 'left');
        $query = $this->db->count_all_results();
        return $query;
    }

    public function select_by_id($id) {
        $this->db->select();
        $this->db->where('book_id', $id);
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }
    public function check_is_exist($data,$book_coa_id){
        $this->db->select();
        $where='';
        foreach($data as  $row){
            $one="(book_date='".$row['date']. "' AND book_cls_num='".$row['cls']."' AND book_coa_id='".$book_coa_id."' AND book_state!='6')";
            if($where!=''){
                $where=$where." OR ".$one;
            }else{
                $where=$one;
            }
        }
        $this->db->where($where);
        $query = $this->db->get('TeachBook');
        return $query->result_array();
    }

}
