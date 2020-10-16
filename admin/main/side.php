 <!-- Sidebar -->
        <?php 
                $side="SELECT * FROM admin where username='$sname';";
                $eside=mysqli_query($sql,$side);
                $fetch=mysqli_fetch_array($eside);
        ?>

    <ul class="sidebar navbar-nav" style="background-color:white;">
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color:black;">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span >Dashboard</span>
        </a>
      </li>
      
      
    <?php
     
        if($fetch['event']=="admin")
        {
    ?>
      
      <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Home Page</span>
      </li>
      
      
     
      <li class="nav-item">
        <a class="nav-link" href="youtube.php" style="color:black;">
        <i class="fas fa-retweet"></i>
          <span>Youtube Links</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="paytm.php" style="color:black;">
        <i class="fas fa-retweet"></i>
          <span>Payment no Add</span></a>
      </li>
      
      
      
      <li class="nav-item">
        <a class="nav-link" href="slider.php" style="color:black;">
        <i class="fas fa-retweet"></i>
          <span>SPONSERS</span></a>
      </li>
      
        
        
   
    
      
      
      <li class="nav-item">
        <a class="nav-link" href="commitee.php" style="color:black;">
        <i class="fas fa-user-friends"></i>
          <span>Add Committee</span></a>
      </li>
      
      
      
      
        <li class="nav-item">
        <a class="nav-link" href="team.php" style="color:black;">
          <i class="fas fa-vector-square"></i>
          <span>Add team</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="selectcommity.php" style="color:black;">
          <i class="fas fa-vector-square"></i>
          <span>Position team member</span></a>
      </li>
      
      
        <li class="nav-item">
        <a class="nav-link" href="quicklinks.php" style="color:black;">
          <i class="fas fa-link"></i>
          <span>Quicklinks</span></a>
      </li>
      
     
      
      <li class="nav-item">
        <a class="nav-link" href="contactus.php" style="color:black;">
          <i class="fab fa-envira"></i>
          <span>Contact Us</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="allentries.php" style="color:black;">
          <i class="fab fa-envira"></i>
          <span>All Entries </span></a>
      </li>
        
        <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Events</span>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/marque.php" style="color:black;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Add Deparment</span></a>
      </li>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/people.php" style="color:black;">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Add Event</span></a>
      </li>
        </li>
      
      
      
      
       <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Add content</span>
      </li>
      
      
      
      
        <li class="nav-item">
            <a class="nav-link" href="selectortext.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Add Text</span></a>
        </li>
          
        <li class="nav-item">
            <a class="nav-link" href="selectedittext.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Edit Text</span></a>
        </li>      
      
        
           
      <?php
        }
      ?>
      
    
      
        
         <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>User</span>
      </li>
        
        
        
        <li class="nav-item">
            <a class="nav-link" href="changepass.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Change Password</span></a>
        </li>      
      
      <?php
     
        if($fetch['event']=="admin")
        {
    ?>
        <li class="nav-item">
            <a class="nav-link" href="adduser.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Add User</span></a>
        </li>
          
        <li class="nav-item">
            <a class="nav-link" href="allusers.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>All Users</span></a>
        </li>      
      
        <?php
     
        }
    ?>  
       
         <li class="nav-item" style="background-color:#27a6d9;padding-top:7px;padding-bottom:7px;padding-left:20px;">
          <span>Registrations</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="committees.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Student Enteries</span></a>
        </li>
        
        <?php
            if($fetch['event']=="admin" || $fetch['event']=="all")
            {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="rallv.php" style="color:black;">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>All Publicity Volunteers</span></a>
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