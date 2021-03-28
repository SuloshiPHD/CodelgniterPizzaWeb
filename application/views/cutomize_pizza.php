<?php
include 'partials/header.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                font-family: Arial;
                padding: 10px;
                background: linear-gradient(to bottom, #99ccff 0%, #cc99ff 100%);
            }
            /* Left column */
            .leftcolumn {   
                float: left;
                width: 44%;
                padding: 10px 0;  
                text-align: center;
                padding-left: 25px;


            }

            /* Right column */
            .rightcolumn {
                float: left;
                width: 51%;
                background-color: #f1f1f1;
                padding-left: 20px;

                margin: 10px 10px 0 10px;
            }


            .fakeimg {
                background-color: #f8f9d2;
                background-image: linear-gradient(315deg, #f8f9d2 0%, #e8dbfc 74%);
                width: 40%;  
                padding: 15px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }


            .card {

                padding: 50px;
                margin-top: 25px;
                background-color: #d9e4f5;
                background-image: linear-gradient(315deg, #d9e4f5 0%, #f5e3e6 74%);
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            .top-checkbox{
                columns: 2 30em;
            }
            .btn btn-default{
                display: block;
                padding-top: 30px;
                width: 50%;
                border-radius: 20px;
            }
            .btn{
                padding-top: 8px;
                border-radius: 20px;
            }
            input[type="radio"]{
                margin: 0 10px 0 50px;
            }


            input[type="checkbox"]{
                margin: 0 10px 0 50px;
            }

            .qty{
                margin: 10px 10px 0 50px; 

            }

            /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 800px) {
                .leftcolumn, .rightcolumn {   
                    width: 100%;
                    padding: 0;
                }
            }

            /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
            @media screen and (max-width: 400px) {
                .topnav a {
                    float: none;
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>


        <?php echo validation_errors(); ?>
        <div class="row">
            <div class="leftcolumn">
                <div class="card">

                    <?php
                    echo "<h2>$pizza_title</h2>";
                    ?>
                    <br><br>
                    <div class="fakeimg" style="height:460px; width: 460px;">
                        <img  src="/CodelgniterPizzaWeb/assets/images/pizzas/<?php echo"$pizza_img" ?>">
                    </div>
                    <?php
                    echo "<br><h5>$pizza_des</h5>";
                    echo "<h4>Price start from: Rs.$pizza_price </h4>"
                    ?>
                </div>
            </div>
            <div class="rightcolumn">
                <div class="card">

                    <h2 align ='center'>Customize your pizza</h2>

                    <?php
                    $selectedPizzaID = array('pizzaid' => $pizza_id);

                    log_message('debug', "selected pizza id is " . print_r($selectedPizzaID, TRUE));
                    log_message('debug', "selected pizza id is " . print_r($pizza_id, TRUE));

                    echo form_open('ShoppingCartController/addToCart', '', array('pizza_id' => $pizza_id, 'pizza_name' => $pizza_title, 'pizza_img' => $pizza_img));

// form_open('controller/method', array(id=>'myFormID'), array('my_hidden_field'=>12345));
                    ?> 


                    <div class="radio-btn">
                        <h2>Select size: </h2><br>
                        <input type="radio" id="pizzasmallprice" name="pizzaSize" value="<?php echo "$pizza_smallp"; ?>"  checked required>
                        <label for="smallpizza"> Personal: Rs. <?php echo "$pizza_smallp"; ?> </label>
                        <input type="radio" id="pizzamediumprice" name="pizzaSize" value="<?php echo "$pizza_mediump"; ?>">
                        <label for="mediumpizza"> Medium: Rs. <?php echo "$pizza_mediump"; ?> </label>
                        <input type="radio" id="pizzalargeprice" name="pizzaSize" value="<?php echo "$pizza_largep"; ?>">
                        <label for="largepizza"> Large: Rs. <?php echo "$pizza_largep"; ?> </label>
                    </div>
                    <div>          

                        <br><h2>Add some extra toppings: </h2><br>

                        <?php foreach ($toppingsList as $pizza) { ?>
                        <div class="top-checkbox">
                                <input type="checkbox" name="check[]" value=" <?php echo "$pizza->top_price" ?>">
                                <img  src="/CodelgniterPizzaWeb/assets/images/toppings/<?php echo "$pizza->top_img" ?>" alt="image">
                                <label for="topTitle"> <?php echo "$pizza->top_title" ?>  </label> 
                                <label for="topPrice"> ( Rs. <?php echo "$pizza->top_price" ?>  ) </label>

                            <?php }
                            ?>        

                        </div> 
                        <br><br>
                        <div class="qty">
                            <label for="quantity"> Quantity : </label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="25">   
                        </div>
                        <br>
                        <div class="btn">
                            <br><button style="float:left; width:300%;" type="submit" name="submit" class="btn btn-default" value="<?php echo"$pizza_id" ?>" >
                                Add To Cart <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
