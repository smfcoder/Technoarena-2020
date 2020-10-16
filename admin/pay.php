<?php
session_start();
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:/admin/login.php');
    exit();
   
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

  

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            My Entries</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    
                    <th width="11%">Name</th>
                    <th width="11%">College</th>
                    <th width="11%">Email</th>
                    <th width="11%">Phone No.</th>
                    <th width="11%">Event</th>
                    <th width="11%">Department</th>
                    <th width="11%">Transaction Id</th>
                    <th width="11%">Payment Verification</th>
                    <th width="11%">Yes</th>
                    <th width="11%">No</th>
                  </tr>
                </thead>
                
                   <?php
                            include('../db/conn.php');
                           
                            $query="SELECT * From register;";
                            $er=mysqli_query($sql,$query);
                            
                                while($row=mysqli_fetch_array($er))
                                {
                                    
                                    if(($row["tid"]!="") && ($row["vname"]=="online"))
                                    {
                    ?>
                                    <tr>  
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["college"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone"]; ?></td>
                                        <td><?php echo $row["event"]; ?></td>
                                        <td><?php echo $row["dept"]; ?></td>
                                        <td><?php echo $row["tid"]; ?></td>
                                        <td><?php if($row["verified"]==1){echo "Verified";}else{echo "Not verified";}; ?></td>
                                        
                                        <td><a class="btn btn-success" Onclick="return ConfirmYes()" href="yes.php?id=<?php echo $row['id'];?>">Yes</a></td>  
                                        <script>
                                            function ConfirmYes() 
                                            {
                                              return confirm("Are you sure you want to verified Payment?");
                                            }
                                        </script>
                                        
                                        
                                        <td><a class="btn btn-danger" Onclick="return ConfirmNo()" href="no.php?id=<?php echo $row['id'];?>">No</a></td>  
                                        <script>
                                            function ConfirmNo() 
                                            {
                                              return confirm("Are you sure you want to Un-verify Payment?");
                                            }
                                        </script>
                                        <?php
                                            }
                                }
                                        ?>
                                   
                                    </tr>      
                                        
                <tfoot>
                  <tr>
                    <th width="11%">Name</th>
                    <th width="11%">College</th>
                    <th width="11%">Email</th>
                    <th width="11%">Phone No.</th>
                    <th width="11%">Event</th>
                    <th width="11%">Department</th>
                    <th width="11%">Tramsaction Id</th>
                    <th width="11%">Payment Verification</th>
                    <th width="11%">Yes</th>
                    <th width="11%">No</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                       
                </tbody>
              </table>
            </div>
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