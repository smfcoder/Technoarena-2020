<?php
    include("db/conn.php");
    $slug=$_GET['slug'];
    $status=$_GET['status'];
    $fetch="SELECT * FROM events where slug='$slug'";
    $e=mysqli_query($sql,$fetch);
    $res=mysqli_fetch_array($e);
    $name=$res['name'];
?>
<?php
    header("Refresh:5; url=events.php");
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
.card{
    background-image: linear-gradient(230deg,#ffffff,#d9edff,#abd8ff,#87c7ff);

}

</style>

<body>


</style>
<div class="container register-form" style="margin-top:50px;">
            <div class="form">
                <div class="note">
                    <?php
                        if($status=='s')
                        {
                            echo'
                                <h1 style="font-size:48px;">Successful</h1>';
                        }
                        else if($status=='t')
                        {
                            echo'
                                <h1 style="font-size:48px;">Transaction Id</h1>';
                        }
                        else if($status=='a')
                        {
                            echo'
                                <h1 style="font-size:48px;">Already</h1>';
                        }
                        else
                        {
                            echo'
                                <h1 style="font-size:48px;">Failed</h1>';
                        }
                    ?>
                </div>
                
                <div class="form-content">
                <div class="row justify-content-center">
                    <?php
                        if($status=='s')
                        {
                            echo'
                                <h2>You have successfully Registered for   '; echo $slug; echo '    Event</h2>';
                        }
                        else if($status=='t')
                        {
                            echo'
                                <h2>Transaction Id Already Existed </h2>';
                        }
                        else if($status=='a')
                        {
                            echo'<h2>You have already Registered for   '; echo $slug; echo '    Event</h2>';
                        }
                        else
                        {
                            echo'
                                <h2>Sorry :( Registration for   '; echo $slug; echo'   Event have been failed</h2>';
                        }
                    ?>
                    
                    
                    
                </div>
                <div class="row justify-content-center" style="margin-top:20px;">
                    <a href="events.php" class="btn btn-primary">Go Back to Events</a>
                </div>
                    
                    
                </div>
                
            </div>
        </div>
        
        <?php
            include("footer.php")
        ?>
</body>
</html>