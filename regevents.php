<?php
    include("db/conn.php");
    
          
                
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
            include('header.php');
        ?>
        <title>Registeration</title>
    </head>
<style>
    .note
{
    text-align: center;
    height:6vw ;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.card{
    background-image: linear-gradient(230deg,#ffffff,#d9edff,#abd8ff,#87c7ff);

}

</style>

<body>


</style>
<div class="container register-form" style="margin-top:50px;">
            <div class="form">
                <div class="note">
                    <h1 style="font-size:4vw;">Your Registered Events</h1>
                </div>
                <form action="regevents.php" method="POST">
                    <div class="form-content">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enter your registered Email-Id </label>
                                        <input type="email" name="email" class="form-control" placeholder="Email *"  required/>
                                    </div>
                            </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div class="row justify-content-center" style="margin-top:20px;">
                    <a href="events.php" class="btn btn-primary">Go Back to Events</a>
                </div>
                
            <?php
                    if(isset($_POST['submit']))
                    {
                        $email=$_POST['email'];
            
                        if($email!="")
                        {
                            $qry_e="SELECT * FROM register WHERE email='$email';";
                            $qryy=mysqli_query($sql,$qry_e);
                            $exe=mysqli_num_rows($qryy);
                            if($exe > 0)
                            {
            ?>
                
                
                
                        
                <div class="row justify-content-center" style="margin-top:20px;">
                   <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>College</th>
                          <th>Event</th>
                          <th>Transaction Id</th>
                          <th>Date / Time of Registration</th>
                          <th>Payment Verification</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                        <?php
                                while($row=mysqli_fetch_array($qryy))
                                {
                        ?>
                        <tr>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['college']; ?></td>
                          <td><?php echo $row['event']; ?></td>
                          <td><?php 
                                if($row['vname']!="")
                                {
                                    echo "Cash Payment";
                                }
                                else
                                {
                                    echo $row['tid'];
                                }
                          
                          
                          ?></td>
                          <td><?php echo $row['dor']; ?></td>
                          <td><?php 
                                    if($row['verified']==1)
                                    {
                                      echo "Verified";  
                                    }
                                    else
                                    {
                                        echo "Not yet verified";
                                    }
                                    
                                ?>
                          </td>
                        </tr>
                        <?php
                                }
                        ?>
                      </tbody>
                    </table>
                    </div>
                        <?php
                            }
                        else
                        {
                            echo'<script>alert("Your email is not registered")</script>';
                        }
                    }
                }
                        ?>
                    
                       </div>  
                    
                    
                    
                    
                    
                    
                </div>
                    
                    
                </div>
                
            </div>
        </div>
 </div>       
        <?php
            include("footer.php")
        ?>
</body>
</html>