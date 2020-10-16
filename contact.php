<!DOCTYPE html>

<html>
<head>
    <?php
        include('header.php');
    ?>
    <title>
        Contact Us
    </title>
</head>
<body>

<div class="container" style="margin-top:20px;margin-bottom:80px;">

          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Contact Us</h1>
            </div>
          </div>

<div class="table-responsive">
<table class="table table-hover">
<style>
    thead,tbody,th,tr,td{
        border:1px solid black;
        text-align:center;
    }
</style>	
	<thead>
		<tr style="background-color:#00afff">
			<th>Name</th>
			<th>Contact No.</th>
		</tr>
	</thead> 
	<tbody>
	    <?php
	            include('db/conn.php');
                $sc="SELECT * FROM contact order by pos;";
                $ee=mysqli_query($sql,$sc);
                while($row=mysqli_fetch_array($ee))
                {
        ?>
		<tr>
			<td> <?php echo $row['name'];?> </td>
			<td><?php echo $row['phone'];?></td>
		
		</tr>
	        <?php
                }
	        ?>

	</tbody>
</table>
</div>
<hr>
<div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Developers</h1>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="about-item">
              <img class="img-fluid" src="assets/img/about/bhavesh.jpg" alt="">
              <div class="about-text">
                <h4><a href="https://github.com/Bhavesh2000">Bhavesh Wani( TY COMP )</a></h4>
                <p>Co-ordinator</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="about-item">
              <img class="img-fluid" src="assets/img/about/shreyas.jpg" alt="">
              <div class="about-text">
                <h4><a href="https://github.com/smfcoder">Shreyas Fegade( TY COMP )</a></h4>
                <p>Co-coordinator</p>
              </div>
            </div>
          </div>
        </div>
</div>
<?php
    include('footer.php');
?>
</body>
</html>