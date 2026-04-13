<?php
include("file/headers.php");
?>

<?php
if(isset($_GET["bttn_search"])){
    $search=$_GET["search_input"];
    $query="select * from product 
    where proDescrption LIKE '%$search%' 
    or proName  LIKE '%$search%'
    or id  LIKE '%$search%' 
    or proPrice  LIKE '%$search%'";
    $result=mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){
            
            $imagePath = "uploads/images/" . trim($row["proimg"]);
            // إزالة أي مسافات زائدة من اسم الملف
            $imagePath = str_replace(' ', '', $imagePath);
            
            if (file_exists($imagePath) && !empty($row["proimg"])) {

                echo '<img src="'.$imagePath.'" class="product-image" alt="صورة المنتج">';
                // للتأكد من المسار الصحيح
            } else {
                echo 'الصورة غير متوفرة';
            }
       
            echo ' <div class="prodect">

                    <!-- img -->
                    <div class="prodect_img">
                <img src=" '.$imagePath.' " class="product-image" alt="صورة المنتج">;
                    </div>


                
            <span class="unvailable"> </span>
            <a href=""> ' .$row['proUnv'].'</a>
            </div>
            <!-- section  -->
            <div class="prodect_section">
                <a href="">' .$row['proSection'].'</a>

</div>

<!-- name -->
<div class="prodect_name">
    <a href="">  '.$row['proName'].'</a>

</div>
<!-- price -->
<div class="prodrct_price">
    <a href="">  '.$row['proPrice'].'</a>

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

</div>';
}
}
}


?>

<?php
include("file/footers.php");
?>