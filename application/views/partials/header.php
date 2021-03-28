<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PizzaNow!</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
              crossorigin="anonymous">
        <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="/CodelgniterPizzaWeb/assets/css/styleheader.css" 
              rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">

                            <img  src="/CodelgniterPizzaWeb/assets/images/pizza-full.png" 
                                  alt="Brand" width="30" height="30">
                        </a>

                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">

                            <li class="active">
                                <a class="navbar-brand" href="/CodelgniterPizzaWeb/index.php/HomeController/index">
                                    <i class="fa fa-fw fa-home"></i> PizzaNow!</a>
                                <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                                <a class="navbar-brand" href="/CodelgniterPizzaWeb/index.php/HomeController/index#section3">
                                    <i class="fa fa-fw fa-envelope"></i> About</a></li>
                            <li class="dropdown">
                                <a class="navbar-brand" href="#" class="dropdown-toggle" data-toggle="dropdown" 
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i> Menus 
                                    <span class="caret"></span>
                                </a>
                                <ul  class="dropdown-menu">
                                    <li>
                                        <a href="/CodelgniterPizzaWeb/index.php/AllMealsController/viewAllPizza">Pizzas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/CodelgniterPizzaWeb/index.php/AllMealsController/viewOtherItems">Sides
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/CodelgniterPizzaWeb/index.php/AllMealsController/viewOtherItems">Drinks
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="/CodelgniterPizzaWeb/index.php/AllMealsController/viewOtherItems">Special Deals
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="navbar-brand" href="/CodelgniterPizzaWeb/index.php/ShoppingCartController/viewCart">
                                    <i class="fa fa-shopping-cart"></i> Cart</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
    </body>
    <!-- include javascript, jQuery FIRST -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</html>

