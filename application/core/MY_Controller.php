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
        if($CurrentHours<8){
            return 0;
        }else if($CurrentHours<9){
             return 1;
        }
        else if($CurrentHours<10){
             return 2;
        }
        else if($CurrentHours<11){
             return 3;
        }
        else if($CurrentHours<12){
             return 4;
        }
        else if($CurrentHours<14){
             return 5;
        }
        else if($CurrentHours<15){
             return 6;
        }
        else if($CurrentHours<16){
             return 7;
        }
        else if($CurrentHours<17){
             return 8;
        }
        else if($CurrentHours<18){
             return 9;
        }
        else if($CurrentHours<18){
             return 10;
        }
        return 11;
    }

}
