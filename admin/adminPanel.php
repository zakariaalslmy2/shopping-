<?php 

include("../include/connected.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../all.min.css">
    <link rel="stylesheet" href="../css/style_admin.css">


    <title>Document</title>

</head>

<body>

    <?php 
    session_start();
if(isset($_SESSION["email"])){
header("location:../index.php");

}
else{



?>

    <?php
$section_name=@$_POST["section_name"];
$section_add=@$_POST["section_add"];
$id=@$_GET["id"];
    if(isset($section_add)){
        if(empty($section_name)){
           echo '<script> alert("الحقل فارغ الرجاء ملئ الحقل")</script>';

        }
    elseif($section_name<50){

        echo '<script> alert("اسم الحقل طويل ")</script>';
    }
    else{
        $query="insert into section (section_name) values('$section_name') ";
        $result=mysqli_query($con, $query);
        echo '<script> alert("  تم اضافة القسم بنجاح ")</script>';
        



    }




    }



?>

    <?php
    // delete section
    if(isset($id)){
        $query="delete from section where id ='$id'";
        $delete=mysqli_query($con,$query);
        if(isset($delete)){

            echo '<script> alert("    تم حذف القسم بنجاج")</script>';
        }
        else{

            echo '<script> alert("    لم يتم   حذف القسم ")</script>';

        }


    }


?>
    <!-- sidebar start -->

    <div class="sidebar_container">
        <div class="sidebar">
            <h1> لوحة تحكم الإدارة</h1>
            <ul>
                <li><a href="../index.php" target="_blank">الصفحة الرئسية<i class="fa-solid fa-house"></i></a></li>
                <li><a href="../index.php" target="_blank">صفحة المنتجات<i class="fa-solid fa-shirt"></i></a></li>
                <li><a href="../index.php" target="_blank">اضافة منتج <i class="fa-solid fa-folder-plus"></i></a></li>
                <li><a href="../index.php" target="_blank"> معلومات الاعضاء <i
                            class="fa-sharp fa-solid fa-users"></i></a></li>
                <li><a href="../index.php" target="_blank"> طلبات الزبائى<i class="fa-solid fa- fa-folder-open"></i></a>
                </li>
                <li><a href="logout.php" target="_blank"> تسجيل خروج<i class="fa-solid fa-right-from-bracket "></i></a>
                </li>



            </ul>

        </div>
        <div class="content_sec">
            <form action="adminPanel.php" method="post">
                <label for="section">اضافة قسم جديد </label>
                <input type="text" name="section_name" id="section">
                <br>
                <button class="add" type="submit" name="section_add"> اضافة قسم </button>

            </form>
            <br>
            <table dir="rtl">
                <tr>
                    <th>الرقم التسلسلي</th>
                    <th>اسم القسم </th>
                    <th>حذف القسم</th>
                </tr>
                <tr>
                    <?php 
                    $query="select * from section";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc(  $result)){
                        ?>

                    <td><?php    echo $row["id"]  ; ?></td>
                    <td><?php    echo $row["section_name"]  ; ?></td>
                    <td><a href="adminPanel.php?id=<?php    echo $row["id"]  ;    ?>"><button type="submit"
                                class="delete">حذف القسم</button></a></td>
                </tr>
                <?php

                }
                ?>

            </table>
        </div>


    </div>


    <!-- // sidebar end -->


    <?php
   } //close else
?>
    <script src="../all.min.js"> </script>
</body>

</html>