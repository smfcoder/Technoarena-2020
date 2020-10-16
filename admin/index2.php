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

 <?php
        include('main/head.php');
  ?>


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
            <a>Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <center>
            <h1>Welcome to Publicity Admin Panel</h1>
            <hr>
            <h1>Developers</h1>
        </center>
        <div class="container">
            <div class="row justify-content-center">
                <a href="https://www.linkedin.com/in/bhavesh-wani-507107168/" >
                <div class="card" style="margin-right:10px;">
                    <div class="card-header">
                        <img class="img-fluid" src="../assets/img/about/bhavesh.jpg">
                    </div>
                    <div class="card-body">
                        <h3>Bhavesh Wani(TY COMP)</h3>
                        <h4>CO-Ordinator</h4>
                    </div>
                </div>
                </a>
                <a href="https://www.linkedin.com/in/shreyas-fegade-b751ab138/">
                <div class="card" style="margin-right:10px;">
                    <div class="card-header">
                        <img class="img-fluid" src="../assets/img/about/shreyas.jpg">
                    </div>
                    <div class="card-body">
                        <h3>Shreyas Fegade(TY COMP)</h3>
                        <h4>CO-CO-Ordinator</h4>
                    </div>
                </div>
                </a>
                
            </div>
        </div>        

      </div>
      <!-- /.container-fluid -->

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