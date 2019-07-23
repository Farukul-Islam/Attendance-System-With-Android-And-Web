 <?php

 $db = mysqli_connect('localhost','root','','arct');

if($_SERVER['REQUEST_METHOD']=='POST'){

  $date=date("Y-m-d");
  
  $res="";
  $ids="";
 $jsonarr = $_POST['arr'];
 $newArray =json_decode($jsonarr ,true);

 foreach ($newArray as $row) {
   $id=$row['id'];
   $table=$row['table'];
   
   $Sql_Queryw = "INSERT INTO `$table` (`date`) VALUES ('$date');";
   $res=mysqli_query($db,$Sql_Queryw);

    
    
  
   $Sql_Query = "UPDATE `$table` SET `$id` = '1' WHERE `$table`.`date` = '$date'";
   $res=mysqli_query($db,$Sql_Query);

   $result = mysqli_query($db,"SELECT * FROM $table");
    $all_property = array();

     while ($property = mysqli_fetch_field($result)) {
        $ids= $property->name;
        $Sql_Queryq = "UPDATE `$table` SET `$ids` = '0' WHERE `$table`.`date` = '$date' and `$ids`= ''";
        $res=mysqli_query($db,$Sql_Queryq);
        array_push($all_property, $property->name);
    }

}
if($res)
  {
     echo 'Attendance Successfully Saved';
  }
else
  {
   echo 'Something went wrong';
  }

}

 mysqli_close($db);

?>



