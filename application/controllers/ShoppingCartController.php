<?php

class ShoppingCartController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function addToCart() {

        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('pizzaSize', 'Pizza size', 'required');


            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                $this->index();
            } else {
                $pizzaPrice = $this->input->post('pizzaSize');
                $pizzaimg = $this->input->post('pizza_img');


                $toppingTotal = 0.00;

                $checkbox = $this->input->post('check');
                if (count((array) $checkbox) > 0) {
                    for ($i = 0; $i < count($checkbox); $i++) {

                        $toppingTotal = $toppingTotal + $checkbox[$i];
                        $pizzaPrice = $pizzaPrice + $checkbox[$i];
                    }
                }


                $Qty = $this->input->post('quantity');
                $sPizzaID = $this->input->post('pizza_id');
                $pizzaName = $this->input->post('pizza_name');
                $SubTotal = ($pizzaPrice) * $Qty;

                log_message('debug', "controller pizza id " . print_r($sPizzaID, TRUE));
                log_message('debug', "pizza+toppings price " . print_r($pizzaPrice, TRUE));
                log_message('debug', "Sub Totoal " . print_r($SubTotal, TRUE));
                log_message('debug', "selected pizza QTY " . print_r($Qty, TRUE));

                $sessionformData = array(
                    'pizza_id' => $sPizzaID,
                    'pizza_name' => $pizzaName,
                    'pizza_img' => $pizzaimg,
                    'pizzaPrice' => $this->input->post('pizzaSize'),
                    'toppingPrice' => $toppingTotal,
                    'Qty' => $Qty,
                    'SubTotal' => $SubTotal
                );


                $newItem = $sessionformData;
                if ($this->session->has_userdata('userId')) {
                    $listArray = $this->session->list;
                    array_push($listArray, $newItem);

                    $this->session->set_userdata('list', $listArray);
                } else {
                    $items = array($newItem);
                    $uniqueId = uniqid();

                    $this->session->set_userdata('userId', $uniqueId);
                    $this->session->set_userdata('list', $items);
                }

                if ($this->session->has_userdata('userId')) {
                    $data = array("isSet" => TRUE, "data" => $this->session->list);
                } else {
                    $data = array("isSet" => FALSE, "data" => null);
                }

                log_message('debug', "session list:" . print_r($this->session->list, True));
                $this->load->view('shoppingcart', $data);
            }
        } else {
            // get the data from the otheritems
            //btnotheritems

            if ($this->input->post('btnotheritems')) {

                $otherItemID = $this->input->post('otheritem_id');
                log_message('debug', "other Item ID :" . print_r($otherItemID, True));

                $otherItemImg = $this->input->post('otheritem_img');
                $otherItemName = $this->input->post('otheritem_name');
                $otherUnitPrice = $this->input->post('otheritem_price');
                $otherQty = $this->input->post('otheritem_quantity');
                $toppingTotal = 0.00;

                $OtherItemsubtotal = $otherUnitPrice * $otherQty;
                log_message('debug', "other Item img :" . print_r($otherItemImg, True));
                log_message('debug', "other Item title :" . print_r($otherItemName, True));
                log_message('debug', "other Item price :" . print_r($otherUnitPrice, True));
                log_message('debug', "other Item qty :" . print_r($otherQty, True));


                $sessionformData = array(
                    'pizza_id' => $otherItemID,
                    'pizza_name' => $otherItemName,
                    'pizza_img' => $otherItemImg,
                    'pizzaPrice' => $otherUnitPrice,
                    'toppingPrice' => $toppingTotal,
                    'Qty' => $otherQty,
                    'SubTotal' => $OtherItemsubtotal,
                );

                $newItem = $sessionformData;
                if ($this->session->has_userdata('userId')) {
                    $listArray = $this->session->list;
                    array_push($listArray, $newItem);

                    $this->session->set_userdata('list', $listArray);
                } else {
                    $items = array($newItem);
                    $uniqueId = uniqid();

                    $this->session->set_userdata('userId', $uniqueId);
                    $this->session->set_userdata('list', $items);
                }

                if ($this->session->has_userdata('userId')) {
                    $data = array("isSet" => TRUE, "data" => $this->session->list);
                } else {
                    $data = array("isSet" => FALSE, "data" => null);
                }

                log_message('debug', "session list:" . print_r($this->session->list, True));
                $this->load->view('shoppingcart', $data);
            }
        }
    }

    //function to view cart
    public function viewCart() {
        if ($this->session->has_userdata('userId')) {
            $data = array("isSet" => TRUE, "data" => $this->session->list);
        } else {
            $data = array("isSet" => FALSE, "data" => null);
        }

        log_message('debug', "session list:" . print_r($this->session->list, True));
        $this->load->view('shoppingcart', $data);
    }

    public function index() {

        if ($this->session->has_userdata('userId')) {
            $data = array("isSet" => TRUE, "data" => $this->session->list);
            print_r($this->session->List);
        } else {
            $data = array("isSet" => FALSE, "data" => null);
        }
        $this->load->view('shoppingcart', $data);
    }

   
    public function deleteFromCart() {

        // delete the selected item from the session and redirect to the same page


        $indexarray = $this->input->post('btndelete');
        log_message('debug', "delete array:" . print_r($this->session->list, True));
        log_message('debug', "index to delete: " . print_r($indexarray, TRUE));
        $existsessionArray = $this->session->list;
        array_splice($existsessionArray, $indexarray, 1);
        log_message('debug', " After deleting delete array :" . print_r($existsessionArray, True));



        if ($this->session->has_userdata('userId')) {
            $data = array("isSet" => TRUE, "data" => $existsessionArray);
        } else {
            $data = array("isSet" => FALSE, "data" => null);
        }
        $this->session->list = $existsessionArray;
        log_message('debug', "after is set " . print_r($existsessionArray, True));
        $this->load->view('shoppingcart', $data);
        $finaTotal = array_sum(array_column($existsessionArray, 'SubTotal'));
        log_message('debug', "final total after deleting" . print_r($finaTotal, True));
    }

    public function checkout() {

        //create the model and call it to insert the final order details to the database
        //show final total, items and details
//        $finaTotal = array_sum(array_column($this->session->list, 'SubTotal'));
//        $sum = number_format($finaTotal, 2);
        //log_message('debug',"sending total to ".print_r($sum,True));
        // then load the customer details view
        $this->load->view('customer');
        // 
        // in customer details view show the arrival time
    }

    public function insertCustomerDetails() {

        //validate input field email
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('customer');
        } else {
            //load model to insert customer details.
            $this->load->model('ShoppingCartModel');
            $result = $this->ShoppingCartModel->insertCusDetails();


            if ($result != false) {
                // adding order details to the order table.
                $this->load->model('ShoppingCartModel');
                $email = $this->input->post('email');


                log_message('debug', "customer email " . print_r($email, True));
                $result2 = $this->ShoppingCartModel->insertOrderDetails($email);
                echo '<script>alert("Thank you! Your order has been placed sucessfully!");</script>';
                
                $this->session->sess_destroy();
                log_message('debug', "after unsessting te session " . print_r($this->session->list, True));
                $this->load->view('home');
                
            } else {
                redirect('HomeController/customerInfoForm');
            }
        }
    }

}

?>