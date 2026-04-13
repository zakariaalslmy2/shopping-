<?php 
include("../include/connected.php");
?>
<!-- start update -->
<?php 

@$id=$_GET['id'];
if(isset($id)){

    $query="select * from product where id='$id'";
    $result=mysqli_query($con,$query);
    if($result){
        $row=mysqli_fetch_assoc($result);

    }

}






$id_new=@$_GET["id_new"];
$proname=@$_POST["proName"];
$proPrice=@$_POST["proPrice"];
$proSection=@$_POST["proSection"];
$proDescrption=@$_POST["proDescrption"];
$proSize=@$_POST["proSize"];
$proUnv=@$_POST["proUnv"];
$proadd=@$_POST["proUpdate"];
@$ImageName=$_FILES['proimg']['name'];
@$ImageTmp=$_FILES['proimg']['tmp_name'];

if(isset($proadd) && isset($_GET["id_new"])){
    if(empty($proname) || empty($proPrice) || empty($proSection) || empty($proDescrption) || empty($proSize) || empty($proUnv)){
        echo '<script> alert("الرجاء ملئ جميع الحقول")</script>';
    } else {
        // معالجة الصورة
        if(!empty($ImageName)){
            $ImageName = str_replace(' ', '', $ImageName);
            move_uploaded_file($ImageTmp, "../uploads/images/".$ImageName);
        } else {
            // استخدام الصورة القديمة إذا لم يتم تحميل صورة جديدة
            $ImageName = $row['proimg'];
        }

        // تنظيف المدخلات لمنع SQL Injection
        $proname = mysqli_real_escape_string($con, $proname);
        $proPrice = mysqli_real_escape_string($con, $proPrice);
        $proSection = mysqli_real_escape_string($con, $proSection);
        $proDescrption = mysqli_real_escape_string($con, $proDescrption);
        $proUnv = mysqli_real_escape_string($con, $proUnv);
        
        $query = "UPDATE product SET 
            proName = '$proname',
            proimg = '$ImageName',
            proPrice = '$proPrice',
            proSection = '$proSection',
            proDescrption = '$proDescrption',
            proUnv = '$proUnv' 
            WHERE id = '$id_new'";

        $result = mysqli_query($con, $query);
        
        if($result){
            echo '<script>alert("تم تحديث المنتج بنجاح");</script>';
            // يمكنك إضافة إعادة توجيه هنا
            header("Location: product.php");
        } else {
            echo '<script>alert("حدث خطأ أثناء تحديث المنتج: ' . mysqli_error($con) . '");</script>';
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
                <h1>تعديل منتج</h1>
                <form action="updateProduct.php?id_new=<?php echo @$row['id'] ?>" method="post"
                    enctype="multipart/form-data">
                    <label for="name">عنوان المنتج</label>
                    <input type="text" id="name" name="proName" value="<?php echo @$row['proName'] ?>">

                    <label for="file">صورة المنتج</label>
                    <input type="file" id="file" name="proimg" value="<?php echo @$row['proName'] ?>">

                    <label for=" price">سعر المنتج</label>
                    <input type="text" id="price" name="proPrice" value="<?php echo @$row['proPrice'] ?> ">

                    <label for=" description">تفاصيل المنتج</label>
                    <input type="text" id="description" name="proDescrption"
                        value="<?php echo $row['proDescrption'] ?>">

                    <label for=" size"> الاحجام المتوفرة</label>
                    <input type="text" id="size" name="proSize" value="<?php echo  @$row['proSize'] ?>">

                    <label for=" unv">توفر المنتج</label>
                    <input type="text" id="unv" name="proUnv" value="<?php echo @$row['proUnv'] ?>">

                    <div>
                        <label for=" from_control"> الصنف </label>
                        <select name="proSection" id="from_control">

                            <?php
                            $query="select *from section";
                            $result=mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result)){
                              echo '<option value='.$row['id'].'> ' .$row['section_name'].' </option>';

                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="button" name="proUpdate">تعديل منتج</button>
                </form>
            </div>
        </main>
    </center>
</body>

</html>