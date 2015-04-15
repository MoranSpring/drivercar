<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class First extends MY_Controller {

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
        $this->load->model('news_model');
        $this->load->library('oss/alioss');
        $this->load->model('coach_model');
    }

    public function index() {
//        $this->view();
//        $bucket = 'driver-un';
//	$object = 'logo.jpg';	
//	$file_path ="C:\\Users\\KYLE\\Desktop\\logo.png";
//	$response = $this->alioss->upload_file_by_file($bucket,$object,$file_path);
//	$this->_format($response);
//        $this->load->view('ad_views/ad');
//                $this->load->view('test3');
//        redirect('first/sch_info');
        redirect('vipcenter');
    }

    public function view($page = '') {
        
        $name = $this->session->userdata('name');
        if ($name == null) {
            $body['header'] = $this->load->view('common_views/header', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('common_views/header_logined', $data, true);
        }
        $body['navigation'] = $this->load->view('common_views/navigation', '', true);
        if ($page == '') {
            $body['content'] = $this->load->view('a_views/sch_info', '', true);
        } else {
            $body['content'] = $page;
        }

        $body['footer'] = $this->load->view('common_views/footer', '', true);
        $this->load->view('a_views/template', $body);
    }

    public function sch_info() {
        $oneNews = array();
        $news = $this->news_model->select_simple();
        $i = 0;
        foreach ($news as $row) {
            switch ($row['news_type']) {
                case 1:
                    $oneNews['news1'][$i] = $this->load->view('a_views/news_list', $row, true);
                    break;
                case 2:
                    $oneNews['news2'][$i] = $this->load->view('a_views/news_list', $row, true);
                    break;
                case 3:
                    $oneNews['news3'][$i] = $this->load->view('a_views/news_list', $row, true);
                    break;
                case 4:
                    $oneNews['news4'][$i] = $this->load->view('a_views/news_list', $row, true);
                    break;
                case 5:
                    $oneNews['news5'][$i] = $this->load->view('a_views/news_list', $row, true);
                    break;
                case 6:
                    $oneNews['news6'][$i] = $this->load->view('a_views/news_list', $row, true);
                    break;
            }
            $i++;
//             print_r($row);
//            echo '<br/>';
//            foreach ($row as $key => $value) {
//                $temparray[$i][$key] = $value;
//            }
//            $i++;
        }
//        foreach ($temparray as $row) {
//            print_r($row);
//            echo '<br/>';
//        }

        $page = $this->load->view('a_views/sch_info', $oneNews, true);
        $this->view($page);
    }

    public function pos_info() {
        $page = $this->load->view('a_views/pos_info', '', true);
        $this->view($page);
    }

    public function ser_info() {
        $page = $this->load->view('a_views/ser_info', '', true);
        $this->view($page);
    }

    public function coach_info() {
        $page = $this->load->view('a_views/coach_info', '', true);
        $this->view($page);
    }

//--------------注册------------------------
    public function register() {
        $this->load->view('register_views/template');
    }

    public function register_insert() {
        $username = $this->input->post('username');
        $password = $this->input->post('userpass');
        $email = $this->input->post('useremail');
        $reg_time = $this->getTime();
        $stu_type = 3;
        $Uid = time();
        $datas = array(
            'stu_id' => $Uid,
            'stu_name' => $username,
            'stu_email' => $email,
            'stu_pwd' => md5($password),
            'stu_type' => $stu_type,
            'stu_reg_time' => $reg_time
        );
        $result = $this->accesscontrol_model->insert($datas);
        if ($result == 1) {
            $this->session->set_userdata('name', $username);
            redirect();
        } else {
            echo 'insert error!';
        }
    }

    public function login_check() {
        $name = $this->input->get('name');
        $Result = $this->accesscontrol_model->loginSelect($name);
        if ($Result == null) {
            echo "no exist";
//            echo 'This user is not exist.';
            return false;
        } else {
            echo TRUE;
        }
    }

    public function login() {
        $data = array('error' => '');
        $this->load->view('login_views/template', $data);
    }

    public function login_psw_check() {
        $name = $this->input->post('name');
        $psw = $this->input->post('password');
        $Result = $this->accesscontrol_model->loginSelect($name);
        foreach ($Result as $row) {
            if ($row['stu_pwd'] != md5($psw)) {
                $data = array(
                    'error' => '密码错误！'
                );
                $this->load->view('login_views/template', $data);
                return false;
            } else {
                $this->session->set_userdata('UID', $row['stu_id']);
                $this->session->set_userdata('TYPE', $row['stu_type']);
                $this->session->set_userdata('name', $name);
                redirect();

                return true;
            }
            exit();
        }
        $data = array(
            'error' => '密码错误！'
        );
        $this->load->view('login_views/template', $data);
    }

    public function login_exit() {
        $this->session->sess_destroy();
        redirect();
    }

//--------------验证码------------------------
    public function verify_image() {

        $conf['name'] = 'verify_code'; //作为配置参数  

        $this->load->library('captcha', $conf);
        $this->captcha->show();
        $yzm_session = $this->session->userdata('verify_code');
        echo $yzm_session;
    }

    public function get_verify_code() {

        $yzm_session = $this->session->userdata('verify_code');
        echo $yzm_session;
    }

//--------------验证码------------------------
    public function news($id = '') {
        $news = $this->news_model->select_detail($id);
        foreach ($news as $row) {
            $row['news_content'] = preg_replace('/\n/', '<p/><p>', $row['news_content']);
            $row['news_imge'].="@!newsimg";
            $page = $this->load->view('a_views/news', $row, true);
        }

        $this->view($page);
    }

    public function getcityData() {
        $retval = $this->_request('http://driver-un.oss-cn-shenzhen.aliyuncs.com/js/cityData.min.js');

        if ($retval !== false) {
            echo $retval;
        }
    }

    public function test() {
        $data1 = array(
            'coach_id' => '12345678',
            'coach_name' => 'jald',
            'coach_workid' => 'jald',
            'coach_reg_time' => $this->getTime()
        );
        $data2 = array(
            'coach_id' => '165432',
            'coach_name' => 'gfdddddd',
            'coach_workid' => 'jasd',
            'coach_reg_time' => $this->getTime()
        );
        $arr = array();
        $arr[] = $data1;
        $arr[] = $data2;
        $result = $this->coach_model->insert($arr);
        echo $result;
    }

    function _request($url, $posts = null) {
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

    public function sendEmail() {
        $this->load->library('email');
        $this->email->from('kyleml@126.com', 'Your Name');
        $this->email->to('554858916@qq.com');

        $this->email->subject('Email Test');
        
        $random=md5(time());
        $this->session->set_userdata('EMAILID', $random);
        $url="http://localhost:8888/index.php/first/vadication?id=$random";
        $this->email->message('Testing the:    '.$url );

        $this->email->send();

        echo $this->email->print_debugger();
    }
    function vadication(){
        $id=$this->input->get("id");
        $emailid = $this->session->userdata('EMAILID');
        if($id==$emailid){
            echo 'success!!!!!!!!!!!';
        }else{
            echo 'fail!!!!!!!!!!!';
        }
    }

}
