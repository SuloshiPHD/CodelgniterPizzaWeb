<?php

class ShoppingCartModel extends CI_model {

    public function __construct() {
        $this->load->database();
    }

    public function insertCusDetails() {
       if(array_column($this->session->list, 'SubTotal')!= 0){
        $finaTotal = array_sum(array_column($this->session->list, 'SubTotal'));
        $sum = number_format($finaTotal, 2);
        log_message('debug', "total inside the model " . print_r($sum, True));
        $data = array(
            'full_name' => $this->input->post('firstname'),
            'email' => $this->input->post('email'),
            'house_no' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zip' => $this->input->post('zip'),
            'mobile' => $this->input->post('phone'),
            'tot_amount' => $finaTotal,
            'submit_time' => $this->input->post('submit_time')
        );

        return $this->db->insert('customer_details', $data);
        $cusId = $this ->db->insert_id();
       }
       
    }

    public function insertOrderDetails($email) {

        $this->db->select('customer_id');
        //get the customer id from the customer_details table
        $query = $this->db->get_where('customer_details', array('email' => $email));

        log_message('debug', "insert order details session array " . print_r($this->session->list, True));

        //add records to the order_details table using session data 
        if ($query->num_rows() >0) {
           // $customerid = $query->row(0);
           // log_message('debug', "customer id " . print_r($query->row(0), True));

            $insertbatch = $this->db->insert_batch('order_pizza_details', $this->session->list);
            log_message('debug', "insert batch " . print_r($insertbatch, True));
            
            
        }
    }

}

?>