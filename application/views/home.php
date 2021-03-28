

<?php
include 'partials/header.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PizzaNow!</title>

        <!-- Latest compiled and minified CSS -->

        <link href="/CodelgniterPizzaWeb/assets/css/styleHomePage.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

    </head>
    <body>
        <style>
            #coloumn1{

                width:800px;
                float: right;
                min-height: 300px;
                margin-right:150px;
                padding-top: 90px;
            }
            #sidebar{

                min-height: 0px;
                margin-right: 690px;
                width: 500px;
                margin-bottom: 0px;
                margin-left: 50px;
                float: top;


            }
            #section2{
                height: 100%;
                width: 100%;
                display:inline-block;
                background:white;
            }

            h1.homeh2{
                font-family: 'Sofia';
                font-size: 60px;
                align-content: center;
                text-align: center;
                
            }

            h4.homedesc2{
                font-family: 'Sofia';
                font-size: 40px;
                align-content: center;
                padding-top: 90px;
                text-align: center;
                
            }

            .read-more-btn{
                background-image: linear-gradient(to bottom, #ffcc99 0%, #ff0000 100%);
                padding:5px 12px 8px;
                border-radius: 20px;
                line-height: 20px;
                font-size: 20px;
                color:white;
                border: none!important;
                float: center;    
                text-align: center; 
                margin: auto; 
                display: flex; 
                display: grid;
                font-family:'verdana';
                width: 350px;    
            }


            .read-more-btn:hover
            {
                background-image: linear-gradient(to right, #006417,#00b128);
                text-decoration: none;
                color:#fff;    

            }
            body {

                font-family:'verdana';
                margin: 0;
                overflow-x: hidden; /* Hide horizontal scrollbar */
            }

            html {
                box-sizing: border-box;
            }

            *, *:before, *:after {
                box-sizing: inherit;
            }

            .column {
                float: left;
                width: 33.3%;
                margin-bottom: 16px;
                padding: 0 8px;
            }

            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                margin: 8px;
            }

            .about-section {
                padding: 50px;
                text-align: center;
                font-family: 'Sofia';
                background: linear-gradient(to bottom, #993300 0%, #cc6699 100%);
                color: white;
            }

            .container {
                padding: 0 16px;
            }

            .container::after, .row::after {
                content: "";
                clear: both;
                display: table;
            }

            .title {
                color: grey;
            }

            @media screen and (max-width: 650px) {
                .column {
                    width: 100%;
                    display: block;
                }
            }

        </style>
        <header class="headerhome">



            <!--   section 1-->
            <main>
                <section id="section1" class=" section 1 container text-center">
                    <div class ="row">
                        <div class="pray">

                            <div class="container text-center">
                                <div class="row">
                                    <div class ="col-md-7 col-sm-12">
                                        <h1 class="homeh1">SHARE YOUR LOVE FOR PIZZA </h1>
                                        <h4 class="homedesc">We make the Best Pizza in your town. Our pizzas are made from the finest ingredients, 
                                            like 100% mozzarella cheese and dough made fresh daily. Choose from 8 mouthwatering crust flavors: 
                                            Butter, Butter Cheese, Asiago Cheese, Ranch, Onion, Cajun, Sesame and Garlic Herb. 
                                            Place your carry out or delivery order by calling your local store or ordering online today.</h4>
                                        <a href="/CodelgniterPizzaWeb/index.php/AllMealsController/viewAllPizza">
                                            <button class="read-more-btn">View All Deals</button>
                                        </a>   

                                    </div>
                                    <div class ="col-md-5 col-sm-12">
            <!--                            <img src="<?php echo base_url(); ?>assets/images/pizza-full.png"  alt="pizza bg image">-->
                                        <img src="/CodelgniterPizzaWeb/assets/images/pizza-full.png"  style="max-width:100%;height:auto;" alt="pizza by image" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </header> 

        <section  id="section2">
            <div id="coloumn1">
                <h1 class="homeh2">Welcome To Pizza-NoW!</h1>             
                <h4 class="homedesc2">We are not only make pizza here,We make yummy and tasty pizza</h4>
            </div>       
            <div id="sidebar">
                <img src="/CodelgniterPizzaWeb/assets/images/ab1.png" style="max-width:100%;height:auto;" alt="welcome image">
            </div>

        </section>

        <section  id="section3">
            <div class="about-section">
                <h1 class="homeh2">Behind The Taste</h1>
                <h2 style="text-align:center">Our Team</h2>
            </div>


            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="/CodelgniterPizzaWeb/assets/images/t1.jpg" alt="Milly kent" style="width:100%" width="500" height="548">
                        <div class="container">
                            <h2>Milly kent</h2>
                            <h3 class="title">CEO & Executive Chef</h3>
                            <p>For more than 15 years, he collaborated with cooking scientists.</p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="/CodelgniterPizzaWeb/assets/images/t2.jpg" alt="Omar Deo" style="width:100%" width="500" height="548">
                        <div class="container">
                            <h2>Omar Deo</h2>
                            <h3 class="title">Head Chef</h3>
                            <p>In his quest for lighter cooking, have great emphasis on health</p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="/CodelgniterPizzaWeb/assets/images/t3.jpg" alt="Willy West" style="width:100%" width="500" height="548">
                        <div class="container">
                            <h2>Willy West</h2>
                            <h3 class="title">Sous Chef</h3>
                            <p>He is known for experimenting with food pairing</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </body>

    <!-- Footer -->
    <footer id="footer"  class="page-footer font-small special-color-dark pt-4">

        <div class="footer-copyright text-center py-3"> Design with 
            <i class="fa fa-heart" aria-hidden="true"></i> by
            <a href="https://www.linkedin.com/in/duneesha-suloshinie-a62046185/" style="color:black"> Duneesha Suloshini </a>

            

    </footer>
</html>






