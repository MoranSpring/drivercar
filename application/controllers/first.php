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
        $this->load->model('usercoin_model');
    }

    public function index() {
//        $this->view();
        $this->load->library('user_agent');
        if ($this->agent->is_mobile()) {
            //echo "mobile"." ===". $this->agent->mobile();
//            $this->load->view('mobile/login_views/template');
            redirect('mobile');
        } else {
            $this->view();
        }
    }

    public function view($title = '', $page = '') {
        $name = $this->session->userdata('name');
        if ($name == null) {
            $body['header'] = $this->load->view('common_views/header', '', true);
        } else {
            $data = array('username' => $name);
            $body['header'] = $this->load->view('common_views/header_logined', $data, true);
        }
        $body['navigation'] = $this->load->view('common_views/navigation', '', true);
        if ($page == '') {
            $this->index_page();
            return false;
        } else {
            $body['content'] = $page;
        }
        if ($title == '') {
            $body['title'] = "首页-我爱开车网";
        } else {
            $body['title'] = $title;
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


        $page = $this->load->view('a_views/sch_info', $oneNews, true);
        $title = "驾培资讯首页 - 我爱开车网";
        $this->view($title, $page);
    }

    public function pos_info() {
        $page = $this->load->view('a_views/pos_info', '', true);
        $title = "驾培点信息 - 我爱开车网";
        $this->view($title, $page);
    }

    public function index_page() {
        $page = $this->load->view('a_views/index', '', true);
        $title = "首页 - 我爱开车网";
        $this->view($title, $page);
    }

    public function school_info($id = '') {
        if ($id == '')
            exit(0);
        $result = $this->school_model->get_from_id($id);
        $list = '';
        $title = '';
        foreach ($result as $row) {
            $list = $this->load->view('a_views/school_info', $row, true);
            $title = $row['jp_name'] . " - 我爱开车网";
        }

        $this->view($title, $list);
    }

    public function ser_info() {
        $page = $this->load->view('a_views/ser_info', '', true);
        $title = "服务指南 - 我爱开车网";
        $this->view($title, $page);
    }

    public function coach_info() {
        $page = $this->load->view('a_views/coach_info', '', true);
        $title = "教练信息 - 我爱开车网";
        $this->view($title, $page);
    }

    public function coach_center() {
        //---------------------------------------
        //some info insert;
        //-----------------------------------------
        $body['isCoach'] = false;
        $body['book_date2'] = "afafdas";
        $page = $this->load->view('coach_views/self_info', $body, true);
        $title = "驾培点信息 - 我爱开车网";
        $this->view($title, $page);
    }

    public function coach_self_info() {
//        $UID = $this->session->userdata('UID');
        $UID = '1427162541';
        $result = $this->coach_model->select_detail($UID);

        $isCoach = $this->session->userdata('TYPE') == 1 ? true : false;
        $page = "";
        foreach ($result as $row) {
            $schName = $this->school_model->select_name($row['coach_sch_id']);
            $row['coach_sch_name'] = $schName[0]['jp_name'];
            $row['isCoach'] = $isCoach;
            $page = $this->load->view('coach_views/self_info', $row, true);
            $title = $row['coach_name'] . "教练员主页 - 我爱开车网";
        }

        $this->view($title, $page);
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
        $email = $this->input->post('useremail') == null ? null : $this->input->post('useremail');
        $phone = $this->input->post('phone') == '' ? '' : $this->input->post('phone');
        $stu_type = $this->input->post('user_type');
        $phone_code = $this->input->post('reg_mail_key');
        $reg_time = $this->getTime();
        $Uid = time();
        $datas = array(
            'stu_id' => $Uid,
            'stu_name' => $username,
            'stu_email' => $email,
            'stu_tel' => $phone,
            'stu_pwd' => md5($password),
            'stu_type' => $stu_type,
            'stu_reg_time' => $reg_time
        );
        //检查手机号码是不是对的
        if ($phone_code != $this->session->userdata('phone_verify_code')) {
            echo '手机验证码异常错误';
            return false;
        }
        if ($stu_type == 3) {
            //将数据插入用户表,普通注册用户
            $result = $this->accesscontrol_model->insert($datas);
            $coin_data = array(
                'uc_id' => 'coin' . $Uid,
                'uc_stu_id' => $Uid,
                'uc_num' => 0
            );
            if ($result == 1) {
                $result = $this->usercoin_model->insert($coin_data);
            }
            if ($result == 1) {
                //设置session
                $this->session->set_userdata('UID', $Uid);
                $this->session->set_userdata('TYPE', $stu_type);
                $this->session->set_userdata('name', $username);
                $this->session->set_userdata('TEL', $phone);
                redirect();
                echo '"regist success !"';
                return;
            } else {
                echo 'regist  error !';
                return;
            }
        }
        $vip_serial_num = $this->input->post('vip_serial_num');
        $train_serial_num = $this->input->post('train_serial_num');
        if ($stu_type == 2) {
            $serial_num = $vip_serial_num;
        } else if ($stu_type == 1) {
            $serial_num = $train_serial_num;
        } else {
            echo '用户类型异常';
            exit(0);
        }

        $ser_num_vali = $this->serialnumber_model->SerValidChange($serial_num);
        if ($ser_num_vali) {
            $result = $this->accesscontrol_model->insert($datas);
            $coin_data = array(
                'uc_id' => 'coin' . $Uid,
                'uc_stu_id' => $Uid,
                'uc_num' => 3000
            );
            if ($result == 1) {
                $result = $this->usercoin_model->insert($coin_data);
            }
            if ($result == 1) {
                $this->session->set_userdata('UID', $Uid);
                $this->session->set_userdata('TYPE', $stu_type);
                $this->session->set_userdata('name', $username);
                if ($stu_type == 2) {
                    redirect();
                } else if ($stu_type == 1) {
                    $coach_id = time();
                    $attr = array('coach_id' => $coach_id, 'coach_user_id' => $Uid);
                    $result1 = $this->coach_model->insert($attr);
                    $this->session->set_userdata('coach_id', $coach_id);
                    redirect('coach');
                } else {
                    exit();
                }
            } else {
                echo 'insert error!';
            }
            echo '序列号状态修改成功！';
        } else {
            echo '无效序列号！';
        }
    }

    public function login_check() {
        $name = $this->input->get('name');
        $name_array = array();
        //判断是邮箱，手机号，还是用户名；
        if (preg_match("/1[3458]{1}\d{9}$/", $name)) {
            $name_array = array('stu_tel' => $name);
        } else if (preg_match('/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i', $name)) {
            $name_array = array('stu_email' => $name);
        } else {
            $name_array = array('stu_name' => $name);
        }
        $Result = $this->accesscontrol_model->loginSelect($name_array);
        if ($Result == null) {
            echo "用户不存在";
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

    public function psw_isRight() {
        $name = $this->input->post('name');
        $psw = $this->input->post('password');
        $name_array = array();
        //判断是邮箱，手机号，还是用户名；
        if (preg_match("/1[3458]{1}\d{9}$/", $name)) {
            $name_array = array('stu_tel' => $name);
        } else if (preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i", $name)) {
            $name_array = array('stu_email' => $name);
        } else {
            $name_array = array('stu_name' => $name);
        }
        $Result = $this->accesscontrol_model->loginSelect($name_array);
        foreach ($Result as $row) {
            if ($row['stu_pwd'] != md5($psw)) {
                echo '1';
            } else {
                echo '0';
            }
            exit();
        }
        echo '999';
    }

    public function login_psw_check() {
        $name = $this->input->post('name');
        $psw = $this->input->post('password');
        if (preg_match("/1[3458]{1}\d{9}$/", $name)) {
            $name_array = array('stu_tel' => $name);
        } else if (preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i", $name)) {
            $name_array = array('stu_email' => $name);
        } else {
            $name_array = array('stu_name' => $name);
        }
        $Result = $this->accesscontrol_model->loginSelect($name_array);
        foreach ($Result as $row) {
            if ($row['stu_pwd'] != md5($psw)) {
                $data = array(
                    'error' => '密码错误！'
                );
                echo false;
                exit();
            } else {
                $this->session->set_userdata('UID', $row['stu_id']);
                $this->session->set_userdata('TYPE', $row['stu_type']);
                if ($row['stu_true_name'] != null) {
                    $this->session->set_userdata('true_name', $row['stu_true_name']);
                }
                if ($row['stu_nick_name'] != null) {
                    $this->session->set_userdata('name', $row['stu_nick_name']);
                    $this->session->set_userdata('stu_nick_name', $row['stu_nick_name']);
                } else {
                    $this->session->set_userdata('name', $name);
                }
                if ($row['stu_tel'] != null) {
                    $this->session->set_userdata('TEL', $row['stu_tel']);
                }
                if ($row['stu_face'] != null) {
                    $this->session->set_userdata('face', $row['stu_face']);
                }
                if ($row['stu_type'] == 3) {
                    redirect();
                } else if ($row['stu_type'] == 1) {
                    $coaid = $this->coach_model->selectCoaIdByStuId($row['stu_id']);
                    foreach ($coaid as $temp) {
                        $this->session->set_userdata('COACH_ID', $temp['coach_id']);
                    }
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
        echo false;
    }

    public function send_message() {
        $phone = $this->input->post('phone', TRUE);
        $Result = $this->accesscontrol_model->select_phone($phone);
        foreach ($Result as $row) {
            echo '3'; //该手机已被注册
            return false;
        }
        $phone_code = rand(1000, 9999);
        $this->session->set_userdata('phone_verify_code', $phone_code);
        $return = $this->_send_message($phone, $phone_code);
        if ($return == '000000') {
            echo '1'; //验证码发送成功。
        } else {
            echo '7'; //验证码发送失败。
        }
        //测试专用，测完打开以上代码
//        $this->session->set_userdata('phone_verify_code', '1111');
//        echo '1';
    }

    public function is_phone_verify_code() {
        $phone = $this->input->post('code', TRUE);
        $real_code = $this->session->userdata('phone_verify_code');
        if ($real_code == $phone) {
            echo '1';
            return false;
        } else {
            echo '3';
            return false;
        }
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
        $title = '';
        foreach ($news as $row) {
            $row['news_content'] = preg_replace('/\n/', '<p/><p>', $row['news_content']);
            $row['news_imge'].="@!newsimg";
            $page = $this->load->view('a_views/news', $row, true);
            $title = $row['news_title'] . " - 我爱开车网";
        }
        $this->view($title, $page);
    }

    public function getcityData() {

        $retval = $this->_request('http://driver-un.oss-cn-shenzhen.aliyuncs.com/js/cityData.min.json');

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

    function get_school_info() {
        $city = $this->input->post("city", TRUE);
        $result = $this->school_model->get_from_city($city);
        $list = '';
        foreach ($result as $row) {
            $list.=$this->load->view('a_views/school_list', $row, true);
        }
        $data = array(
            'info' => $result,
            'list' => $list
        );
        echo json_encode($data);
    }

    private function _send_message($phone, $code) {
        $deadline_time = '5';
        $options['accountsid'] = '4b624a4e3b505fd45db7e28605dfa1ac';
        $options['token'] = '464c98f7b103aee53a75344d5a549868';
        $this->load->library('ucpaas', $options);
        $appId = "e5e7b60c4cfb4f10a43b11afa0f885e4";
        $to = $phone;
        $templateId = "8276";
        $param = $code . "," . $deadline_time;
        $return = $this->ucpaas->templateSMS($appId, $to, $templateId, $param);
        return $this->_decode_message_json($return);
    }

    private function _decode_message_json($return) {
        $data = json_decode($return, true);
        return $data['resp']['respCode'];
    }

    public function test_shmop() {
        $key = 12345; // 共享内存的key
        $memsize = 100; // 共享内存的大小，单位byte
        $perm = 0666; // 共享内存访问权限，参考linux的权限
        $offset = 0; // 共享内存偏移地址，0表示共享内存的起始地址
        $shm_id = shmop_open($key, "c", $perm, $memsize); // 创建一个共享内存，第二个参数c表示创建
        $shm_bytes_written = shmop_write($shm_id, "abjjjjjjtqwertyuiopzxcvbnm,.", 0); // 把"abc"写入共享内存
        echo $shm_bytes_written; // 打印出写入共享内存的数据长度，这里将显示3
//        shmop_delete($shm_id);
        shmop_close($shm_id); // 关闭共享内存
        
    }

    public function test_shmop2() {
        $shm_id = shmop_open(12345, "w", 0, 0); // 打开key为12345的共享内存，第二个参数w表示以读写方式打开，打开已存在的共享内存，第三个和第四个参数必须是0
        echo '#'.shmop_delete($shm_id).'#'; // 删除共享内存
        $shm_data = shmop_read($shm_id, 0, 7); // 从共享内存里面读取3字节的数据，第二个参数是偏移地址，0表示共享内存的起始地址
        echo $shm_data; // 打印出上个函数返回的共享内存数据
//        shmop_close($shm_id); // 关闭共享内存
    }
    public function  todo(){
        $a = sem_get(99999);
        sem_acquire($a);
        //todo
        sem_release($a);
    }

}
