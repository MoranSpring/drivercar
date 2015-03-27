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
        $this->load->model('accesscontrol_model');
        $this->load->library('oss/alioss');
        $this->load->model('news_model');
        $this->load->model('school_model');
        $this->load->model('coach_model');
    }

    public function index() {
        $this->view();
    }
    public function view($page = '') {
       
        if ($page == '') {
            $body['content'] = $this->load->view('admin_views/insert_info', '', true);
        } else {
            $body['content'] = $page;
        }
        $this->load->view('admin_views/template', $body);
    }
    public function insert_info(){
        $page = $this->load->view('admin_views/insert_info', '', true);
        $this->view($page);
    }
    public function check_info(){
        $page = $this->load->view('admin_views/check_info', '', true);
        $this->view($page);
    }
    
    
    
    
    
    
    
    
    
    
    
//文件上传 begin
    public function news_upload() {
        $news_id = time();
        $news_title = $this->input->post('news_title');
        $news_type = $this->input->post('news_type');
        $news_author = $this->input->post('news_author');
        $news_content = $this->input->post('news_content');
        $news_date = $this->input->post('news_date');
        $news_imge = 'http://driver-un.oss-cn-shenzhen.aliyuncs.com/' . $news_id . '.jpg';
        $hasImg = false;
        $data = array(
            'news_id' => $news_id,
            'news_title' => $news_title,
            'news_type' => $news_type,
            'news_content' => $news_content,
            'news_author' => $news_author,
            'news_date' => $news_date,
        );
        $image = array(
            'news_imge' => $news_imge
        );

        
        if($this->_is_upload_imge($news_id)==true){
            $result = $this->news_model->insert(array_merge($data,$image));
        }else{
            $result = $this->news_model->insert($data);
        }
        if ($result == 1) {
//            redirect();
            echo 'insert success!!'.$hasImg;
        } else {
            echo 'insert error!'.$hasImg;
        }
    }
    public function school_upload() {
        $jp_id = time();
        $jp_name = $this->input->post('jp_name');
        $jp_addr = $this->input->post('jp_addr');
        $jp_car_num = $this->input->post('jp_car_num');
        $jp_half_num = $this->input->post('jp_half_num');
        $jp_zhi_num = $this->input->post('jp_zhi_num');
        $jp_s_num = $this->input->post('jp_s_num');
        $jp_ku_num = $this->input->post('jp_ku_num');
        $jp_ce_num = $this->input->post('jp_ce_num');
        $jp_coach_num = $this->input->post('jp_coach_num');
        $jp_intro = $this->input->post('jp_intro');
        $jp_reg_date = $this->getDate();
        $jp_imge = 'http://driver-un.oss-cn-shenzhen.aliyuncs.com/' . $jp_id . '.jpg';
        $hasImg = false;
        $data = array(
            'jp_id' => $jp_id,
            'jp_name' => $jp_name,
            'jp_addr' => $jp_addr,
            'jp_car_num' => $jp_car_num,
            'jp_half_num' => $jp_half_num,
            'jp_zhi_num' => $jp_zhi_num,
            'jp_s_num' => $jp_s_num,
            'jp_ku_num' => $jp_ku_num,
            'jp_ce_num' => $jp_ce_num,
            'jp_coach_num' => $jp_coach_num,
            'jp_intro' => $jp_intro,
            'jp_reg_date' => $jp_reg_date
        );
        $image = array(
            'jp_imge' => $jp_imge
        );

        
        if($this->_is_upload_imge($jp_id)==true){
            $result = $this->school_model->insert(array_merge($data,$image));
        }else{
            $result = $this->school_model->insert($data);
        }
        if ($result == 1) {
//            redirect();
            echo 'insert success!!'.$hasImg;
        } else {
            echo 'insert error!'.$hasImg;
        }
    }public function coach_upload() {
        $coach_id = time();
        $coach_name = $this->input->post('coach_name');
        $coach_workid = $this->input->post('coach_workid');
        $coach_old = $this->input->post('coach_old');
        $coach_sch_id = $this->input->post('coach_sch_id');
        $coach_car_old = $this->input->post('coach_car_old');
        $coach_reg_time =$this->getDate();
        $coach_face = 'http://driver-un.oss-cn-shenzhen.aliyuncs.com/' . $coach_id . '.jpg';
        $coach_intro = $this->input->post('coach_intro');
        $data = array(
            'coach_id' => $coach_id,
            'coach_name' => $coach_name,
            'coach_workid' => $coach_workid,
            'coach_old' => $coach_old,
            'coach_sch_id' => $coach_sch_id,
            'coach_car_old' => $coach_car_old,
            'coach_reg_time' => $coach_reg_time,
            'coach_intro' => $coach_intro
        );
        $image = array(
           'coach_face' => $coach_face
        );
        if($this->_is_upload_imge($coach_id)==true){
            $result = $this->coach_model->insert(array_merge($data,$image));
        }else{
            $result = $this->coach_model->insert($data);
        }
        if ($result == 1) {
//            redirect();
            echo 'insert success!!';
        } else {
            echo 'insert error!';
        }
    }
    
    function _is_upload_imge($news_id){
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/png") || 
                ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) && 
                ($_FILES["file"]["size"] < 2000000)) {
            if ($_FILES["file"]["error"] > 0) {
//                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            } else {
                $status = $this->_upload_by_content($news_id);
                if ($status == 200) {
                    return TRUE;
                }
            }
        } else {
//            echo "Invalid file";
        }
        return FALSE;
        
    }

    function _upload_by_content($name) {
        $bucket = 'driver-un';
        $object = $name . '.jpg';
        $filepath = $_FILES["file"]["tmp_name"];  //英文
        $options = array(
            ALIOSS::OSS_FILE_UPLOAD => $filepath,
            'partSize' => 5242880,
        );
        $response = $this->alioss->create_mpu_object($bucket, $object, $options);

        return $response->status;
    }
//文件上传 end
    function get_schools(){
        $result = $this->school_model->select_school();
        echo json_encode($result);
        
    }
    function get_coach_via_sch($id){
        $result = $this->coach_model->select_coach($id);
        echo json_encode($result);
        
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
