<?php
session_start();
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:/admin/login.php');
    exit();
   
}
?>
<?php
    $id=$_GET['id'];
    include("../db/conn.php");
    $error = '';
    
    
    
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $type = $_POST['type'];
        $id=$_POST['id'];
        $s=$_POST['vname'];
        $place=$_POST['place'];
        
        $phone=$_POST['phone'];
        
        
        $vname = preg_replace('/[^a-z0-9]+/i','-',trim(strtolower($s)));
        
        $oldname=$_POST['oldname'];
        
        $up="SELECT * FROM register where vname='$oldname';";
        $eup=mysqli_query($sql,$up);
        $nr=mysqli_num_rows($eup);
        while($nr!=0)
        {
            while($res=mysqli_fetch_array($eup))
            {
                $query = "UPDATE register SET vname='$vname' where vname='$oldname';";
                $eq=mysqli_query($sql,$query);
            }
            $nr=$nr-1;
        }
        
        $old=$_POST['old'];
        if($pass==$cpass)
        {
            if($old==$name)
            {
                $query = "UPDATE admin SET phone='$phone',place='$place',name='$vname',username='$name',password='$pass',email='$email',event='$type' where id='$id';";
                if(mysqli_query($sql,$query))
                {
                    $_SESSION['msg']='success';
                    header('location:/admin/allv.php');
                }
                else
                {
                    $_SESSION['msg']='fail';
                    header('location:/admin/allv.php');
                }
            }
            else
            {
                $check="SELECT * FROM admin where username='$name';";
                $ec=mysqli_query($sql,$check);
                $no=mysqli_num_rows($ec);
                
                if($no > 0)
                {
                    $_SESSION['msg']='user';
                    header('location:/admin/allv.php');
                }
                else
                {
                    $query = "UPDATE admin SET phone='$phone',place='$place',name='$vname',username='$name',password='$pass',email='$email',event='$type' where id='$id';";
                    if(mysqli_query($sql,$query))
                    {
                        $_SESSION['msg']='success';
                        header('location:/admin/allv.php');
                    }
                    else
                    {
                        $_SESSION['msg']='fail';
                        header('location:/admin/allv.php');
                    }
                }
            }
        }
        else
        {
            $_SESSION['msg']='pass';
            header('location:/admin/allv.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin Panel</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="css/sb-admin.css" rel="stylesheet">
 <script src="../editor/ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">






  <?php
        include('main/nav.php');
  ?>

  <div id="wrapper">

   <?php
        include('main/side1.php');
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Edit User</a>
          </li>
        </ol>
    <form method="POST" action="editv.php">

<?php
    include("../db/conn.php");
    $qwy="Select * from admin where id='$id';";
    $qq=mysqli_query($sql,$qwy);
    $row=mysqli_fetch_array($qq);
?>
    <input value="<?php echo $row['id']; ?>"  name="id" hidden>
    <input value="<?php echo $row['username']; ?>"  name="old" hidden>
    <input value="<?php echo $row['name']; ?>"  name="oldname" hidden>
    <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="vname" class="form-control"  placeholder="Name" value="<?php echo $row['name']; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" pattern="[789][0-9]{9}" name="phone" class="form-control"  placeholder="Phone" value="<?php echo $row['phone']; ?>" required>
            </div>
        </div>
        
    <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Destination</label>
            <div class="col-sm-10">
              <input type="text" name="place" class="form-control"  placeholder="Destination" value="<?php echo $row['place']; ?>" required>
            </div>
        </div>
        
        
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control"  placeholder="Username" value="<?php echo $row['username']; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="text" name="pass" class="form-control"  placeholder="Password" value="<?php echo $row['password']; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="text" name="cpass" class="form-control"  placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
            </div>
        </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>"  placeholder="Email" >
            </div>
        </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Select to event</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" onchange="uniqueUser()" name="type" required>
                   <option value="<?php echo $row['event']; ?>"><?php echo $row['event']; ?></option>
            </select>
            </div>
        </div>
        
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
<style>
    .form-check-input{
        height:25px;
        width:25px;
        margin:10px;
    }
    .form-check-label{
        margin:5px;
        margin-left:45px;
        font-size:20px;
    }
</style>    
        
    
      <!-- Sticky Footer -->
      <?php
            include("main/footer.php");
      ?>
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
 
</body>

</html>