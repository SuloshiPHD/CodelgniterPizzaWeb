<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        //$this->load->database();
        $this->load->view('home');
    }

    public function login() {
        $this->load->view('loginuser');
    }

    public function register() {
        $this->load->view('register');
    }

    public function customerInfoForm() {
        $this->load->view('customer');
    }

    public function customizepizza() {
        $this->load->view('customize_pizza');
    }

    public function cart() {
        $this->load->view('shoppingcart');
    }

}
?>
