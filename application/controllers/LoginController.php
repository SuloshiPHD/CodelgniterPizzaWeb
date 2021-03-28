<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	
	public function loginUser()
        {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('loginuser');
            }
            else
            {
                $this->load->model('Model_user');
                $result=$this->Model_user ->loginUser();
                
                if($result != false){
                    //setting a session
                    $user_date =array(
                        'user_id'=> $result->id,
                        'fname'=>$result-> fname,
                        'lname'=>$result-> lname,
                        'email'=>$result-> email,
                        'loggedin'=> TRUE
                    );
                    
                    $this->session->set_userdata($user_date);
                    
                    //redirect to mainpage after recognizing logged user using session
                    $this->session->set_flashdata('welcomemsg','Welcome Back!');
                    redirect('Home/login');
                    
                    
                }else{
                    //error flash message
                    $this->session->set_flashdata('errorloginmsg','Wrong Email and Password');
                    redirect('Home/login');
                    
                }
                
              
                
                
            }   
        }
}

?>
