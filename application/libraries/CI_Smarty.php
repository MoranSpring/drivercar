<?php   
if(!defined('BASEPATH')) EXIT('No direct script asscess allowed');   
require_once( APPPATH . 'libraries/smarty-3.1.21/Smarty.class.php' );   
  
class CI_Smarty extends Smarty {   
    protected $ci;   
    public function  __construct(){   
        $this->ci = & get_instance();   
        $this->ci->load->config('smarty');//加载smarty的配置文件   
        //获取相关的配置项   
        $this->template_dir   = $this->ci->config->item('template_dir');   
        $this->complie_dir    = $this->ci->config->item('compile_dir');   
        $this->cache_dir      = $this->ci->config->item('cache_dir');   
        $this->config_dir     = $this->ci->config->item('config_dir');   
        $this->template_ext   = $this->ci->config->item('template_ext');   
        $this->caching        = $this->ci->config->item('caching');   
        $this->cache_lifetime = $this->ci->config->item('lefttime');   
    }   
}