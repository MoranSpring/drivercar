<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mobile extends MY_Controller {

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
        $this->load->model('teachbook_model');
        $this->load->model('course_model');
        $this->load->model('clscomment_model');
        $this->load->model('staticcoach_model');
        $this->load->model('usercoin_model');
        $this->load->model('consumption_model');
        $this->load->model('cash_model');
        $this->load->model('rechargecard_model');
    }

    public function index() {
        $this->view();
    }

    public function view($title = '', $page = '') {
        if ($page == '') {
            $this->home_page();
            return false;
        } else {
            $body['content'] = $page;
        }
        if ($title == '') {
            $body['title'] = "我爱开车网（手机版）- 首页";
        } else {
            $body['title'] = $title;
        }

        $body['footer'] = $this->load->view('mobile/common_views/footer_views', '', true);
        $this->load->view('mobile/common_views/template', $body);
    }

    public function home_page() {
        $uid = $this->session->userdata('UID');
        $body['menu'] = $this->getMenu();
        $body['islogin'] = 0;
        if ($uid != FALSE) {
            $body['islogin'] = 1;
            $time = $this->getDate();
            $cls = $this->getCurrentCls();
            $body['un_study'] = $this->teachbook_model->un_study_cla_sum($uid, $time, $cls);
            $body['un_comment'] = $this->teachbook_model->un_comment_cla_sum($uid, $time);
        }
        $page = $this->load->view('mobile/public_views/home', $body, true);
        $title = "我爱开车网（手机版）- 首页";
        $this->view($title, $page);
    }

    public function login() {
        $page = $this->load->view('mobile/login_views/login', '', true);
        $title = " 登录 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function register() {
        $page = $this->load->view('mobile/register_views/register', '', true);
        $title = " 注册 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function recharge_success() {
        $page = $this->load->view('mobile/vip_views/recharge_success', '', true);
        $title = " 注册 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function study_book() {
        $uid = $this->session->userdata('UID');
        if ($uid == FALSE) {
            redirect('mobile/login');
            return false;
        }
        $page = $this->load->view('mobile/vip_views/study_book_new', '', true);
        $title = " 教练预约 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function management() {
        if ($this->session->userdata('TYPE') == 2 || $this->session->userdata('TYPE') == 3) {
            
        } else {
            redirect();
            return false;
        }
        $UID = $this->session->userdata('UID');
        $time = $this->getDate();
        $cls = $this->getCurrentCls();
        $result_fur = $this->teachbook_model->select_further_details($UID, $time, $cls);
        $comment_list = array();
        $j = 0;
        foreach ($result_fur as $row) {
            $row['course'] = $this->getClassType($row['book_cls_id']);
            $comment_list['unuse_list'][$j] = $this->load->view('mobile/vip_views/management_fur_list', $row, true);
            $j++;
        }
        $result = $this->teachbook_model->select_history_details($UID, $time, $cls);
        $i = 0;
        unset($row);
        foreach ($result as $row) {
            if ($i > 9) {
                break;
            }
            $row['course'] = $this->getClassType($row['book_cls_id']);
            $comment_list['list'][$i] = $this->load->view('mobile/vip_views/management_list', $row, true);
            $i++;
        }
        $page = $this->load->view('mobile/vip_views/management', $comment_list, true);
        $title = "学习管理 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function tocomment() {
        $id = $this->input->get('id');
        $result = $this->teachbook_model->select_from_id($id);
        $comment_list = array();
        foreach ($result as $row) {
            $comment_list['feedback_content'] = $this->load->view('mobile/vip_views/feedback_content', $row, true);
        }
        $page = $this->load->view('mobile/vip_views/tocomment', $comment_list, true);
        $title = "学习评价 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function book_detail() {
        if ($this->session->userdata('TYPE') == 2 || $this->session->userdata('TYPE') == 3) {
            
        } else {
            redirect();
            return false;
        }
        $id = $this->input->get('id');
        $isFinish = $this->input->get('isFinish');
        $result = $this->teachbook_model->select_from_id($id);
        $data = '';
        foreach ($result as $row) {
            $row['isFinish'] = $isFinish; //'0'表示'已经学习'，其他为'未学习'；
            $row['course'] = $this->getClassType($row['book_cls_id']);
        }
        $page = $this->load->view('mobile/vip_views/book_detail', $row, true);
        $title = "订单详情 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function news() {
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/news', $body, true);
        $title = "新闻 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function coach_home($id) {
        $coach = $this->coach_model->select_detail($id);
        foreach ($coach as $row) {
            $body = $row;
        }
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/coach_home', $body, true);
        $title = "教练详情 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function vip_home($id = '') {
        $isSelf = FALSE;
        $UID = '';
        //访问用户类型判断，是否是该用户本人
        if ($id == '') {
            if ($this->session->userdata('UID') == FALSE) {
                redirect('mobile/login');
                return FALSE;
            } else {
                $UID = $this->session->userdata('UID');
                $isSelf = TRUE;
            }
        } else {
            if ($id == $this->session->userdata('UID')) {
                $UID = $this->session->userdata('UID');
                $isSelf = TRUE;
            } else {
                $UID = $id;
            }
        }
//            $coach = $this->coach_model->select_detail($id);
//        foreach ($coach as $row) {
//            $body = $row;
//        }
        $user_data = $this->accesscontrol_model->selectById($UID);
        foreach ($user_data as $row) {
            if ($row['stu_true_name'] != null) {
                $this->session->set_userdata('true_name', $row['stu_true_name']);
                $row['name']= $row['stu_true_name'];
            } elseif ($row['stu_nick_name'] != null) {
                $this->session->set_userdata('name', $row['stu_nick_name']);
                $row['name']= $row['stu_nick_name'];
            } else {
                $this->session->set_userdata('name', $row['stu_name']);
                $row['name']= $row['stu_name'];
            }
            $body = $row;
        }
        $body['menu'] = $this->getMenu();
        $coach = $this->usercoin_model->selectbyId($UID);
        foreach ($coach as $row) {
            $body['coin'] = $row['uc_num'];
        }
        $page = $this->load->view('mobile/vip_views/vip_home', $body, true);
        $title = "个人主页 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function self_info_edit() {
        $page = $this->load->view('mobile/vip_views/self_info_edit', '', true);
        $title = "信息编辑 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function school_home($id) {
        $school = $this->school_model->get_from_id($id);
        foreach ($school as $row) {
            $body = $row;
        }
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/school_home', $body, true);
        $title = "培训点详情 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function map_sch_pos() {
        $body['menu'] = $this->getMenu();
        $page = $this->load->view('mobile/public_views/map_sch_pos', $body, true);
        $title = "驾培点地址 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function map_main() {
        $page = $this->load->view('mobile/public_views/map_main', '', true);
        $title = "我的位置 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function main_school_list() {
        $info = '113.57.191.74';
        $info = $this->getCityByIp();
        $body['info'] = $info;
        $page = $this->load->view('mobile/public_views/main_school_list', $body, true);
        $title = "培训点查询- 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function main_coach_list() {
        $info = '113.57.191.74';
        $info = $this->getCityByIp();
        $body['info'] = $info;
        $page = $this->load->view('mobile/public_views/main_coach_list', $body, true);
        $title = "教练查询- 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function two_screen() {
//          $body['menu']=$this->getMenu();
        $page = $this->load->view('mobile/public_views/two_screen', '', true);
        $title = "切换 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    public function select_coach() {
        $city = $this->input->get('city');
        $school = $this->school_model->get_from_city(1027);
        $i = 0;
        $body = '';
        foreach ($school as $row) {
            $body['school'][$i] = $this->load->view('mobile/public_views/school_list', $row, true);
            $i++;
        }
        $page = $this->load->view('mobile/public_views/select_coach', $body, true);
        $title = "选择教练 - 我爱开车网（手机版）";
        $this->view($title, $page);
    }

    /**
     * ***************************************************************
     * AJAX请求方法！************START
     */
    public function get_course() {    //通过学校id 获得该校的教练详细信息。。。
        $id = $this->input->post('id');
        $coach = $this->coach_model->select_coach($id);
        $AllCoach = '';
        foreach ($coach as $row) {
            $AllCoach.=$this->load->view('mobile/public_views/coach_list', $row, true);
        }
        echo $AllCoach;
    }

    public function get_coach_info() {//获得该学员已选的教练信息
        $UID = $this->session->userdata('UID');
        $coach = $this->staticcoach_model->selectByStu($UID);
        $data = array();
        $data['exist'] = 0;
        foreach ($coach as $row) {
            $data = $row;
            $data['exist'] = 1; //1代表存在，0则表示不存在
        }
        echo json_encode($data);
    }

    public function unbook() {
        $UID = $this->session->userdata('UID');
        $id = $this->input->post("book_id", TRUE);
        $date = '';
        $spare_money = 0; //学员余额
        $coach_coin = 0; //读出该教练的单节课的积分
        $need_back = 0; //应该返还的钱

        $dateArray = $this->teachbook_model->select_by_id($id);
        foreach ($dateArray as $row) {
            if ($row['book_state'] == 6) {  //判断该订单是否已经被退掉了
                echo '您已经退了，别再来退了好不？';
                return false;
            }
            $date = $row['book_date'];
            $coach_coin_array = $this->coach_model->selectCostById($row['book_coa_id']); //读出该教练的单节课的积分
            foreach ($coach_coin_array as $value) {
                $coach_coin = $value['coach_cls_cost'];
            }unset($value);
            $spare_money_array = $this->usercoin_model->selectById($row['book_stu_id']); //读出学员剩余的积分数
            foreach ($spare_money_array as $value) {
                $spare_money = $value['uc_num'];
            }unset($value);
        }

        $nowStamp = time();
        $thisStamp = strtotime($date);
        $nowHour = getdate()['hours'];
        $gap = floor(($thisStamp - $nowStamp ) / 86400);
        if ($gap >= 3) {
//               alert('直接退掉！');
            $data = array(
                'book_state' => '6'//直接退掉;
            );
            $need_back = $coach_coin;
            $spare_money = $spare_money + $need_back;
        } else if ($gap == 2) {
//               alert('扣5%！');
            $data = array(
                'book_state' => '6'//直接退掉;
            );
            $need_back = $coach_coin * 0.95;
            $spare_money = $spare_money + $need_back;
        } else if ($gap == 1) {
//               alert('扣10%！');
            $data = array(
                'book_state' => '6'//直接退掉;
            );
            $need_back = $coach_coin * 0.9;
            $spare_money = $spare_money + $need_back;
        } else if ($gap == 0 && $nowHour < 19) {
            $data = array(
                'book_state' => '6'//直接退掉;
            );
            $need_back = $coach_coin * 0.8;
            $spare_money = $spare_money + $need_back;
//               alert('扣20%！');
        } else if ($gap == 0 && $nowHour >= 19) {
//               alert('扣20%！且必须教练同意！');
            $data = array(
                'book_state' => '7'//请求退课;
            );
        } else {
            echo '你退你大爷！！';
            return false;
        }
        $back_money = round($spare_money, 2);     //退款后用户余额

        $csm_record = array(//消费记录
            'csm_id' => 'csm' . $nowStamp,
            'csm_rec_id' => $id,
            'csm_stu_id' => $UID,
            'csm_in_out' => '2',
            'csm_type' => "退订退款",
            'csm_coin' => $need_back,
            'csm_date' => $this->getTime()
        );
        //资金操作！---------------------------------------消费记录---修改退定状态--订单id--写入用户余额--用户id
        $return = $this->cash_model->back_money($csm_record, $data, $id, $back_money, $UID);
        if ($return === TRUE)
            echo 1;
        else {
            echo false;
        }
        //去扣除积分
//        $COIN = array('uc_num' => $back_money);
//        $result_coin = $this->usercoin_model->update($UID, $COIN);
//        if($result_coin==1){
//            $return = $this->teachbook_model->update_state($id, $data);
//        }
//        if($return==1){
//            $return = $this->consumption_model->insert($csm_record);
//        }
    }

    public function to_change_coach() {
        $UID = $this->session->userdata('UID');
        $coach_id = $this->input->get('coach_id');
        $school_id = $this->input->get('school_id');
        $coach = $this->staticcoach_model->selectByStu($UID);
        foreach ($coach as $row) {
            $data = array(
                'sc_sch' => $school_id,
                'sc_coa' => $coach_id
            );
            $result = $this->staticcoach_model->update($UID, $data);
            echo $result;
            exit();
        }
        $dataAll = array(
            'sc_id' => time(),
            'sc_stu' => $UID,
            'sc_sch' => $school_id,
            'sc_coa' => $coach_id,
        );
        $result = $this->staticcoach_model->insert($dataAll);
        echo $result;
    }

    public function get_map_info() {
        $id = $this->input->post("school_id", TRUE);
        $result = $this->school_model->get_from_id($id);
        $list = '';
        $content = '';
        foreach ($result as $row) {
            $content = $this->load->view('mobile/public_views/map_content', $row, true);
            $list = $row;
        }
        $data = array(
            'content' => $content,
            'list' => $list
        );
        echo json_encode($data);
    }

    public function get_school_by_city() {
        $city = $this->input->post('city');
        $school = $this->school_model->get_from_city(1027);
        $body = '';
        foreach ($school as $row) {
            $body.= $this->load->view('mobile/public_views/school_list_content', $row, true);
        }
        echo $body;
    }

    public function get_coach_by_city() {
        $city = $this->input->post('city');
        $school = $this->school_model->get_from_city(1027);
        $body = '';
        foreach ($school as $row) {
            $coach = $this->coach_model->selectIdBySchool($row['jp_id']);
            foreach ($coach as $row2) {
                $body.= $this->load->view('mobile/public_views/coach_list_content', $row2, true);
            }
        }
        echo $body;
    }

    public function teach_book() {
        $book_id = time();
        $book_stu_id = $this->session->userdata('UID');
        $book_coa_id = $this->input->post('book_coa_id', TRUE);
        $book_sch_id = $this->input->post('book_sch_id', TRUE);
        $book_cls_id = $this->input->post('book_cls_id', TRUE);
        $json = $this->input->post('json', TRUE);
        $bookArray = json_decode($json, true);
        $clsnum = count($bookArray); //看客户总共选了多少节课
        //判断传过来的json是否用重复时间
        for ($i = 0; $i < $clsnum; $i++) {
            $temp_day = $bookArray[$i]['date'];
            $temp_cls = $bookArray[$i]['cls'];
            for ($j = $i + 1; $j < $clsnum; $j++) {
                if ($temp_day == $bookArray[$j]['date'] && $temp_cls == $bookArray[$j]['cls']) {
                    array_splice($bookArray, $j, 1);
                    $clsnum--;
                    $j--;
                }
            }
        }
        //判断传来的课程时间跟数据库中的时间是否冲突，防止选课前刚刚被被人选走课程
        $is_exist_array = $this->teachbook_model->check_is_exist($bookArray, $book_coa_id); //读出该教练的单节课的积分
        foreach ($is_exist_array as $row) {
            //有节课被别人已经选走
            echo 7;
            return false;
        }
        //判断用户余额是否充足！
        $SUM = 0; //最终的费用
        $USERCOIN = 0; //用户剩余的积分数
        $COAHCOIN = 0; //教练单节课积分
        $coach_coin_array = $this->coach_model->selectCostById($book_coa_id); //读出该教练的单节课的积分
        foreach ($coach_coin_array as $row) {
            $COAHCOIN = $row['coach_cls_cost'];
            $SUM = $row['coach_cls_cost'] * $clsnum; //计算出总价格
        }
        unset($row);
        $user_coin_result = $this->usercoin_model->selectById($book_stu_id);
        foreach ($user_coin_result as $row) {
            $USERCOIN = $row['uc_num'];
        }
        unset($row);
        if ($SUM >= 0 && $USERCOIN >= 0) {
            $spare_money = $USERCOIN - $SUM;
            if ($spare_money >= 0) {
                //去扣除积分
                $data = array('uc_num' => $spare_money); //消费后用户余额
            } else {
                //余额不足
                echo 3;
                return false;
            }
        } else {
            //返回异常
            echo 9;
            return false;
        }

        $DateArray = array();
        $RecordArray = array();
        $count = rand(0, 1000);
        foreach ($bookArray as $row) {
            $book_id = time() . $count;
            $newDate = array(
                'book_id' => $book_id,
                'book_stu_id' => $book_stu_id,
                'book_coa_id' => $book_coa_id,
                'book_sch_id' => $book_sch_id,
                'book_cls_id' => $book_cls_id,
                'book_state' => 1,
                'book_date' => $row['date'],
                'book_cls_num' => $row['cls'],
                'book_time' => $this->getTime()
            );
            array_push($DateArray, $newDate);

            $csm_record = array(
                'csm_id' => 'csm' . $book_id,
                'csm_rec_id' => $book_id,
                'csm_stu_id' => $book_stu_id,
                'csm_in_out' => '1',
                'csm_type' => '学车费用',
                'csm_coin' => $COAHCOIN,
                'csm_date' => $this->getTime()
            );
            array_push($RecordArray, $csm_record);
            $count++;
        }
        $result = $this->cash_model->teach_book_waste_money($DateArray, $RecordArray, $book_stu_id, $data);
        if ($result == true) {
            echo 1;
        } else {
            echo 11; //数据插入冲突
        }
    }

    public function get_consumpation() {
        $UID = $this->session->userdata('UID');
        $result = $this->consumption_model->select_by_stu($UID);
        $page = '';
        foreach ($result as $row) {
            $page .= $this->load->view('mobile/vip_views/consumption_list', $row, true);
        }
        echo $page;
    }

    public function get_study_record() {
        $UID = $this->session->userdata('UID');
        $result = $this->teachbook_model->select_study_record($UID, $this->getDate());
        $page = $this->load->view('mobile/vip_views/study_step/step_zero', '', true);
        $flag = 0;
        $flag2 = 0;
        $page_step2 = '';
        $page_step3 = '';
        foreach ($result as $row) {
            if ($flag == 0) {
                $page = $this->load->view('mobile/vip_views/study_step/step_one', '', true);
                $page.=$this->load->view('mobile/vip_views/study_step/step_two', '', true);
                $flag = 1;
            }
            if ($this->getClassType($row['book_cls_id']) == '科目二') {
                $page_step2.=$this->load->view('mobile/vip_views/study_step/step_content', $row, true);
            }
            if ($this->getClassType($row['book_cls_id']) == '科目三') {
                $page_step3.=$this->load->view('mobile/vip_views/study_step/step_content', $row, true);
            }
        }
        if ($page_step3 != '') {
            $page .= $page_step2;
            $page.=$this->load->view('mobile/vip_views/study_step/step_three', '', true);
            $page .= $page_step3;
        } else if ($page_step2 != '') {
            $page .= $page_step2;
            $page .= $this->load->view('mobile/vip_views/study_step/stepend', '', true);
        }
        echo $page;
    }

    public function get_coach_comment() {
        $UID = $this->session->userdata('UID');
        $result = $this->teachbook_model->select_coach_comment($UID);
        $page = '';
        foreach ($result as $row) {
            if ($row['book_suggest'] != '') {
                $page .= $this->load->view('mobile/vip_views/coach_comment_list', $row, true);
            }
        }
        echo $page;
    }

    public function card_check_id() {
        $card_id = $this->input->post('card_id', TRUE);
        $result = $this->rechargecard_model->select_by_card_id($card_id);
        foreach ($result as $row) {
            if ($row['rc_state'] != 0) {
                echo 7;             //此卡已用过或不可用
                return false;
            } else if (time() >= strtotime($row['rc_dead_time'])) {
                echo 5;       //此卡已过期
                return false;
            } else {
                echo 1;
                return false;
            }
        }
        echo 3;    //此卡不存在，请重新输入
        return false;
    }

    public function card_check() {
        $card_id = $this->input->post('card_id', TRUE);
        $card_psw = $this->input->post('card_psw', TRUE);
        $result = $this->rechargecard_model->select_by_card_id($card_id);
        foreach ($result as $row) {
            if ($row['rc_state'] != 0) {
                echo 7;             //此卡已用过或不可用
                return false;
            } else if (time() >= strtotime($row['rc_dead_time'])) {
                echo 5;       //此卡已过期
                return false;
            } else if ($card_psw != $row['rc_psw']) {
                echo 9; //密码错误，
                return false;
            } else {
                echo 1; //正确的卡
                return false;
            }
        }
        echo 3;    //此卡不存在，请重新输入
        return false;
    }

    public function recharge_by_card() {
        $UID = $this->session->userdata('UID');
        $card_id = $this->input->post('card_id', TRUE);
        $card_psw = $this->input->post('card_psw', TRUE);
        if ($UID == FALSE) {
            echo 11;     //购买异常
            return false;
        }
        $result = $this->rechargecard_model->select_by_card_id($card_id);
        foreach ($result as $row) {
            if ($row['rc_state'] != 0) {
                echo 7;             //此卡已用过或不可用
                return false;
            } else if (time() >= strtotime($row['rc_dead_time'])) {
                echo 5;       //此卡已过期
                return false;
            } else if ($card_psw != $row['rc_psw']) {
                echo 3; //密码错误！
                return false;
            }
            $RecordArray[0] = array(
                'csm_id' => 'csm' . $row['rc_id'],
                'csm_rec_id' => $row['rc_id'],
                'csm_stu_id' => $UID,
                'csm_in_out' => '2',
                'csm_type' => '充值',
                'csm_coin' => $row['rc_money'],
                'csm_date' => $this->getTime()
            );
            $RechargeArray = array(
                'rc_purchaser' => $UID,
                'rc_purchase_time' => $this->getTime(),
                'rc_card_id' => $card_id,
                'rc_card_psw' => $card_psw
            );

            $result = $this->cash_model->purchase_by_card($UID, $row['rc_money'], $RecordArray, $RechargeArray);
            if ($result == 1) {
                redirect('mobile/recharge_success');
                return false;
            } else {
                echo $result;
            }
            return false;
        }
        echo 13;    //此卡不存在，请重新输入
        return false;
    }

    public function upload_image() {
        $UID = $this->session->userdata('UID');
        if ($UID == FALSE)
            return false;
        $img = $this->input->post('img', TRUE);
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file_name = md5('userhead' . rand(0, 1000));
        $folder_name = 'mobile/headpic/' . $this->getFolderName();
        $file = 'application/images/' . $file_name . '.jpg';
        $success = file_put_contents($file, $data);
        if ($success) {
            if ($this->_upload_by_content($folder_name . $file_name, $file) == 200) {
                $data = array(
                    'stu_face' => 'http://image.52drivecar.com/' . $folder_name . $file_name . '.jpg'
                );
                $result = $this->accesscontrol_model->update_attr($UID, $data);
                $this->session->set_userdata('face', 'http://image.52drivecar.com/' . $folder_name . $file_name . '.jpg');
                echo $result;
            } else {
                echo '3'; //上传失败
            }
            unlink($file);
            return false;
        }
        echo 'Unable to save the file.';
    }

    function _upload_by_content($name, $file) {
        $bucket = 'driver-un';
        $object = $name . '.jpg';
        $filepath = $file;  //英文
        $options = array(
            ALIOSS::OSS_FILE_UPLOAD => $filepath,
            'partSize' => 5242880,
        );
        $response = $this->alioss->create_mpu_object($bucket, $object, $options);

        return $response->status;
    }

    /**
     * AJAX请求方法！*********END
     * **********************************************************
     */
    public function getMenu() {    //----获得当前用户状态下的侧滑菜单
        $name = $this->session->userdata('name');
        $menu = '';
        if ($name == null) {
            $menu = $this->load->view('mobile/common_views/unlogin_menu', '', true);
        } else {
            $data = array('username' => $name);
            $menu = $this->load->view('mobile/common_views/vip_login_menu', $data, true);
        }
        return $menu;
    }

    public function generate_card() {
        $holder = '1429587515'; //持有人
        $money = '100'; //充值卡面额
        $howlong = '1440000000'; //有效截止日期时间戳
        $data = array(
            'rc_id' => time(),
            'rc_holder' => $holder,
            'rc_card_id' => $this->_get_card_id(),
            'rc_born_time' => $this->getTime(),
            'rc_money' => $money,
            'rc_dead_time' => $this->getTime($howlong),
            'rc_state' => '0',
            'rc_psw' => $this->_get_card_psw()
        );
        $result = $this->cash_model->insert_recharge_card($data);
        if ($result == 1) {
            echo 'success';
        }
    }

    public function testIp() {
        
    }

    private function _get_card_id() {
        $elements = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'z', 'x', 'c', 'v', 'b', 'n', 'm');
        return $elements[rand(0, 35)] . $elements[rand(0, 35)] . $elements[rand(0, 35)] . $elements[rand(0, 35)] . $elements[rand(0, 35)] . $elements[rand(0, 35)];
    }

    private function _get_card_psw() {
        $elements = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        return $elements[rand(0, 9)] . $elements[rand(0, 9)] . $elements[rand(0, 9)] . $elements[rand(0, 9)] . $elements[rand(0, 9)] . $elements[rand(0, 9)];
    }

    function getCityByIp() {
        $unknown = 'unknown';
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        //处理多层代理的情况
        //或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown;
        // * --/
        if (false !== strpos($ip, ',')) {
            $ip = reset(explode(',', $ip));
        }
        $retval = $this->_request('http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip);
        if ($retval !== false) {
            return $retval;
        }
        return '';
    }

    function testDB() {
        $array[0] = array(
            'day' => '2015-06-11',
            'cls' => '4',
        );
        $array[1] = array(
            'day' => '2015-06-11',
            'cls' => '45',
        );



        $clsnum = count($array);
        for ($i = 0; $i < $clsnum; $i++) {
            $temp_day = $array[$i]['day'];
            $temp_cls = $array[$i]['cls'];
            for ($j = $i + 1; $j < $clsnum; $j++) {
                if ($temp_day == $array[$j]['day'] && $temp_cls == $array[$j]['cls']) {
                    array_splice($array, $j, 1);
                    $clsnum--;
                    $j--;
                }
            }
        }
        echo $clsnum;
//        $result_fur = $this->teachbook_model->check_is_exist($array);
//        echo strtotime("2015-03-31");
//        echo getdate()['hours'];
//        $date = "2015-03-31";
//        $nowStamp = time();
//        $thisStamp = strtotime($date);
//        $gap = ($nowStamp - $thisStamp) / 86400;
//        echo floor($gap);
//        $UID = '1426568565';
//        $time = $this->getDate();
//        $cls = $this->getCurrentCls();
//
//        $result_fur = $this->teachbook_model->un_comment_cla_sum($UID, $time);
//        echo json_encode($result_fur);
    }

}
