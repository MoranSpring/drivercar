<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class First extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
	public function index()
	{
//            $this->ci_smarty->assign('test', 'smarty');
//               $this->template->load('template', 'about');
//		$this->load->view('a_views/head');
//                $this->load->view('a_views/nav');
//                $this->load->view('a_views/content_1');
//                $this->load->view('a_views/content_2');
//                $this->load->view('a_views/foot');
//              $data['title'] = '标题';   
//              $data['num'] = '123456789';   
//        $this->cismarty->assign('data',$data); // 亦可   
//        $this->assign('data',$data);   
        $this->assign('test','测试用的网页标题');   
        //$this->cismarty->display('test.html'); // 亦可   
        $this->display('test.html');   
                
	}
}