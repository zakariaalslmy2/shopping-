<?php 


$host="localhost";
$username="root";
$password="";
$dbname="shoppping";

$con=mysqli_connect($host,$username,$password,$dbname);
?>

<!DOCTYPE html>
<html lang="en">
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="style.css">


    <title>الصفحة الرئسية </title>
</head>

<body>
    <header>


        <!-- start logo -->
        <div class="logo">
            <h1>متجرك إب الالكتروني</h1>
            <img src="image/logo.png" alt=" imag logo">

        </div>

        <!-- end logo -->

        <!-- start search -->
        <div class="search">
            <div class="search_bar">
                <form action="" method="get">
                    <input type="text" class="search_input" name="" placeholder="ادخل كلمة البحث">
                    <button class="button_search" name="bttn_search">بحث</button>

                </form>
            </div>
        </div>
        <!-- end search -->
    </header>

    <!-- start social -->
    <nav>
        <div class="social">
            <ul>
                <li><a href="" target_blank><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="" target_blank><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="" target_blank><i class="fa-brands fa-square-instagram"></i></a></li>
                <li><a href="" target_blank><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
        </div>
        <!-- end social -->
        <!-- start section -->
        <div class="section">
            <ul>
                <li><a href="index.php">الرئيسية</a></li>

                <?php 
                    $query="select * from section";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc(  $result)){
                        ?>
                <li><a href=""><?php    echo $row["section_name"]  ; ?></a></li>





                <?php
                }
                ?>
            </ul>
        </div>
        <!-- end section -->
    </nav>

    <!-- last-post start -->

    <div class="last-post">
        <h4>مضاف حديثا </h4>
        <ul>
            <li>
                <a href="">
                    <span class="span-imag">

                        <img src="image/shopping.png" alt="">

                    </span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="span-imag">

                        <img src="image/shopping1.png" alt="">
                    </span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="span-imag">

                        <img src="image/shopping2.png" alt="">
                    </span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="span-imag">
                        <img src="image/shopping3.png" alt="">
                    </span>
                </a>
            </li>
        </ul>

        <!-- last-post end -->

        <!-- cart start -->
        <div class="cart">
            <ul>
                <li>
                    <a href="signup.php"><i class="fa-solid fa-user"></i></a>

                </li>
                <li class="cart-icon">
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    <span class="cart-count">1</span>

                </li>
            </ul>
            <!-- cart end -->
        </div>
    </div>