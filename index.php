<!-- headers start -->
<?php
include("file/headers.php");
?>


<!-- prodect start -->
<main>
    <?php

$query="select *from product ";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($result)){
// echo $row['proimg'];
$imagePath = "uploads/images/" . trim($row["proimg"]);
// إزالة أي مسافات زائدة من اسم الملف
$imagePath = str_replace(' ', '', $imagePath);

?>

    <div class="prodect">
        <!-- img -->
        <div class="prodect_img"><a href="detalis.php?id=<?php echo $row['id'] ?>">

                <?php
            if (file_exists($imagePath) && !empty($row["proimg"])) {

                echo '<img src="'.$imagePath.'" class="product-image" alt="صورة المنتج">';
                // للتأكد من المسار الصحيح
            } else {
                echo 'الصورة غير متوفرة';
            }
            
            ?></a>
            <span class="unvailable"> </span>
            <a href=""><?php echo $row['proUnv']?></a>
        </div>
        <!-- section  -->
        <div class="prodect_section">
            <a href=""><?php echo $row['proSection']?></a>

        </div>

        <!-- name -->
        <div class="prodect_name">
            <a href=""> <?php echo $row['proName']?></a>

        </div>
        <!-- price -->
        <div class="prodrct_price">
            <a href=""> <?php echo $row['proPrice']?></a>

        </div>
        <!-- description -->
        <div class="prodect_description">
            <a href="details.php"><i class="fa-solid fa-eye"></i>لتفاصيل المنتج اضغط هنا</a>

        </div>

        <!--  quantity -->
        <div class="qty_input">
            <button class="qty_count_mins">-</button>
            <input type="number" id="quantity" name="" value="1" min="0" max="7">
            <button class="qty_count_add">+</button>

        </div><br>
        <!--  submit -->
        <div class="submit">
            <a href=""><button class="add_cart" name=""> <i class="fa-solid fa-cart-plus">&nbsp;&nbsp;</i>اضف الي
                    السلة </button></a>

        </div>

    </div>


    <?php
        }
        ?>



</main>

<!-- prodect end -->




<!-- footers start -->
<?php
include("file/footers.php");
?>

<script src="all.min.js"> </script>
</body>

</html>