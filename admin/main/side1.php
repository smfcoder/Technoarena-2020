 <!-- Sidebar -->
        <?php 
                $side="SELECT * FROM admin where username='$sname';";
                $eside=mysqli_query($sql,$side);
                $fetch=mysqli_fetch_array($eside);
        ?>

    <ul class="sidebar navbar-nav" style="background-color:white;">
      <li class="nav-item active">
        <a class="nav-link" href="index2.php" style="color:black;">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span >Dashboard</span>
        </a>
      </li>
      

         <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>User</span>
      </li>
        
        
        
        <li class="nav-item">
            <a class="nav-link" href="cp.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Change Password</span></a>
        </li>      
      
      <?php
      
            if($fetch['event']=='publicity-admin')
            {
                
        ?>
      
        <li class="nav-item">
            <a class="nav-link" href="addvol.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Add Volunteer</span></a>
        </li>
          
        <li class="nav-item">
            <a class="nav-link" href="allv.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>All Volunteers</span></a>
        </li>
        
        
        <?php
            }
            else{
        ?>    
        
        <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Add Entries</span>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="addmyentries.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Add My entries</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewmyentries.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>View My entries</span></a>
        </li>
        <?php
            }
        ?>
        
        <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Logout</span>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="logout.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Logout</span></a>
        </li>
        
        
    </ul>