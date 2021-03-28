
<?php
include 'partials/header.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Delius Unicase' rel='stylesheet'>
        <style>
            body {
                font-family: Arial;
                font-size: 17px;
                padding: 8px;
                background: linear-gradient(to top left, #ccffcc 0%, #99ccff 100%);
                background-image: url("/CodelgniterPizzaWeb/assets/images/b4.jpg");
                overflow-x: hidden;
            }

            * {
                box-sizing: border-box;
            }

            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap; 
                flex-wrap: wrap;
                margin: 0 -16px;
            }

            .col-25 {
                -ms-flex: 25%; 
                flex: 25%;
            }

            .col-50 {
                -ms-flex: 50%;
                flex: 50%;
            }

            .col-75 {
                -ms-flex: 75%; 
                flex: 75%;
            }

            .col-25,
            .col-50,
            .col-75 {
                padding: 0 16px;
            }

            .container {
                background-color: #f2f2f2;
                padding: 5px 20px 15px 20px;
                border: 1px solid lightgrey;
                border-radius: 30px;
                background-color: #e2c9be;
                background-image: linear-gradient(315deg, #e2c9be 0%, #fbf7e9 74%);
                width: 50%;
                position: relative;
                display: block;
                margin-left: auto;
                margin-right: auto 

            }

            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            input[type=tel] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            label {
                margin-bottom: 10px;
                display: block;
            }

            .icon-container {
                margin-bottom: 20px;
                padding: 7px 0;
                font-size: 24px;
            }

            .btn {
                background: linear-gradient(to bottom, #b79891 0%, #94716b 100%);
                color: white;
                padding: 12px;
                margin: 10px 0;
                border: none;
                width: 75%;
                border-radius: 10px;
                cursor: pointer;
                font-size: 17px;
                text-align: center; 
                margin: auto; 
                display: flex; 
                display: grid;
            }

            .btn:hover {
                background-color: #a55c1b;
                background-image: linear-gradient(315deg, #a55c1b 0%, #000000 74%);
            }

            a {
                color: #2196F3;
            }

            hr {
                border: 1px solid lightgrey;
            }

            span.price {
                float: right;
                color: grey;
            }

            .error {
                color: red;
            }

            /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
            @media (max-width: 800px) {
                .row {
                    flex-direction: column-reverse;
                }
                .col-25 {
                    margin-bottom: 20px;
                }
            }
        </style>
    </head>
    <body>
        <?php
        date_default_timezone_set('Asia/Colombo');
        $deliveryTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +30 minutes"));
        ?>
        <h2 style="text-align:center; font-family:'Delius Unicase'; color: whitesmoke;"> Delivery Details Form</h2>
        <h3 style="text-align:center; color: whitesmoke;">Your order will be delivered within <b>30 mins</b> from the order confirmation.</h3>
        <?php echo "<h3 style='text-align:center; color: whitesmoke;'> Delivery Time : " . $deliveryTime . "</h3>" ?> 
        <p style="text-align:center; color: whitesmoke;">Please enter the details below to complete your order</p>

        <div class="row">
            <div class="col-75">
                <div class="container">

                    <?php echo validation_errors(); ?>
                    <?php echo form_open('ShoppingCartController/insertCustomerDetails', '', array('submit_time' => $deliveryTime)) ?>
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name *</label>
                            <input type="text" id="fname" name="firstname" placeholder="Poual Fernando" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email *</label>
                            <input type="text" id="email" name="email" placeholder="poual@example.com" required> <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            <label for="phone"><i class="fa fa-mobile fa-2x"></i>  Phone No * (Ex: 771234567)</label>
                            <input type="tel" id="phone" name="phone" placeholder="9 Digits Mobile Number" pattern="[1-9]{1}[0-9]{8}" required><br><br>
                            <label for="adr"><i class="fa fa-address-card-o" required></i> Address *</label>
                            <input type="text" id="adr" name="address" placeholder="746 A. 16th Street" required>
                            <label for="city"><i class="fa fa-institution"></i> City *</label>
                            <input type="text" id="city" name="city" placeholder="Sri Lanka" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state"> State *</label>
                                    <input type="text" id="state" name="state" placeholder="Galle" required>
                                </div>
                                <div class="col-50">
                                    <label for="zip"> Zip *</label>
                                    <input type="text" id="zip" name="zip" placeholder="80002" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn">Done  
                    </button>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </body>
</html>

