<?php
  session_start();
  require_once "config/db.php";
  include_once 'database.php'; 


  if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'Please login!';
    header('location: pages-login.php');
}

if (isset($_SESSION['user_login'])) {
  $user_id = $_SESSION['user_login'];
  $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
  
 



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Footballstat | Statics</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
   
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">FOOTBALL STAT</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['firstname']  ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h6>
              <span>User</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

          

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-house-door"></i>
      <span>Home</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="viewfixtures.php">
      <i class="bi bi-calendar-day"></i>
      <span>Fixtures</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="viewmatch.php">
      <i class="bi bi-trophy"></i>
      <span>Results</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="viewstanding.php">
      <i class="bi bi-list-ol"></i>
      <span>Standings</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="viewteam.php">
      <i class="bi bi-people"></i>
      <span>Clubs</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="viewplayer.php">
      <i class="bi bi-person-circle"></i>
      <span>Players</span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="viewstatic.php">
      <i class="bi bi-bar-chart"></i>
      <span>Statistics</span>
    </a>
  </li><!-- End Blank Page Nav -->

  

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Statics</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="viewstatic.php">Statics</a></li>
   
         

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        
      <h5 class="card-title">Player Statistics</h5>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Goals</h5>
              <table class="table ">
                          <?php $pos='1';?>
                          <thead>
                              <tr>
                              
                              </tr>

                          </thead>
                          <tbody>
                          <?php 
                                  $stmt = $conn->query("SELECT
                                  player.Player_ID AS ID,
                                  football_clubs.ID AS TeamID,
                                  player.Playerpng AS Pic,
                                  football_clubs.pnglogo AS Logo,
                                      player.Player_Name AS Player,
                                      football_clubs.Name AS Team,
                                      COUNT(*) as Goal
                                  FROM
                                      fixture_event
                                     inner join player on fixture_event.Player_ID = player.Player_ID
                                      inner join football_clubs on fixture_event.Team_ID = football_clubs.ID
                                  WHERE fixture_event.Event_ID =1 OR fixture_event.Event_ID =8
                                  GROUP BY 
                                      player.Player_Name
                                  ORDER BY Goal DESC 
                                  LIMIT 5
                                ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                    
                                  foreach($users as $user)  {  
                              ?>
                                

                                  <tr>
                                      <td><?php echo $pos ?></td>
                                      <td> <img width="80" src="assets/img/<?php echo $user['Pic'];?>"><?php echo "<a href='viewplayer_info.php?id={$user['ID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>
                                      <td> <?php echo "<a href='viewteam_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>
                                      <td><?php echo $user['Goal']; ?></td>
                                  
                                      <?php $pos++;?>          
                                  </tr>
                                      
                                  
                              <?php } 
                            
                            } ?>           
                          </tbody>
                          </table>  
            </div>
          </div>

        </div>

        <div class="col-lg-4">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Yellow Cards</h5>
              <table class="table ">
                          <?php $pos='1';?>
                          <thead>
                              <tr>
                              
                              </tr>

                          </thead>
                          <tbody>
                          <?php 
                                  $stmt = $conn->query("SELECT
                                  player.Player_ID AS ID,
                                  football_clubs.ID AS TeamID,
                                  player.Playerpng AS Pic,
                                  football_clubs.pnglogo AS Logo,
                                      player.Player_Name AS Player,
                                      football_clubs.Name AS Team,
                                      COUNT(*) as Goal
                                  FROM
                                      fixture_event
                                     inner join player on fixture_event.Player_ID = player.Player_ID
                                      inner join football_clubs on fixture_event.Team_ID = football_clubs.ID
                                  WHERE fixture_event.Event_ID =3 OR fixture_event.Event_ID =7
                                  GROUP BY 
                                      player.Player_Name
                                  ORDER BY Goal DESC 
                                  LIMIT 5
                                  
                                ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                    
                                  foreach($users as $user)  {  
                              ?>
                                

                                  <tr>
                                      <td><?php echo $pos ?></td>
                                      <td> <img width="80" src="assets/img/<?php echo $user['Pic'];?>"> <?php echo "<a href='viewplayer_info.php?id={$user['ID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>
                                      <td> <?php echo "<a href='viewteam_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>
                                      <td><?php echo $user['Goal']; ?></td>
                                  
                                      <?php $pos++;?>          
                                  </tr>
                                      
                                  
                              <?php } 
                            
                            } ?>           
                          </tbody>
                          </table>  
            </div>
          </div>

        </div>

        <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Red Cards</h5>
            <table class="table ">
                          <?php $pos='1';?>
                          <thead>
                              <tr>
                              
                              </tr>

                          </thead>
                          <tbody>
                          <?php 
                                  $stmt = $conn->query("SELECT
                                  player.Player_ID AS ID,
                                  football_clubs.ID AS TeamID,
                                  player.Playerpng AS Pic,
                                  football_clubs.pnglogo AS Logo,
                                      player.Player_Name AS Player,
                                      football_clubs.Name AS Team,
                                      COUNT(*) as Goal
                                  FROM
                                      fixture_event
                                     inner join player on fixture_event.Player_ID = player.Player_ID
                                      inner join football_clubs on fixture_event.Team_ID = football_clubs.ID
                                  WHERE fixture_event.Event_ID =4 OR fixture_event.Event_ID =7
                                  GROUP BY 
                                      player.Player_Name
                                  ORDER BY Goal DESC 
                                  LIMIT 5
                                  
                                ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                    
                                  foreach($users as $user)  {  
                              ?>
                                

                                  <tr>
                                      <td><?php echo $pos ?></td>
                                      <td> <img width="80" src="assets/img/<?php echo $user['Pic'];?>"> <?php echo "<a href='viewplayer_info.php?id={$user['ID']}'style='text-decoration:none'>" . $user["Player"] . "</a>" ;?></td>
                                      <td> <?php echo "<a href='viewteam_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>
                                      <td><?php echo $user['Goal']; ?></td>
                                  
                                      <?php $pos++;?>          
                                  </tr>
                                      
                                  
                              <?php } 
                            
                            } ?>           
                          </tbody>
                          </table>  
          </div>
          </div>

        </div>
        <h5 class="card-title">Team Statistics</h5>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Wins</h5>
              <table class="table ">
                          <?php $pos='1';?>
                          <thead>
                              <tr>
                              
                              </tr>

                          </thead>
                          <tbody>
                          <?php 
                                  $stmt = $conn->query("SELECT 
                                  football_clubs.ID AS TeamID,
                                   football_clubs.pnglogo AS Logo,                                     
                                  football_clubs.Name AS Team,
                                  fulltable.Win AS Win
                                  FROM
                                  fulltable
                                  INNER JOIN football_clubs on football_clubs.ID = fulltable.TeamID
                                  ORDER BY fulltable.Win DESC 
                                  LIMIT 5
                                ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                    
                                  foreach($users as $user)  {  
                              ?>
                                

                                  <tr>
                                      <td><?php echo $pos ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['Logo'];?>"> <?php echo "<a href='viewteam_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>   
                                      <td><?php echo $user['Win']; ?></td>
                                  
                                      <?php $pos++;?>          
                                  </tr>
                                      
                                  
                              <?php } 
                            
                            } ?>           
                          </tbody>
                          </table>  
            </div>
          </div>

        </div>

        <div class="col-lg-4">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Goals</h5>
              <table class="table ">
                          <?php $pos='1';?>
                          <thead>
                              <tr>
                              
                              </tr>

                          </thead>
                          <tbody>
                          <?php 
                                  $stmt = $conn->query("SELECT 
                                  football_clubs.ID AS TeamID,
                                   football_clubs.pnglogo AS Logo,                                     
                                  football_clubs.Name AS Team,
                                  fulltable.GF AS GF
                                  FROM
                                  fulltable
                                  INNER JOIN football_clubs on football_clubs.ID = fulltable.TeamID
                                  ORDER BY fulltable.GF DESC 
                                  LIMIT 5
                                  
                                ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                    
                                  foreach($users as $user)  {  
                              ?>
                                

                                  <tr>
                                  <td><?php echo $pos ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['Logo'];?>"> <?php echo "<a href='viewteam_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>   
                                      <td><?php echo $user['GF']; ?></td>
                                  
                                      <?php $pos++;?>          
                                  </tr>
                                      
                                  
                              <?php } 
                            
                            } ?>           
                          </tbody>
                          </table>  
            </div>
          </div>

        </div>

        <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Losses</h5>
            <table class="table ">
                          <?php $pos='1';?>
                          <thead>
                              <tr>
                              
                              </tr>

                          </thead>
                          <tbody>
                          <?php 
                                  $stmt = $conn->query("SELECT 
                                  football_clubs.ID AS TeamID,
                                   football_clubs.pnglogo AS Logo,                                     
                                  football_clubs.Name AS Team,
                                  fulltable.Lose AS Lose
                                  FROM
                                  fulltable
                                  INNER JOIN football_clubs on football_clubs.ID = fulltable.TeamID
                                  ORDER BY fulltable.Lose DESC 
                                  LIMIT 5
                                  
                                ");
                                  $stmt->execute();
                                  $users = $stmt->fetchAll();

                                  if (!$users) {
                                      echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                                  } else {
                                    
                                  foreach($users as $user)  {  
                              ?>
                                

                                  <tr>
                                  <td><?php echo $pos ?></td>
                                      <td> <img width="60" src="assets/img/<?php echo $user['Logo'];?>"> <?php echo "<a href='viewteam_info.php?id={$user['TeamID']}'style='text-decoration:none'>" . $user["Team"] . "</a>" ;?></td>   
                                      <td><?php echo $user['Lose']; ?></td>
                                  
                                      <?php $pos++;?>          
                                  </tr>
                                      
                                  
                              <?php } 
                            
                            } ?>           
                          </tbody>
                          </table>  
          </div>
          </div>

        </div>
      </div>
    </section>
  

     

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script> 
    

    

</body>

</html>