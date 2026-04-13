<?php
include("file/headers.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المنتج</title>
    <style>
    main {
        display: flex;
        flex-wrap: wrap;

    }

    .container1 {
        width: 90%;
        height: 50%;
        margin: 20px auto;
        border-radius: 8px;

    }

    .product_img {
        float: left;
        display: flex;
        flex-wrap: wrap;


    }

    .product_img img {
        width: 400px;
        height: 320px;
        margin-bottom: 20px;
    }

    .product_info {
        float: right;
        width: 400px;
        height: 400px;
        text-align: center;

    }

    .product_title {
        margin: 10px 0;
    }

    .product_price {
        color: #e67e22;
        margin: 10px 0;

    }

    .product_description {
        font-size: 16px;
        line-height: 1.5;

    }

    .add_cart {
        width: 150px;
        height: 35px;
        margin-left: 30px;
        padding: 10px 10px;
        background-color: #fff;
        border-radius: 5px;


    }

    .add_cart :hover {
        background-color: #e67e22;
    }

    .recently_added {

        float: right;
        width: 30%;
        margin-top: 30px;
        border-radius: 8px;
        padding: 10px 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 1.0);

    }

    .added_image img {
        float: right;
        margin: 10px 10px;
        width: 70px;
        height: 70px;
        margin-right: 5px;
        border-radius: 10px;
    }

    .comment_info {

        float: left;
        margin: 20px 10px;
        width: 50%;
        height: auto;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 1.0);

    }

    h5 {
        font-size: 20px;
        margin-top: 20px;
        text-align: center;
        color: black;

    }

    textarea {
        text-align: center;
        width: 80%;
        margin-top: 20px;
        margin-left: 50px;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;





    }

    .add_comment {

        width: 100px;
        height: 35px;
        margin-left: 190px;
        margin-bottom: 10px;
        padding: 10px 10px;
        background-color: #fff;
        border-radius: 5px;
    }

    .add_comment :hover {
        background-color: #e67e22;
    }

    .comments {
        margin-top: 10px;
    }

    .comment {
        color: black;
        font-size: large;
        margin: 5px 5px;
        text-align: center;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        border-radius: 5px;



    }
    </style>
</head>

<body>

    <main>
        <div class="container1">
            <!-- start img -->
            <div class="product_img">
                <img src="image/shopping2.png" alt="">
            </div>
            <!-- end img -->
            <!-- start product_info -->
            <div class="product_info">
                <h1 class="product_title">عطور</h1>
                <h2 class="product_price">100:0$ &nbsp; السغر</h2><br>
                <h3>small &nbsp; : المقاسات المتوفرة</h3><br>
                <h4 class="product_description">تفاصيل المنتج </h4><br>
                <p>عطور متعددة الاحجام</p>


                <!--  quantity -->
                <div class="qty_input">
                    <button class="qty_count_mins">-</button>
                    <input type="number" id="quantity" name="" value="1" min="0" max="7">
                    <button class="qty_count_add">+</button>

                </div><br>
                <!--  submit -->
                <div class="submit">
                    <a href=""><button class="add_cart" name=""> <i class="fa-solid fa-cart-plus">&nbsp;&nbsp;</i>اضف
                            الي
                            السلة </button></a>

                </div>
            </div>
        </div>

    </main>
    <hr>
    <!--  start recently added -->
    <div class="container1">
        <div class="recently_added">
            <h4>منتجات حديثة </h4>
            <div class="added_image">
                <a href="">
                    <img src="image/shopping1.png" alt="">
                    <img src="image/shopping1.png" alt="">
                    <img src="image/shopping1.png" alt="">
                </a>
            </div>


        </div>
        <!--  end  recently added -->
        <!--  start   comment-->
        <div class="comment_info">
            <h5>هل تود تقيم هاذا المنتج</h5>
            <form action="" method="post">
                <textarea name="" id="" placeholder="قيم هاذا المنتج من فضلك " required></textarea>
                <button class="add_comment" type="submit">ارسال</button>

            </form>
            <h5>تقيمات العملاء</h5>
            <div class="comments">
                <div class="comment">منتج منتاز</div>
            </div>


        </div>

        <!--  end   comment-->

    </div>

</body>

</html>