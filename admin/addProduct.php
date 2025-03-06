<?php 
include("../include/connected.php");
?>

<?php
$proname=@$_POST["proName"];
$proPrice=@$_POST["proPrice"];
$proSection=@$_POST["proSection"];
$proDescrption=@$_POST["proDescrption"];
$proSize=@$_POST["proSize"];
$proUnv=@$_POST["proUnv"];
$proadd=@$_POST["proadd"];

// img start
$ImageName=@$_FILES['proimg']['name'];
$ImageTmp=@$_FILES["proimg"]['tmp_name'];

// img end

if(isset($proadd)){
    if(empty($proname)||empty($proPrice)||empty($proSection)||empty($proDescrption)||empty($proSize)||empty($proUnv)){
        echo '<script> alert(" الرجاء ملئ جميع الحقول ")</script>';
    }
    else{
        $proImage=rand(0,5000)."_".$ImageName;
        move_uploaded_file($ImageTmp,"../uploads/images/".$proImage);
        $query="INSERT INTO `product` ( `proName`, `proimg`, `proPrice`, `proSection`, `proDescrption`, `proSize`, `proUnv`) VALUES ( '$proname', ' $proImage', '$proPrice ','$proSection', '$proDescrption', '$proSize ', '$proUnv ')";
        $result=mysqli_query($con,$query);
        if(isset($result)){
            echo '<script> alert("تم اضافة المنتج بنجاح")</script>';
        }
        else{
            echo '<script> alert("لم يتم اضافة المنتج ")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../all.min.css">
    <link rel="stylesheet" href="../css/style_admin.css">
    <title>اضافة منتجات</title>
</head>

<body>
    <center>
        <main>
            <div class="form_product">
                <h1>اضافة منتج</h1>
                <form action="addProduct.php" method="post" enctype="multipart/form-data">
                    <label for="name">عنوان المنتج</label>
                    <input type="text" id="name" name="proName">

                    <label for="file">صورة المنتج</label>
                    <input type="file" id="file" name="proimg">

                    <label for="price">سعر المنتج</label>
                    <input type="text" id="price" name="proPrice">

                    <label for="description">تفاصيل المنتج</label>
                    <input type="text" id="description" name="proDescrption">

                    <label for="size"> الاحجام المتوفرة</label>
                    <input type="text" id="size" name="proSize">

                    <label for="unv">توفر المنتج</label>
                    <input type="text" id="unv" name="proUnv">

                    <div>
                        <label for="from_control"> الصنف </label>
                        <select name="proSection" id="from_control">

                            <?php
                            $query="select *from section";
                            $result=mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result)){
                              echo '  <option value='.$row['id'].'> ' .$row['section_name'].' </option>';

                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="button" name="proadd">اضافة منتج</button>
                </form>
            </div>
        </main>
    </center>
</body>

</html>