<?php
session_start();
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:/admin/login.php');
    exit();
   
}
include('../db/conn.php');
$sel="SELECT * FROM admin where username='$sname';";
$e_sel=mysqli_query($sql,$sel);
$res=mysqli_fetch_array($e_sel);

$event=$res['event'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css'>
<style>
:after, :before {
    box-sizing: border-box;
}

a {
    color: #337ab7;
    text-decoration: none;
}
i{
  margin-bottom:4px;
}

.btn {
    display: inline-block;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}


.btn-app {
    color: white;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    padding: 10px 15px;
    margin: 0;
    min-width: 60px;
    max-width: 80px;
    text-align: center;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    font-size: 12px;
    transition: all .2s;
    background-color: steelblue !important;
}

.btn-app > .fa, .btn-app > .glyphicon, .btn-app > .ion {
    font-size: 30px;
    display: block;
}

.btn-app:hover {
    border-color: #aaa;
    transform: scale(1.1);
}

.pdf {
  background-color: #dc2f2f !important;
}

.excel {
    background-color: #3ca23c !important;
}

.csv {
    background-color: #e86c3a !important;
}

.imprimir {
    background-color: #8766b1 !important;
}

/*
Esto es opcional pero sirve para que todos los botones de exportacion se distribuyan de manera equitativa usando flexbox

.flexcontent {
    display: flex;
    justify-content: space-around;
}
*/

.selectTable{
  height:40px;
  float:right;
}

div.dataTables_wrapper div.dataTables_filter {
    text-align: left;
    margin-top: 15px;
}

.btn-secondary {
    color: #fff;
    background-color: #4682b4;
    border-color: #4682b4;
}
.btn-secondary:hover {
    color: #fff;
    background-color: #315f86;
    border-color: #545b62;
}



.titulo-tabla{
  color:#606263;
  text-align:center;
  margin-top:15px;
  margin-bottom:15px;
  font-weight:bold;
}






.inline{
  display:inline-block;
  padding:0;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<?php
session_start();
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:/admin/login.php');
    exit();
   
}

?>


<head>

    <title>Admin Panel</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="css/sb-admin.css" rel="stylesheet">


</head>

<body id="page-top">




  <?php
        include('main/nav.php');
  ?>

  <div id="wrapper">

   <?php
        include('main/side.php');
  ?>

<body translate="no">
<div class="container">
<div class="row">
<div class="col-12">
<h3 class="titulo-tabla">Registration</h3>
<div class="table-responsive">
<table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
<thead>
            <tr>
                    
                    <th width="11%">Name</th>
                    <th width="11%">College</th>
                    <th width="11%">email</th>
                    <th>Phone</th>
                    <th>Event</th>
                    <th>Department</th>
                    <th>Transacation Id</th>
                    <th>Verified</th>
                    <th>Publicity Vname</th>
                    <th>D.O.R</th>
                    <th>Delete</th>
                  </tr>

</thead>
<tbody>
<?php
                    include('../db/conn.php');
                            
                    $query="SELECT * From register;";
                    $er=mysqli_query($sql,$query);
                             while($row=mysqli_fetch_array($er))
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
                                        <td>
                                            <?php 
                                                if($row["verified"]==1)
                                                {
                                                    echo "Yes";
                                                }
                                                else
                                                {
                                                    echo "No";
                                                }
                                            ?>
                                            
                                            </td>
                                        <td><?php echo $row["vname"]; ?></td>
                                        <td><?php echo $row["dor"]; ?></td>
                                        <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="deleteallentries.php?id=<?php echo $row['id'];?>">X</a></td>           
                                        <script>
                                       function ConfirmDelete() {
                                          return confirm("Are you sure you want to delete?");
                                        }
                                   </script>
                                    </tr>      
                                        
                    <?php        
                                   
                                    
                                }
                            
                    ?>

</tbody>
                <tfoot>
                  <tr>
                    
                    <th width="11%">Name</th>
                    <th width="11%">College</th>
                    <th width="11%">email</th>
                    <th>Phone</th>
                    <th>Event</th>
                    <th>Department</th>
                    <th>Transacation Id</th>
                    <th>Verified</th>
                    <th>Publicity Vname</th>
                    <th>D.O.R</th>
                    <th>Delete</th>
                  </tr>
</tfoot>
</table>
</div>
</div>
</div>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-db44b196776521ea816683afab021f757616c80860d31da6232dedb8d7cc4862.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js'></script>
<script id="rendered-js">
var idioma =

{
  "sProcessing": "Procesando...",
  
  "sZeroRecords": "No se encontraron resultados",
  "sEmptyTable": "Table empty",
  
  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix": "",
  "sSearch": "Search:",
  "sUrl": "",
  "sInfoThousands": ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
    "sFirst": "Primero",
    "sLast": "Ãšltimo" },

  "oAria": {
    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
    "sSortDescending": ": Activar para ordenar la columna de manera descendente" },

  "buttons": {
    "copyTitle": 'Informacion copiada',
    "copyKeys": 'Use your keyboard or menu to select the copy command',
    "copySuccess": {
      "_": '%d filas copiadas al portapapeles',
      "1": '1 fila copiada al portapapeles' },


    "pageLength": {
      "_": "Show Files"
       } } };




$(document).ready(function () {


  var table = $('#ejemplo').DataTable({

    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "language": idioma,
    "lengthMenu": [[5, 10, 20], [5, 10, 50]],
    dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',


    buttons: {
      dom: {
        container: {
          tag: 'div',
          className: 'flexcontent' },

        buttonLiner: {
          tag: null } },






      buttons: [
     {
        extend: 'excelHtml5',
        text: '<i class="fa fa-file-excel-o"></i>Excel',
        title: 'entries',
        titleAttr: 'Excel',
        className: 'btn btn-app export excel',
        exportOptions: {
          columns: [0, 1,2,3,4,5,6,7,8,9] } },



      {
        extend: 'print',
        text: '<i class="fa fa-print"></i>Print Pdf',
        title: 'Entries',
        titleAttr: 'Print Pdf',
        className: 'btn btn-app export imprimir',
        exportOptions: {
          columns: [0, 1,2,3,4,5,6,7,8,9] } },


      {
        extend: 'pageLength',
        titleAttr: 'Registros a mostrar',
        className: 'selectTable' }] } });



});
//# sourceURL=pen.js
    </script>
    
   
<!-- Sticky Footer -->
     
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

  
</body>
</body>
</html>
