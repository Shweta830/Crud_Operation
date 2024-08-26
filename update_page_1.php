<?php include('header.php'); ?>
<?php include('config.php'); ?>


<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
$query = "select * from `students` where id = '$id' ";

$result = mysqli_query($con, $query);

if(!$result){
    echo ("query Failed".mysqli_error());
}
else{
    $row = mysqli_fetch_assoc($result);
    }
?>

<?php
 if(isset($_POST['update_students'])){

    



    $fname=$_POST['f_name'];
    $lname=$_POST['l_name'];
    $age=$_POST['age'];

    $query= "UPDATE `students` set `first_name`='$fname',`last_name`='$lname',`age`= '$age' where `id` = '$id' ";
   
    $result = mysqli_query($con,$query);
 echo $result;
  if(!$result){
    echo ("query Failed".mysqli_error());
}
else{
    header('location:index.php?update_msg=Your data has been updated succesfully');
}
 }


 

?>

<form action="update_page_1.php?id=<?php echo $id; ?>" method="post">
<div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>">
           </div>
           <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>">
           </div>
           <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
           </div>
           <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">

</form>


<?php include('footer.php'); ?>
