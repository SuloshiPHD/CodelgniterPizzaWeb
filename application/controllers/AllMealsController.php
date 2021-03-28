<?php

class AllMealsController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    //function to all the pizza categories in the shop
    // call the model method to fetch pizza details from the databse
    //pass the fetch records to the view
    public function viewAllPizza(){
	$this->load->model('PizzaModel');
        $pizzas = $this ->PizzaModel->getAllPizzas();
        $this->load->view('alldeals', $pizzas);
    }
        
   //get the pizzaid which is going to customize 
   //and get topping details and selected pizza details from db through model
   //load the fetch records to the customize_pizza view
  
    public function viewCustomerizepizza(){  
      
        
        if ($this->input->post('btn')) {
            $pizzaid =$this->input->post('btn');      
            $this->load->model('PizzaModel');

            $details = $this ->PizzaModel->getSelectedPizzaDetails($pizzaid);               

            $details= array('pizza_id' => $details-> pizza_id,'pizza_title' => $details-> pizza_title,'pizza_img' => $details-> pizza_img,'pizza_des' => $details-> pizza_des,
            'pizza_price' => $details-> pizza_price, 'pizza_smallp' => $details-> pizza_smallp,
            'pizza_mediump' => $details-> pizza_mediump,'pizza_largep' => $details-> pizza_largep, 
            'toppingsList' => $this ->PizzaModel->getToppingsDetails());


            $this->load->view('cutomize_pizza',$details);
        }           
    }
  
    //function to get other items details and pass the data to view
        
    public function viewOtherItems(){
        
        $this->load->model('PizzaModel');             
        $otheritemdetails = array('otheritemList' => $this ->PizzaModel->getSidesDetails());
        $this->load->view('otheritems', $otheritemdetails);
    }
    
    
}

?>