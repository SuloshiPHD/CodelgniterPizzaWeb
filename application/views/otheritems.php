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
            .quantity-text{
                color: black;
                text-align:center;
            }
        </style>
        <link href="/CodelgniterPizzaWeb/assets/css/styleAlldeals.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Delius Unicase' rel='stylesheet'>



    </head>
    <body>

        <!--  all appetizers and other items are shown as below-->   
        <section class="section-2">
            <div class="container text-center">
                <h2 class="text-dark">APPETIZERS | DRINKS | SIDES | SPECIAL COMBINATIONS(PROMOS) </h2>
                <p class="text-secondary">Enjoy a taste of heaven with our special appetizers and sides</p>
            </div>

<?php foreach ($otheritemList as $side) { ?>

                <div class="col-md-3">
                    <div class="single-blog">
                        <div class="card">
    <?php echo form_open('ShoppingCartController/addToCart', '', array('otheritem_id' => $side->other_id, 'otheritem_img' => $side->other_img,
        'otheritem_name' => $side->other_title, 'otheritem_price' => $side->other_price));
    ?> 

                            <img  src="/CodelgniterPizzaWeb/assets/images/pizzas/<?php echo"$side->other_img" ?>" height="240" width="280" class="img-fluid border-radius p-4" alt="">
                            <h2 style="text-align:center;"><?php echo "$side->other_title" ?> </h2>                        
                            <h4 class="blog-text"> Category: <?php echo $side->other_category ?> </h4>

                            <button type="submit" name="btnotheritems"class="read-more-btn" value="btnotheritems">Add to Cart</button>                            
                            <h4 class="blog-text">Price start from: Rs.<?php echo "$side->other_price" ?> </h4>

                            <div class="quantity-text">
                                <label style="color:whitesmoke"for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="otheritem_quantity" value="1" min="1" max="25">
                            </div>


    <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

<?php } ?> 
        </section>    


    </body>
</html>




