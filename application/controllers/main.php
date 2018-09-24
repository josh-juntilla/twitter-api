<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

class Main extends CI_controller{

    public $status; 
    public $roles;

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->library(['form_validation', 'user']);    
        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->config->load('roles', true);
        $this->status = $this->config->item('status','roles'); 
        $this->roles  = $this->config->item('roles','roles');
    }
    
    public function index(){

        if (!$this->user->isLoggedIn()) {
            redirect();
        }

        // this is the very simple REST API calling a hello world
        $url = "https://rest-api-helloworld.herokuapp.com";

        $client = curl_init($url);
        
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        
        $response = curl_exec($client);
		
        $helloworld = json_decode($response);
        
        $this->load->view('main',['helloworld'=>$helloworld,'islogin' => $this->user->isLoggedIn()]);
    }

    public function search(){

        $search_query = $this->input->post('search');

        $consumer_key        = "Cykq6F5upg7BmLoQPm0QxJcZz";
        $consumer_secret     = "X19d4OhPtOG7PpqiZr4WjBQssoUNYRF6ihw6We8qQ5zljVijQ5";
        $access_token        = "257313898-RZ4vIK9e2AadYbL6uT5Sgi4sBwbsokZJMgXOPLsp";
        $access_token_secret = "LQh6FktQG6RzzS0PpCgDiqfaWDaMDcb3GkykfxQn0hYuG";
                
        $twitter_connect = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
                
        $search = $twitter_connect->get('search/tweets',['q'=>$search_query,'result_type'=>'recent','count'=>'15']);

        foreach($search as $items){

           foreach($items as $t){
                $tweets[] = $t;
           }
        }

        $this->load->view('search',['tweets' => $tweets,'islogin' => $this->user->isLoggedIn()]);

        // echo "<pre>";
        // print_r($search);
        // echo "</pre>";
        
    }
}