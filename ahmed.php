<!DOCTYPE html>
<html lang="en">
<head>
   <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Changa:wght@200;800&family=El+Messiri&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./ahmed.CSS">
</head>
<body dir='rtl'>
   <?php
//    الاتصال بقاعدة البيانات 
     $host='localhost';
     $user='root';
     $pass='';
     $db='ahmed1';
     $con=mysqli_connect($host,$user,$pass,$db);
     $res=mysqli_query($con,"select * from student");
    //  المتغيرات
     $id='';
     $name='';
     $address='';
     if(isset($_POST['id'])){
         $id=$_POST['id'];
     }
     if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls="insert into student value($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("location: ahmed.php");
    }
    if(isset($_POST['del'])){
        $sqls="delete from student where id='$id'";
        mysqli_query($con,$sqls);
        header("location: ahmed.php");
    }
    if(isset($_POST['ubd'])){
        $sqls="update student where id='$id'";
        mysqli_query($con,$sqls);
        header("location: ahmed.php");
    }
     ?>
    <div id='mother'>
    <form method='POST'>
    <!-- لوحة التحكم -->
    <aside>
    <div id='div'>
    <img src="./IMG_٢٠٢٢١٢٢٩_٠٩٥١٤٦.jpg" alt="" width="200px">
    <h3>لوحة المدير</h3>
    <label>رقم الطالب:</label><br>
    <input type="text" name='id' id='id'><br>
    <label>اسم الطالب:</label><br>
    <input type="text" name='name' id='name'><br>
    <label>عنوان الطالب:</label><br>
    <input type="text" name='address' id='address'><br><br>
    <button name='add'> اضافة طالب</button>
    <button name='del'> حذف الطالب</button>
    <button name='ubd'>تعديل </button>
    </div>
    </aside>
    <!-- عرض البيانات -->
    <main>
    <table id='tbl'>
    <tr>
    <th>الرقم التسلسلي</th>
    <th>اسم الطالب</th>
    <th>عنوان الطالب</th>
    </tr>
    <?php
      while ( $row = mysqli_fetch_array($res)) {
         echo "<tr>";
         echo "<td>".$row['id']."</td>";
         echo "<td>".$row['name']."</td>";
         echo "<td>".$row['address']."</td>";
         echo "</tr>";
         
      }
    ?>
    </table>
    </main>
    </form>
    </div>
</body>
</html>