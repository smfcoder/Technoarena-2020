<?php
session_start();
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:/admin/login.php');
    exit();
   
}
include('../db/conn.php');
$nnn="SELECT * from admin where username='$sname';";
        $ennn=mysqli_query($sql,$nnn);
        $rrrr=mysqli_fetch_array($ennn);
   $name=$rrrr['name'];
?>
<?php
    include("../db/conn.php");
    $error = '';
    
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $name = $_POST['name'];
        $college=$_POST['college'];
        $phone = $_POST['phone'];
        $type = $_POST['type'];
        $vol = $_POST['sname'];
        $tid="Cash Payment";
        $ver=1;
        
        $nn="SELECT * from admin where username='$vol';";
        $enn=mysqli_query($sql,$nn);
        $rrr=mysqli_fetch_array($enn);
        
        $cname=$rrr['name'];
        
        
        $d="SELECT * from events where slug='$type';";
        $ed=mysqli_query($sql,$d);
        
        $r=mysqli_fetch_array($ed);
        $dept=$r['pslug'];
        
        date_default_timezone_set('Asia/Kolkata');
        $ct = date( 'd-m-Y h:i:s A', time () );
        
        if($type!="")
        {
            $select="SELECT * FROM register where email='$email' AND phone='$phone' AND event='$type';";
            $eselect=mysqli_query($sql,$select);
            $rows=mysqli_num_rows($eselect);
            
            $seml="SELECT * FROM register where email='$email' AND event='$type';";
            $eseml=mysqli_query($sql,$seml);
            $eml=mysqli_num_rows($eseml);
            
            
            
            $sp="SELECT * FROM register where phone='$phone' AND event='$type';";
            $esp=mysqli_query($sql,$sp);
            $p=mysqli_num_rows($esp);
            
            
            if($rows > 0)
            {
                $_SESSION['msg']='already';   
            }
            else if($eml > 0)
            {
                $_SESSION['msg']='already';     
            }
            else if($p > 0)
            {
                $_SESSION['msg']='already';       
            }
            else
            {
                $ins="INSERT INTO register(name,college,email,phone,event,dept,tid,verified,vname,dor) values('$name','$college','$email','$phone','$type','$dept','$tid','$ver','$cname','$ct');";
                if(mysqli_query($sql,$ins)) 
                {
                    $_SESSION['msg'] = 'success';
                }   
                else 
                {
                    $_SESSION['msg'] = 'failed';
                }  
            }
        }
        else
        {
           $_SESSION['msg'] = 'failed';
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

    if(isset($_SESSION['msg'])) {
        if($_SESSION['msg']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['msg']);
        }
        else if($_SESSION['msg']=='already')
        {
            echo '<script>alert("Already Register email or phone")</script>';
            unset($_SESSION['msg']);
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration)")</script>';
            unset($_SESSION['msg']);
        }
    }
?> 





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
            <a>ADD MY Entries</a>
          </li>
        </ol>
    <form method="POST" action="addmyentries.php">
        
        <input name="sname" value="<?php echo $sname;?>" hidden>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control"  placeholder="Name" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">College</label>
            <div class="col-sm-10">
              <input type="text" name="college" class="form-control"  placeholder="College" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control"  placeholder="Email" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="tel" pattern="[789][0-9]{9}" name="phone" class="form-control"  placeholder="Phone Number" required>
            </div>
        </div>
        
        
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Select event</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" onchange="uniqueUser()" name="type" required>
                   <option value="">Choose...</option>
                <?php
                        $pq="SELECT * FROM events";  
                        $ep = mysqli_query($sql, $pq);  
                        $no = mysqli_num_rows($ep);
                        while($row = mysqli_fetch_array($ep))
                        {
                                echo '<option value="'.$row['slug'].'">'.$row['name'].' Event</option>';
                        }
                ?>

       </select>
            </div>
        </div>
        
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
    <div class="card" style="margin-bottom:15px;margin-top:10px;">
        <div class="card-body">
            <h3>Notes</h3>
            <hr>
            <li>In the case of wrong data-entry, contact website developers/maintainers</li>
        </div>
    </div>
        
        
    
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