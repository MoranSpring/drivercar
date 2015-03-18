<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
//        $this->load->model('accesscontrol_model');
        $this->load->library('oss/alioss');
        $this->load->model('news_model');
    }
    public function index(){
        $this->load->view('admin_views/template');
    }
    
    public function upload() {
        $news_id=  time();
        $news_title=$this->input->post('news_title');
        $news_type=$this->input->post('news_type');
        $news_author=$this->input->post('news_author');
        $news_content=$this->input->post('news_content');
        $news_date=$this->input->post('news_date');
        $news_imge='http://driver-un.oss-cn-shenzhen.aliyuncs.com/'.$news_id.'.jpg';
        
        $data=array(
            'news_id'=>$news_id,
            'news_title'=>$news_title,
            'news_type'=>$news_type,
            'news_content'=>$news_content,
            'news_author'=>$news_author,
            'news_imge'=>$news_imge,
            'news_date'=>$news_date,
        );
        $result = $this->news_model->insert($data);
        if ($result == 1) {
//            redirect();
            echo 'insert success!!';
        } else {
            echo 'insert error!';
        }

        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000)) {
            if ($_FILES["file"]["error"] > 0) {
//                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            } else {
               $this->upload_by_content($news_id);
            }
        } else {
            echo "Invalid file";
        }
    }

    function upload_by_content($name) {
        $bucket = 'driver-un';
        $object = $name.'.jpg';
        $filepath =  $_FILES["file"]["tmp_name"] ;  //英文
	$options = array(
		ALIOSS::OSS_FILE_UPLOAD => $filepath,
		'partSize' => 5242880,
	);
	$response = $this->alioss->create_mpu_object($bucket, $object,$options);


        $this->_format($response);
    }

    function _format($response) {
        echo '|-----------------------Start---------------------------------------' . "<br/>";
        echo '|-Status:' . $response->status . "\n";
        echo '|-Body:' . "\n";
        echo $response->body . "\n";
        echo "|-Header:\n";
        print_r($response->header);
        echo '-----------------------End--------------------------------------' . "<br/><br/>";
    }
    

}
