<?php

if (!defined('BASEPATH'))
    exit('No direct access allowed.');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function getTime() {
        $timeArray = getdate();
        $CurrentTime = $timeArray["year"] . "-" . $timeArray["mon"] . "-" . $timeArray["mday"] . " " . $timeArray["hours"] . ":" . $timeArray["minutes"] . ":" . $timeArray["seconds"];
        return $CurrentTime;
    }

    public function getDate() {
        $timeArray = getdate();
        $CurrentTime = $timeArray["year"] . "-" . $timeArray["mon"] . "-" . $timeArray["mday"];
        return $CurrentTime;
    }

    public function getCurrentCls() {
        $timeArray = getdate();
        $CurrentHours = $timeArray["hours"];
        if ($CurrentHours < 8) {
            return 0;
        } else if ($CurrentHours < 9) {
            return 1;
        } else if ($CurrentHours < 10) {
            return 2;
        } else if ($CurrentHours < 11) {
            return 3;
        } else if ($CurrentHours < 12) {
            return 4;
        } else if ($CurrentHours < 14) {
            return 5;
        } else if ($CurrentHours < 15) {
            return 6;
        } else if ($CurrentHours < 16) {
            return 7;
        } else if ($CurrentHours < 17) {
            return 8;
        } else if ($CurrentHours < 18) {
            return 9;
        } else if ($CurrentHours < 18) {
            return 10;
        }
        return 11;
    }

    public function getClassType($id = '021') {
        $type = ($id - $id % 10) / 10;
        if ($type == 1) {
            return '科目一';
        } else if ($type == 2) {
            return '科目二';
        } else if ($type == 3) {
            return '科目三';
        } else {
            return '其他';
        }
    }

    public function _request($url, $posts = null) {
        if (is_array($posts) && !empty($posts)) {
            foreach ($posts as $key => $value) {
                $post[] = $key . '=' . urlencode($value);
            }
            $posts = implode('&', $post);
        }
        $curl = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($curl, $options);
        $retval = curl_exec($curl);
        return $retval;
    }

}
