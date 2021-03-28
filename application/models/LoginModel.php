<?php

class LoginModel extends CI_Model{

    public function getUserByUsername($username, $password) {


        $this ->load ->database();
         $result = $this->db-> get('user');
         foreach($result -> result()as $row ){
             if($username== $row->username && $password==$row->password ){
                 return $row->username;
             }
         }

         
      // return $username
        return "Acess Denied ";
      /*
        $query = $this ->db ->query("SELECT * FROM login WHERE username='$username' AND pwd ='$password' ");
        $result = "";

        if(empty($query -> result())){

            $result = "Login Failed. Please login again...!!";

        }else{

            foreach($query -> result()as $row ){
                $result = "Login Successfull..!! Welcome ".$row ->username;
            }
        }

        return $result; */
  
    } 

}

?>