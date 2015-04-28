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
        $this->load->model('serialnumber_model');
        $this->load->model('school_model');
    }

    public function index() {
        $this->view();
     

//        $bucket = 'driver-un';
//	$object = 'logo.jpg';	
//	$file_path ="C:\\Users\\KYLE\\Desktop\\logo.png";
//	$response = $this->alioss->upload_file_by_file($bucket,$object,$file_path);
//	$this->_format($response);
//        $this->load->view('ad_views/ad');
//                $this->load->view('test3');
//        redirect('first/sch_info');
//        redirect('vipcenter');
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
            $this->sch_info();
            return false;
        } else {
            $body['content'] = $page;
        }

        $body['footer'] = $this->load->view('common_views/footer', '', true);
        $this->load->view('a_views/template', $body);
    }

    public function sch_info() {
        $oneNews = array();
        $news = $this->news_model->select_simple();
        $topNews = $this->news_model->select_TopNews();
        $topNewsId = "";
        $sub1NewsId = "";
        $sub2NewsId = "";
        foreach ($topNews as $value) {
            if ($value['news_postion'] == 1) {
                $topNewsId = $value['news_id'];
            } else if ($value['news_postion'] == 2) {
                $sub1NewsId = $value['news_id'];
            } else if ($value['news_postion'] == 3) {
                $sub2NewsId = $value['news_id'];
            }
        }
        $a = $b = $c = $d = $e = $f = $g = 1;
        foreach ($news as $row) {
            if ($row['news_id'] == $topNewsId) {
                $oneNews['topNewsTitle'][0] = $row['news_title'];
                $oneNews['topNewsUrl'][0] = $row['news_imge'];
                $oneNews['topNewsMainidea'][0] = $row['news_mainidea'];
                $oneNews['topNewsId'][0] = $row['news_id'];
                $oneNews['topNewsAuthor'][0] = $row['news_author'];
                $oneNews['topNewsTime'][0] = $row['news_date'];
            } else if ($row['news_id'] == $sub1NewsId) {
                $oneNews['sub1NewsTitle'][0] = $row['news_title'];
                $oneNews['sub1NewsId'][0] = $row['news_id'];
                $oneNews['sub1NewsUrl'][0] = $row['news_imge'];
            } else if ($row['news_id'] == $sub2NewsId) {
                $oneNews['sub2NewsTitle'][0] = $row['news_title'];
                $oneNews['sub2NewsId'][0] = $row['news_id'];
                $oneNews['sub2NewsUrl'][0] = $row['news_imge'];
            }

            switch ($row['news_type']) {
                case 1:
                    if ($a == 1) {
                        $oneNews['news1'][$a] = $this->load->view('a_views/news_list_first', $row, true);
                    } else {
                        $oneNews['news1'][$a] = $this->load->view('a_views/news_list', $row, true);
                    }
                    $a++;
                    break;
                case 2:
                    if ($b == 1) {
                        $oneNews['news2'][$b] = $this->load->view('a_views/news_list_first', $row, true);
                    } else {
                        $oneNews['news2'][$b] = $this->load->view('a_views/news_list', $row, true);
                    }
                    $b++;
                    break;
                case 3:
                    if ($c == 1) {
                        $oneNews['news3'][$c] = $this->load->view('a_views/news_list_first', $row, true);
                    } else {
                        $oneNews['news3'][$c] = $this->load->view('a_views/news_list', $row, true);
                    }
                    $c++;
                    break;
                case 4:
                    if ($d == 1) {
                        $oneNews['news4'][$d] = $this->load->view('a_views/news_list_first', $row, true);
                    } else {
                        $oneNews['news4'][$d] = $this->load->view('a_views/news_list', $row, true);
                    }
                    $d++;
                    break;
                case 5:
                    if ($e == 1) {
                        $oneNews['news5'][$e] = $this->load->view('a_views/news_list_first', $row, true);
                    } else {
                        $oneNews['news5'][$e] = $this->load->view('a_views/news_list', $row, true);
                    }
                    $e++;
                    break;
                case 6:
                    if ($f == 1) {
                        $oneNews['news6'][$f] = $this->load->view('a_views/news_list_first', $row, true);
                    } else {
                        $oneNews['news6'][$f] = $this->load->view('a_views/news_list', $row, true);
                    }
                    $f++;
                    break;
            }
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

    public function school_info() {
        $page = $this->load->view('a_views/school_info', '', true);
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

    public function coach_center() {
        //---------------------------------------
        //some info insert;
        //-----------------------------------------
        $body['isCoach'] = false;
        $body['book_date2'] = "afafdas";
        $page = $this->load->view('coach_views/self_info', $body, true);

        $this->view($page);
    }
    public function coach_self_info(){
//        $UID = $this->session->userdata('UID');
        $UID='1427162541';
        $result = $this->coach_model->select_detail($UID);
        
        $isCoach= $this->session->userdata('TYPE')==1?  true  : false;
        $page="";
        foreach ($result as $row) {
            $schName = $this->school_model->select_name($row['coach_sch_id']);
            $row['coach_sch_name'] = $schName[0]['jp_name'];
            $row['isCoach'] = $isCoach;
            $page = $this->load->view('coach_views/self_info',$row, true);
        }
        $this->view($page);
    }

    public function forgetPwd() {
        $this->load->view('login_views/forget_pwd.php');
    }

//--------------注册------------------------
    public function register() {
        $this->load->view('register_views/template');
    }

    public function register_insert() {
        $username = $this->input->post('username');
        $password = $this->input->post('userpass');
        $email = $this->input->post('useremail');
        $stu_type = $this->input->post('user_type');

        $reg_time = $this->getTime();

        $Uid = time();
        $datas = array(
            'stu_id' => $Uid,
            'stu_name' => $username,
            'stu_email' => $email,
            'stu_pwd' => md5($password),
            'stu_type' => $stu_type,
            'stu_reg_time' => $reg_time
        );
        if ($stu_type == 3) {
            $result = $this->accesscontrol_model->insert($datas);
            if ($result == 1) {
                $this->session->set_userdata('UID', $Uid);
                $this->session->set_userdata('TYPE', $stu_type);
                $this->session->set_userdata('name', $username);
                $sess = $this->session->all_userdata();
                redirect();
                echo '"insert success !"';
                return;
            } else {
                echo 'insert  error !';
                return;
            }
        }

        $vip_serial_num = $this->input->post('vip_serial_num');
        $train_serial_num = $this->input->post('train_serial_num');
        if ($stu_type == 2) {
            $serial_num = $vip_serial_num;
        } elseif ($stu_type == 1) {
            $serial_num = $train_serial_num;
        } else {
            exit(0);
        }
        //$sernum_row=$this->serialnumber_model->selectBySerNum($serial_num);
        //$sernum_row[0]['serial_valid']=0;
        $attr_arr = array('serial_valid' => 0);
        $ser_num_vali = $this->serialnumber_model->SerValidChange($serial_num, $attr_arr);
        if ($ser_num_vali) {
            $result = $this->accesscontrol_model->insert($datas);
            if ($result == 1) {
                $this->session->set_userdata('UID', $Uid);
                $this->session->set_userdata('TYPE', $stu_type);
                $this->session->set_userdata('name', $username);
                $sess = $this->session->all_userdata();
                //print_r($sess);
                if ($stu_type == 2) {
                    redirect();
                } else {
                    redirect('coach');
                }
            } else {
                echo 'insert error!';
            }
            echo '序列号状态修改成功！';
        } else {
            echo '序列号状态修改失败！';
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

    public function login_mailexist() {
        $email = $this->input->post('email');
        $Result = $this->accesscontrol_model->loginMailExist($email);
        if ($Result == null) {
            echo "no exist";
//            echo 'This user is not exist.';
            return false;
        } else {
            echo true;
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
                if ($row['stu_true_name'] != null) {
                    $this->session->set_userdata('name', $row['stu_true_name']);
                } else if ($row['stu_nick_name'] != null) {
                    $this->session->set_userdata('name', $row['stu_nick_name']);
                } else {
                    $this->session->set_userdata('name', $name);
                }
                if ($row['stu_type'] == 3) {
                    redirect();
                } else if ($row['stu_type'] == 1) {
                    redirect('coach');
                } else if ($row['stu_type'] == 0) {
                    redirect('admin');
                } else {
                    redirect();
                }



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

    public function sendEmail($mail_address, $mail_con, $mail_time) {
        $this->load->library('email');
        $this->email->from('kyleml@126.com', '我爱开车网');

        $this->email->to($mail_address);

        $this->email->subject('验证码邮件');

        $this->session->set_userdata('EMAILID', $mail_con);
        $gmt = date('r', $mail_time);
        $this->email->message("<html><div>这封邮件发送的是我爱开车网注册邮箱验证码：" . "<span style=" . '"color:red;"' . ">" . $mail_con . "</span>" . "</div><div>邮件发送时间    ：" . $gmt . "  如果您没有进行此类操作，请忽略！</div></html>");
        $result = $this->email->send();
        //echo $this->email->print_debugger();
        return $result;
    }

    function RegmailVali() {
        $this->load->helper('date');
        $reg_email = $this->input->post("reg_email");
        $reg_email_str = $this->input->post("reg_email_str");
        $send_time = time();
        $result = $this->sendEmail($reg_email, $reg_email_str, $send_time);
        $data = array('reg_email_str' => $reg_email_str, 'send_time' => $send_time, 'result' => $result);
        echo json_encode($data);
    }

}
