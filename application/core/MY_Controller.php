<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

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

   

}
