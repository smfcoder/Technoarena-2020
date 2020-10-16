<!DOCTYPE html>
<html lang="en">
<?php
    include('header.php');
?>
<head>
  <title>Events</title>
  
</head>
<body>

<section id="team" class="section-padding" >
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h1 class="wow fadeInUp" data-wow-delay="0.2s" style="color:#00afff;font-size:46px;font-weight:bold;"><u>Events</u></h1>
        </div>
  <style>
    .card1{
        border-color:#f0f0f0;
        border-radius:10px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.2s;
    }

    .card1:hover {
        animation-duration: 5s;
        border-color:#e8e8e8;
        box-shadow: 0 18px 26px 0 rgba(0,0,0,0.2);
    }
    .btn1{
        background-image: linear-gradient(130deg,#edc2ff,#9424e3);
        border-color:black;
        /*border-width:0.8px;*/
    }
    .btn1:hover{
        /*background-image: linear-gradient(230deg,#ffffff,#c978ff);*/
        /*border-width:0.1px;*/
        background-image:none;
        background-color:#8b00c7;
        border-color:#c978ff;
        box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2);
    }

    

  </style>
        
        <?php

            include('db/conn.php');
            $dept="SELECT * FROM parent ORDER BY pos;";
            $edept=mysqli_query($sql,$dept);
            $no=mysqli_num_rows($edept);
            if($no > 0 )
            {
                while($rdept=mysqli_fetch_array($edept))
                {
        ?>  
        
        <div class="row justify-content-md-center" style="padding-top:50px;">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h2 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $rdept['name'];?></h2><hr>
            </div>
          </div>
        </div>
        
                <?php
                $pslug=$rdept['slug'];
                $e="SELECT * FROM events where pslug='$pslug';";
                $ee=mysqli_query($sql,$e);
                $noe=mysqli_num_rows($ee);
                if($noe > 0 )
                {
                    
                ?>
                
                <div class="row justify-content-md-center">
                <?php    
                    while($event=mysqli_fetch_array($ee))
                    {
                        $sl=$event['slug'];
                ?>    
        
           
          <div class="col-lg-4" style="padding-bottom:20px;">
                <div class="card card1">
                    <div class="card-header" style="margin:0px;padding:0px;">
                        <img class="img fluid" src="<?php echo $event['url'];?>" alt="Card image" style="width:100%;height:250px;border-radius:10px 10px 0px 0px;">
                    </div>
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $event['name'];?></h4>
                      <a href="#" class="btn btn-primary btn1" data-toggle="modal" data-target="#<?php echo $event['slug'];?>">See more >></a>
                    </div>
                  </div>
            </div>
            <!-- The Modal -->
            <div class="modal fade" id="<?php echo $event['slug'];?>">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo $event['name'];?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body"style="overflow-y:scroll;max-height:600px;">
                      <?php echo $event['content'];?>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <a href="register.php?slug=<?php echo $sl;?>" class="btn btn-primary">Register</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
                </div>
            </div>
  
          
        
        
        
        
        <?php
                    }
        ?>
        </div>
        <?php
                }
            }
        }
        ?>
        
     
</div>
</section>
<?php
    include('footer.php');
?>
  </body>
</html>
