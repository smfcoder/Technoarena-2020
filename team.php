<html>
    <head>
        <title>
            Our Team
        </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php include('header.php'); ?>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
<style>
    hr{
        background-color:#b8b8b8;
    }
</style>
<body>

<div class="container py-6">
    <div class="row text-center">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4" style="margin-top:20px;font-weight:bold;">Teams</h1>
        </div>
    </div>
</div><!-- End -->

<div class="container">
    <div class="row text-center">

<?php

        include('db/conn.php');
        $tem="SELECT * FROM committee ORDER BY pos;";
        $etem=mysqli_query($sql,$tem);
        $no=mysqli_num_rows($etem);
        if($no > 0 )
        {
            while($comm=mysqli_fetch_array($etem))
            {
                $pslug=$comm['slug'];
?>  


<div class="container py-5">
    <div class="row text-center">
        <div class="col-lg-8 mx-auto">
            <hr>
            <h3 class="display-5"><?php echo $comm['name'] ;?></h3>
            <hr>
        </div>
    </div>
</div><!-- End -->
                <?php
                        $steam="SELECT * FROM team where pslug='$pslug' order by pos;";
                        $esteam=mysqli_query($sql,$steam);
                        $not=mysqli_num_rows($esteam);
                        if($not > 0 )
                        {
                            while($team=mysqli_fetch_array($esteam))
                            {
?>  


        <!-- Team item -->
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-lg p-3 mb-5 py-6 px-4"><img src="<?php echo $team['url'];?>" alt="" style="width:150px;height:150px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0"><?php echo $team['name'];if($team['clas']!=""){ ?><br><?php echo $team['clas'];}?></h5><span class="small text-uppercase text-muted"><?php echo $team['desig'];?></span>
            </div>
        </div><!-- End -->


<?php

                            }
                        }
            }
        }
?>
        
        

       
        
        
        
    </div>
</div>
<?php include('footer.php'); ?>

</body>
</html>
