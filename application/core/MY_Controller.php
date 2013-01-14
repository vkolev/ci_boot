<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public $data = array();
    public $view = TRUE;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function _remap($method, $parameters) {
        if(method_exists($this, $method)) {
            call_user_func_array(array($this, $method), $parameters);
        } else {
            show_404();
        }
        
        $view = (is_string($this->view) && !empty($this->view)) ? $this->view : $view;
        if($this->view !== FALSE) {
            $this->load->view($view, $this->data);
        }
    }
}