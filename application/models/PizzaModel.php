<?php
class PizzaModel extends CI_model{
    
    public function __construct() {
		$this->load->database();
    }
           
        
    public function getAllPizzas(){
               
        $this->db->select('*');
        $this->db->from('pizza_details');
        $query = $this->db->get();
        $pizzas = array('pizzas' => $query->result());
        return $pizzas;
    }
        
        //get selected pizza details and toppings details
    public function getSelectedPizzaDetails($pizzaid){
            
            $query2 = $this->db->get_where('pizza_details',array('pizza_id' => $pizzaid));

   
             if($query2-> num_rows() == 1){
               // return $customizedpizza;
                return $query2-> row(0);
                die();
            }else{
                echo "<h2> Pizza Not Found </h2>";
                die();
            }
		if (isset($row)){
			return $row;
		}
            
    }
            
    public function getToppingsDetails(){
        
            $querygetTopping = $this->db->get('topping_details');
         
            return $querygetTopping ->result();
    }
           
        
         //function to fetch the sides, drinks records from the db        
    public function getSidesDetails(){
            $querygetside = $this->db->get('other_food_details');
            return $querygetside->result();
    }    
 
         
}
?>
    
    
    






