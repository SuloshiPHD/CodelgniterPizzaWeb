<?php
include 'partials/header.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->

        <link href="/CodelgniterPizzaWeb/assets/css/styleAlldeals.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Delius Unicase' rel='stylesheet'>


    </head>
    <body>

        <!--  all pizza categories are shown as below-->   
        <section class="section-2">
            <div class="container text-center">
                <h2 class="text-dark">Pizza Menu combo for you</h2>
                <p class="text-secondary">With dough hand-made fresh all day, and a buffet full of family favorites</p>
            </div>

<?php foreach ($pizzas as $pizza) { ?>

                <div class="col-md-3">
                    <div class="single-blog">
                        <div class="card">
    <?php echo form_open('AllMealsController/viewCustomerizepizza'); ?> 
                            <img  src="/CodelgniterPizzaWeb/assets/images/pizzas/<?php echo"$pizza->pizza_img" ?>" height="350" width="500" class="img-fluid border-radius p-4" alt="">
                            <h2 style="text-align:center;"><?php echo "$pizza->pizza_title" ?> </h2>                        
                            <h4 class="blog-text"> <?php echo "$pizza->pizza_des" ?> </h4>
                            <button type="submit" name="btn" class="read-more-btn" value="<?php echo"$pizza->pizza_id" ?>">Customize</button>
                            <h4 class="blog-text">Price start from: Rs.<?php echo "$pizza->pizza_price" ?> </h4>

    <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

<?php } ?> 
        </section>    


    </body>
</html>




