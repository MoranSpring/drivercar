<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cash_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function back_money($csm_record, $data, $id, $back_money, $UID) {    //把数据增加到Consumption表中.
        $ConsumptionSQL = "INSERT INTO Consumption(csm_id,csm_stu_id,csm_in_out,csm_rec_id,csm_type,csm_coin,csm_date)"
                . "  VALUES  ("
                . "'" . $csm_record['csm_id'] . "',"
                . "'" . $csm_record['csm_stu_id'] . "',"
                . "'" . $csm_record['csm_in_out'] . "',"
                . "'" . $csm_record['csm_rec_id'] . "',"
                . "'" . $csm_record['csm_type'] . "',"
                . "'" . $csm_record['csm_coin'] . "',"
                . "'" . $csm_record['csm_date'] . "'"
                . ");";
        $TeachStateSQL = "UPDATE TeachBook "
                . " SET  book_state=" . $data['book_state']
                . " WHERE book_id=" . "'" . $id . "';";
        $BackMoneySQL = "UPDATE UserCoin"
                . " SET uc_num=" . $back_money
                . " WHERE uc_stu_id=" . "'" . $UID . "';";
        $this->db->trans_start();
        $this->db->query($ConsumptionSQL);
        $this->db->query($TeachStateSQL);
        $this->db->query($BackMoneySQL);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            // 生成一条错误信息... 或者使用 log_message() 函数来记录你的错误信息
            return false;
        } else {
            return true;
        }
    }

    public function teach_book_waste_money($DateArray, $RecordArray, $book_stu_id, $data) {    //把数据增加到Consumption表中.
        $where = '';
        foreach ($DateArray as $row) {
            $one = "("
                    . "'" . $row['book_id'] . "',"
                    . "'" . $row['book_stu_id'] . "',"
                    . "'" . $row['book_coa_id'] . "',"
                    . "'" . $row['book_sch_id'] . "',"
                    . "'" . $row['book_cls_id'] . "',"
                    . "'" . $row['book_state'] . "',"
                    . "'" . $row['book_date'] . "',"
                    . "'" . $row['book_cls_num'] . "',"
                    . "'" . $row['book_time'] . "'"
                    . ")";
            if ($where != '') {
                $where = $where . " , " . $one;
            } else {
                $where = $one;
            }
        }
        $TeachBookSQL = "INSERT INTO TeachBook(book_id,book_stu_id,book_coa_id,book_sch_id,book_cls_id,book_state,book_date,book_cls_num,book_time)"
                . "  VALUES " . $where . ";";

        $csm_where = '';
        foreach ($RecordArray as $row) {
            $csm_one = "("
                    . "'" . $row['csm_id'] . "',"
                    . "'" . $row['csm_rec_id'] . "',"
                    . "'" . $row['csm_stu_id'] . "',"
                    . "'" . $row['csm_in_out'] . "',"
                    . "'" . $row['csm_type'] . "',"
                    . "'" . $row['csm_coin'] . "',"
                    . "'" . $row['csm_date'] . "'"
                    . ")";
            if ($csm_where != '') {
                $csm_where = $csm_where . " , " . $csm_one;
            } else {
                $csm_where = $csm_one;
            }
        }
        $ConsumptionSQL = "INSERT INTO Consumption(csm_id,csm_rec_id,csm_stu_id,csm_in_out,csm_type,csm_coin,csm_date)"
                . "  VALUES " . $csm_where . ";";


        $PayMoneySQL = "UPDATE UserCoin"
                . " SET uc_num=" . $data['uc_num']
                . " WHERE uc_stu_id=" . "'" . $book_stu_id . "';";
        $this->db->trans_start();
        $this->db->query($TeachBookSQL);
        $this->db->query($ConsumptionSQL);
        $this->db->query($PayMoneySQL);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            // 生成一条错误信息... 或者使用 log_message() 函数来记录你的错误信息
            return false;
        } else {
            return true;
        }
    }

    public function select($data) {//返回该用户名所有信息
        $this->db->select();
        $this->db->where('sc_stu', $data);
        $query = $this->db->get('StaticCoach');
        return $query->result_array();
    }

    public function insert_recharge_card($data) {//返回该用户名所有信息
        $result = $this->db->insert('RechargeCard', $data);
        return $result;
    }

    public function purchase_by_card($UID, $money, $RecordArray, $RechargeArray) {

        $RechargeCardSQL = "UPDATE RechargeCard  SET "
                . "rc_purchaser='" . $UID . "',"
                . "rc_purchase_time='" . $RechargeArray['rc_purchase_time'] . "',"
                . "rc_state='1' "
                . " WHERE rc_card_id=" . "'" . $RechargeArray['rc_card_id'] . "' AND rc_psw='".$RechargeArray['rc_card_psw']."' AND rc_state='0';";


        $csm_where = '';
        foreach ($RecordArray as $row) {
            $csm_one = "("
                    . "'" . $row['csm_id'] . "',"
                    . "'" . $row['csm_rec_id'] . "',"
                    . "'" . $row['csm_stu_id'] . "',"
                    . "'" . $row['csm_in_out'] . "',"
                    . "'" . $row['csm_type'] . "',"
                    . "'" . $row['csm_coin'] . "',"
                    . "'" . $row['csm_date'] . "'"
                    . ")";
            if ($csm_where != '') {
                $csm_where = $csm_where . " , " . $csm_one;
            } else {
                $csm_where = $csm_one;
            }
        }
        $RecordSQL = "INSERT INTO Consumption(csm_id,csm_rec_id,csm_stu_id,csm_in_out,csm_type,csm_coin,csm_date)"
                . "  VALUES " . $csm_where . ";";


        $PayMoneySQL = "UPDATE UserCoin"
                . " SET uc_num= uc_num+" . $money
                . " WHERE uc_stu_id=" . "'" . $UID . "';";

        $this->db->trans_start();
        $this->db->query($RechargeCardSQL);
        $this->db->query($RecordSQL);
        $this->db->query($PayMoneySQL);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            // 生成一条错误信息... 或者使用 log_message() 函数来记录你的错误信息
            return false;
        } else {
            return true;
        }
    }

}
