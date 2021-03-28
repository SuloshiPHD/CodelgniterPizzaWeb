<?php
include 'partials/header.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->    


        <style>
            body{
                /*   background-image: url("../assets/images/b4.jpg");  */
                background: linear-gradient(to bottom right, #ccffff 0%, #99ccff 100%);
            }
            #shoppingcart {

                border-collapse: collapse;
                width: 95%;
            }

            #shoppingcart td, #shoppingcart th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
                font-family: 'verdana';
                font-size: 20px;
            }

            #shoppingcart tr:nth-child(even){background-color:linear-gradient(to left, #dddddd 0%, #33ccff 100%);}

            #shoppingcart tr:hover {background-color: #bfe299;
                                    background-image: linear-gradient(315deg, #bfe299 0%, #66b5f6 74%);}

            #shoppingcart th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background: linear-gradient(to bottom, #43c6ac 0%, #191654 100%);
                color: white;
                font-family:'verdana';
                font-size: 20px;
            }

            .read-more-btn
            {
                background-image: linear-gradient(to bottom, #cc99ff 0%, #9999ff 100%);
                padding:5px 1px 8px;
                border-radius: 20px;
                line-height: 20px;
                font-size: 14px;
                color:white;
                border: none!important;
                float: right;    
                text-align: center; 
                margin: auto; 
                display: flex; 
                display: grid;
                font-family:'verdana';
                width: 15%;
                white-space: nowrap;
                display: block;



            }


            .read-more-btn:hover
            {
                background-image: linear-gradient(to right, #006417,#00b128);
                text-decoration: none;
                color:#fff;


            }


        </style>


    </head>
    <body>   
        <h1 style="text-align:center"> Your Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i> </h1>
        <?php echo validation_errors(); ?> 
        <?php
        if (empty($data)) {
            echo "<h4> Your Cart looks a little empty.
            Check out some of our unbeatable deals </h4>";
        }
        ?>
        <table id="shoppingcart"> 
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Item Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Extra Toppings Total price</th>
                    <th>Sub Total Rs.</th>

                </tr>

            </thead>

            <tbody>
                <tr>

                    <?php
                    if ($isSet) {
                        foreach ($data as $key => $row) {
                            ?>
                            <td> 
                                <img  src="/CodelgniterPizzaWeb/assets/images/pizzas/<?php echo $row['pizza_img']; ?>" height="200" width="240" class="img-fluid border-radius p-4" alt="">
                            </td>
                            <td> <?php echo $row['pizza_name']; ?> </td>
                            <td> <?php echo $row['pizzaPrice']; ?> </td>
                            <td> <?php echo $row['Qty']; ?> </td>
                            <td> <?php echo number_format($row['toppingPrice'], 2); ?> </td>
                            <td> <?php echo number_format($row['SubTotal'], 2); ?> </td>  
                            <td>

                                <!--             delete an item from the cart-->
                                <?php echo form_open('ShoppingCartController/deleteFromCart'); ?>

                                <button type="submit" name= "btndelete" class="btn btn-light px-5 py-2" value="<?php echo"$key" ?>"><i class= "fa fa-trash fa-2x" aria-hidden="true"> </i></button>

                                <?php echo form_close(); ?>

                                <!--             update the quantity of an item-->
                                <!--        <a href="<?php echo base_url('index.php/ShoppingCartController/updateItem'); ?> ">
                                        <button class="btn btn-light px-5 py-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></button>
                                         </a>       -->
                            </td>

                        </tr>

                    <?php
                    }
                }
                ?>
            </tbody>
        </table>  

        <?php
        if (!empty($data)) {
            $sum = array_sum(array_column($data, 'SubTotal'));
            echo "<h2 style='float:right; font-weight:bold;'> Total Amount : Rs. " . number_format($sum, 2) . "</h2>";
            log_message('debug', "finalTotal  " . print_r($sum, TRUE));
        }
        ?>



        <?php
        log_message('debug', "count  " . print_r(count((array) $data), TRUE));
        if (count((array) $data) > 0) {
            ?>
            <br><br><br><br>
            <div>
    <?php echo form_open('ShoppingCartController/checkout'); ?>
                <button class="read-more-btn" style="margin:20px;"><i class="fa fa-money" aria-hidden="true"></i>  PLACE ORDER 
                    <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
            <?php echo form_close(); ?>
            </div>
<?php } ?>  


        <div>         
            <?php echo form_open('AllMealsController/viewAllPizza'); ?>
            <button class="read-more-btn"  style="margin:20px;"><i class="fa fa-arrow-left" aria-hidden="true"></i>  CONTINUE SHOPPING </button>
<?php echo form_close(); ?>
        </div>
    </body>

</html>

