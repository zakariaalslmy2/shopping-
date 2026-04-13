<?php 
include("../include/connected.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_admin.css">
    <title>صفحة المنتجات</title>
    <style>
    .sidebar_container .content_sec table .update {
        color: white;
        font-size: 18px;
        background-color: rgb(3, 228, 100);
        padding: 8px 18px;
        border-radius: 2px;
        border: 1px solid rgb(154, 240, 182);
        margin-right: 5px;
    }

    .sidebar_container .content_sec table .update:hover {
        background-color: rgb(8, 94, 23);
        color: white;
    }

    /* Added styles for better image display */
    .product-image {
        max-width: 100px;
        max-height: 100px;
        object-fit: contain;
    }
    </style>
</head>

<body>
    <!-- start delete -->
    <?php 

@$id=$_GET['id'];
if(isset($id)){

    $query="delete from product where id='$id'";
    $delete=mysqli_query($con,$query);
    if( isset($delete)){
       echo "<script>alert('تم حذف المنتج بنجاح')</script>";

    }else{
        echo "<script>alert('لم يتم حذف المنتج هناك خطاء ما ')</script>";
    }
}
?>

    <!-- end delete -->
    <!-- sidebar start -->
    <div class="sidebar_container">
        <div class="content_sec" style="width: 100%;">
            <table dir="rtl">
                <tr>
                    <th> رقم المنتج</th>
                    <th>صورة المنتج </th>
                    <th> عنوان المنتج</th>
                    <th> سعر المنتج</th>
                    <th> الاحجام المتوفرة </th>
                    <th> توفر المنتج</th>
                    <th> الاقسام</th>
                    <th> تفاصيل المنتج</th>
                    <th> حذف المنتج</th>
                    <th> تعديل المنتج</th>
                </tr>
                <?php
                $query="select * from product";
                $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td>
                        <?php 
    // تعديل المسار ليكون صحيحاً نسبة لموقع الملف
    $imagePath = "../uploads/images/" . trim($row["proimg"]);
    // إزالة أي مسافات زائدة من اسم الملف
    $imagePath = str_replace(' ', '', $imagePath);
    
    if (file_exists($imagePath) && !empty($row["proimg"])) {
        echo '<img src="'.$imagePath.'" class="product-image" alt="صورة المنتج">';
        // للتأكد من المسار الصحيح
        // echo $imagePath;
    } else {
        echo 'الصورة غير متوفرة';
    }
    ?>
                    </td>
                    <td><?php echo $row["proName"]; ?></td>
                    <td><?php echo $row["proPrice"]; ?></td>
                    <td><?php echo $row["proSize"]; ?></td>
                    <td><?php echo $row["proUnv"]; ?></td>
                    <td><?php echo $row["proSection"]; ?></td>
                    <td><?php echo $row["proDescrption"]; ?></td>
                    <td><a href="product.php?id=<?php echo $row["id"]; ?>"><button type="submit" class="delete">حذف
                                المنتج</button></a></td>
                    <td><a href="updateProduct.php?id=<?php echo $row["id"]; ?>"><button type="submit"
                                class="update">تعديل
                                القسم</button></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    <!-- // sidebar end -->

    <script src="../all.min.js"> </script>
</body>

</html>