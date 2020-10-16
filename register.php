<?php
    include("db/conn.php");
    $slug=$_GET['slug'];
    $fetch="SELECT * FROM events where slug='$slug'";
    $e=mysqli_query($sql,$fetch);
    $res=mysqli_fetch_array($e);
    $name=$res['name'];
    $dept=$res['pslug'];
    
    
    if(isset($_POST['submit']))
    {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $college=$_POST['college'];
            $phone=$_POST['phone'];
            $event=$_POST['event'];
            $tid=$_POST['tid'];
            $dept=$_POST['dept'];
            $suc="s";
            $fai="f";
            $already="a";
            $tr='t';
            date_default_timezone_set('Asia/Kolkata');
            $ct = date( 'd-m-Y h:i:s A', time () );
                
            $online="online";    
        if($event!="")
        {
            $select="SELECT * FROM register where email='$email' AND phone='$phone' AND event='$event';";
            $eselect=mysqli_query($sql,$select);
            $rows=mysqli_num_rows($eselect);
            
            $seml="SELECT * FROM register where email='$email' AND event='$event';";
            $eseml=mysqli_query($sql,$seml);
            $eml=mysqli_num_rows($eseml);
            
            
            
            $sp="SELECT * FROM register where phone='$phone' AND event='$event';";
            $esp=mysqli_query($sql,$sp);
            $p=mysqli_num_rows($esp);
            
            
            $t="SELECT * FROM register where tid='$tid';";
            $et=mysqli_query($sql,$t);
            $nt=mysqli_num_rows($et);
            
            
            if($rows > 0)
            {
                header('location:/success.php?slug='.$event.'&status='.$already);
            }
            else if($nt > 0)
            {
                header('location:/success.php?slug='.$event.'&status='.$tr);
            }
            else if($eml > 0)
            {
                header('location:/success.php?slug='.$event.'&status='.$already); 
            }
            else if($p > 0)
            {
                header('location:/success.php?slug='.$event.'&status='.$already);
            }
            else
            {
                $ent="INSERT INTO register (name,email,college,phone,event,tid,dept,dor,vname) VALUES ('$name','$email','$college','$phone','$event','$tid','$dept','$ct','$online');";
                $e_ent=mysqli_query($sql,$ent);
                if($e_ent)
                {
                    header('location:/success.php?slug='.$event.'&status='.$suc);
                }
                else
                {
                    header('location:/success.php?slug='.$event.'&status='.$fai);
                }      
            }
        }
        else
        {
           header('location:/success.php?slug='.$event.'&status='.$fai);
           
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php
            include('header.php');
        ?>
        <title>Registeration</title>
    </head>
<body>
    
<style>
    .note
{
    text-align: center;
    height: 80px;
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
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
.card{
    background-image: linear-gradient(230deg,#ffffff,#d9edff,#abd8ff,#87c7ff);

}

</style>
<div class="container register-form" style="margin-top:50px;">
            <div class="form">
                <div class="note">
                    <p><?php echo $name; ?></p>
                </div>
            <form method="POST" action="register.php" >    
                <div class="form-content">
                    <center><h3 style="font-weight:bold;"><u>Registration Form</u></h3></center>
                <div class="row justify-content-center">
                    <div class="card border-primary mb-3" style="max-width: 25rem;">
                        <div class="card-body">
                            
                            <?php
                                include("db/conn.php");
                                $ff="SELECT * FROM payment;";
                                $eff=mysqli_query($sql,$ff);
                                $pa=mysqli_fetch_array($eff);
                            ?>
   
                            
                            <h5 class="card-title">Phone Pe / Google Pay</h5><hr>
                            <p class="card-text"><?php echo $pa['name'];?></p>
                            <p class="card-text"><?php echo $pa['number'];?></p>
                        </div>
                    </div>
                </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Your Name *"  required/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email *"  required/>
                            </div>
                            <div class="form-group">
                                <label>Transaction Id</label>
                                <input type="text" name="tid" class="form-control" placeholder="Transaction Id *" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>College Name</label>
                                <input type="text" name="college" class="form-control" placeholder="College Name  *" required/>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" pattern="[789][0-9]{9}" name="phone" class="form-control" placeholder="Phone Number *"  required/>
                            </div>
                            <div class="form-group">
                                <label>Event</label>
                                <input type="text" name="event" class="form-control" placeholder="<?php echo $name; ?>"  value="<?php echo $slug; ?>" readonly/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="dept" class="form-control" value="<?php echo $dept; ?>" hidden/>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    <div class="col-md-12">
                        <label>Note: It is strictly advised to enter Transaction Id, if you have done payment online </label>
                    </div>
                    <button type="submit" name="submit" class="btnSubmit">Submit</button>
                </div>
                </form>
            </div>
            <div class="card" style="margin-top:15px;margin-bottom:15px;">
                <div class="card-body">
                    <center><h3 style="font-weight:bold;">How to Register ? </h3></center>
                    <hr>
                    <li>Enter all the required details and submit</li>
                    <li>Every individual must enter their own unique Email-Id.</li>
                    <li>If you have entered wrong details, contact to the respective event co-ordinator.</li>
                    <li>You can check your registration in "View my registration" link in navigation bar. </li>
                </div>
            </div>
        </div>
        
        <?php
            include("footer.php")
        ?>
</body>
</html>