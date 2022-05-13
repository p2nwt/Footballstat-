<?php
  session_start();
  require_once "config/db.php";

  include_once 'database.php';

  if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'Please login!';
    header('location: pages-login.php');
}

if (isset($_SESSION['admin_login'])) {
    $admin_id = $_SESSION['admin_login'];
    $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
    $select1 = "SELECT * FROM schedule";
    $result1 = mysqli_query ($connection, $select1);
    $select2 = "SELECT * FROM football_clubs";
    $result2 = mysqli_query ($connection, $select2);
    $select3 = "SELECT * FROM lineup";
    $result3 = mysqli_query ($connection, $select3);

    $message   =  "";
    if(isset($_POST['save']))
    {
        $Schedule = $_POST['Schedule'];
        $Team = $_POST['Team'];
        $Lineup = $_POST['Lineup'];
        $Player=$_POST['Player'];

        foreach($Player as $rowplayer)
        {
          $query = "INSERT INTO fixture_player (Schedule_ID,Team_ID,Lineup_ID,Player_ID) value ('$Schedule','$Team','$Lineup','$rowplayer')";
          $query_run = mysqli_query($connection,$query);
        }
        if ($query_run) {
          echo "<script>alert('Data has been updated successfully');</script>";
          echo "<script>window.location.href = 'insert.php';</script>";
          }else{
          echo "<script>alert('Data has not been updated successfully');</script>";
          echo "<script>window.location.href = 'insert.php';</script>";
          }

        
        // Close connection
        mysqli_close($connection);
    } 
    if (isset($_GET['delete'])) {
      $delete_id = $_GET['delete'];
      $deletestmt = $conn->query("DELETE FROM fixture_player WHERE id = $delete_id");
      $deletestmt->execute();

      if ($deletestmt) {
          echo "<script>alert('Data has been deleted successfully');</script>";
          $_SESSION['success'] = "Data has been deleted succesfully";
          header("refresh:1; url=insert.php");
      }
      
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Football Stat | Insert Lineup</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon1.png" rel="icon">
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">



  

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
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
              <span>Admin</span>
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
    <a class="nav-link collapsed" href="home.php">
      <i class="bi bi-house-door"></i>
      <span>Home</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="fixtures.php">
      <i class="bi bi-calendar-day"></i>
      <span>Fixtures</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="match.php">
      <i class="bi bi-trophy"></i>
      <span>Results</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="standing.php">
      <i class="bi bi-list-ol"></i>
      <span>Standings</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="team.php">
      <i class="bi bi-people"></i>
      <span>Clubs</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="player.php">
      <i class="bi bi-person-circle"></i>
      <span>Players</span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="static.php">
      <i class="bi bi-bar-chart"></i>
      <span>Statistics</span>
    </a>
  </li><!-- End Blank Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-plus-fill"></i><span>Insert</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="insert.php">
          <i class="bi bi-circle"></i><span>Insert Lineup</span>
        </a>
      </li>
      <li>
        <a href="insert_event.php">
          <i class="bi bi-circle"></i><span>Insert Event</span>
        </a>
      </li>
      <li>
        <a href="insert_sub.php">
          <i class="bi bi-circle"></i><span>Insert Substitution</span>
        </a>
      </li>
    </ul>
  </li>

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Insert Lineup</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active"><a href="insert.php">Insert Lineup</a></li>
  
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Insert Lineup</h5>
              
              <!-- Table with stripped rows -->
              <div class="container"> 

                  <form method="post" action="insert.php">
                        <div class="col-md-6">
                          <label for="">Fixture</label>
                            <select  name="Schedule" class="form-control selectpicker" data-live-search="true">
                              <option>Select Fixture</option>
                              <?php foreach($result1 as $key => $value){ ?>
                                <option value="<?= $value['ID'];?>"><?= $value['Descrip']; ?></option> 
                              <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label for="">Team</label>
                            <select name="Team" class="form-control selectpicker" data-live-search="true">
                              <option>Select Team</option>
                                <?php foreach($result2 as $key => $value){ ?>
                                  <option value="<?= $value['ID'];?>"><?= $value['Name']; ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label for="">Role</label>
                            <select name="Lineup" class="form-control">
                              <option>Select Role</option>
                                <?php foreach($result3 as $key => $value){ ?>
                                  <option value="<?= $value['ID'];?>"><?= $value['Lineup']; ?></option> 
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label for="">Player</label>
                            <select name="Player[]"class="form-control multiple-select"multiple >
                              <option value=""></option>
                              <?php
                                $con = mysqli_connect("localhost","root","","footballstat");
                                $query = "SELECT * FROM player";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run)>0)
                                {
                                  foreach($query_run as $rowplayer)
                                  {
                                    
                                    ?>
                                    <option value="<?php echo $rowplayer['Player_ID']; ?>"><?php echo $rowplayer['Player_Name'];?></option><?php
                                    
                                  }
                                }
                                else
                                {
                                  echo "No records found";                                
                                }            
                              ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label for="">Click to save</label><br>
                            <button type="submit" name="save" class="btn btn-primary btn-block">Save</button>
                        </div>
                        
                  
                      

                  </form>

                  <hr>

                  
                  
  
    
              <!-- End Table with stripped rows -->

            </div>
          </div>



        </div>
      </div>

      <div class="card">
          <h5 class="card-title">Show Data</h5>
            <table class="table datatable">
            <thead>
                <tr>
                    
                    <th scope="col">ID</th>
                    <th scope="col">Fixture</th>
                    <th scope="col">Team</th>
                    <th scope="col">Player</th>
                    <th scope="col">Lineup</th>
                    <th scope="col">Actions</th>
                </tr>

            </thead>
            <tbody>
            <?php 
                    $stmt = $conn->query("SELECT DISTINCT
                    fixture_player.ID AS ID,
                    schedule.Descrip AS Fixtures,
                    football_clubs.name AS Team,
                    player.Player_Name AS Player,
                    lineup.Lineup AS Lineup
                    FROM
                    fixture_player
                    INNER JOIN schedule on fixture_player.Schedule_ID = schedule.ID
                    INNER JOIN football_clubs on fixture_player.Team_ID = football_clubs.ID
                    INNER JOIN player on fixture_player.Player_ID = player.Player_ID
                    INNER JOIN lineup on fixture_player.Lineup_ID = lineup.ID
                    ORDER BY
                    fixture_player.Schedule_ID ASC,
                    fixture_player.Team_ID ASC,
                    fixture_player.Lineup_ID ASC");
                    $stmt->execute();
                    $users = $stmt->fetchAll();

                    if (!$users) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($users as $user)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $user['ID']; ?></th>
                        <td><?php echo $user['Fixtures']; ?></td>
                        <td><?php echo $user['Team']; ?></td>
                        <td><?php echo $user['Player']; ?></td>
                        <td><?php echo $user['Lineup']; ?></td>
                        <td>
                          
                            <a href="edit.php?id=<?php echo $user['ID']; ?>" class="badge bg-info text-dark">Edit</a>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $user['ID']; ?>" class="badge bg-danger">Delete</a>
                        </td>
                    </tr>
                <?php }  } ?>           
            </tbody>
            </table>
            </div>
    </section>
  
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></!--script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>$(".multiple-select").select2({});</script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>