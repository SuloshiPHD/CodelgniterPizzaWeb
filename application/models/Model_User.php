<?php

class Model_user extends CI_Model{
    
    public function insertUserdata(){
        //echo "model user";
        
       $data = array(
             //enabling the global xss filtering <script> tag for fname field (using TRUE)
           'fname' => $this->input->post('fname',TRUE),
           'lname' => $this->input->post('lname',TRUE),
           'email' => $this->input->post('email',TRUE),
           //use sha1 to encrpt the password to a string
           'password' => sha1($this->input->post('confirmpwd',TRUE))
           
       );

       
       return $this->db->insert('users',$data);
       //echo "Succssfully!"
       //return false;
       
    }
    
    
    
    public function loginUser(){
        
        /*check the user entered login details(email and password) with database values
           if exists sucessful login --> create session
           else show error message    */        
        $email =$this->input->post('email');
        $password =sha1($this->input->post('password'));
        
        $query = $this->db->get_where('users', array('email' => $email,'password' =>$password ));
        if($query-> num_rows() == 1){
            return $query->row(0);
            //die();
        }else{
            return false;
//            echo "error";
//            die();
        }
          
        
    }
    
}

?>
