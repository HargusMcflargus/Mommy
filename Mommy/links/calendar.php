<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">StudION</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="calendar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                                Calendar
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['username'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Calendar</h1>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Monday </th>
                                    <th> Tuesday </th>
                                    <th> Wednesday </th>
                                    <th> Thursday </th>
                                    <th> Friday </th>
                                    <th> Saturday </th>
                                    <th> Sunday </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once 'database.php';

                                    echo "<TR>";
                                    $date=date_create();
                                    $now = date_create();
                                    date_date_set($now, date_format($date,"Y"), date_format($date,"m"), 01);
                                    $i = 0;
                                    for(; $i < 7; $i++){
                                        
                                        if( date_format($now, 'l') == "Monday"){
                                            break;
                                        }
                                        date_sub($now, date_interval_create_from_date_string("1 days"));
                                    }
                                    $now = date_create();
                                    date_date_set($now, date_format($date,"Y"), date_format($date,"m"), 01);
                                    $temp = date_format($now, "m");
                                    for(; $i > 0; $i--){
                                        echo "<TD class='info' style='visibility: hidden;'></TD>";
                                    }
                                    $kalang = 0;
                                    while (date_format($now, "m") == $temp){

                                        $day = date_format($now, "l");

                                        if (!($kalang == 0) && $day == "Monday"){
                                            echo "<TR>";
                                        }

                                        if ($description = contains(date_format($now, "Y-m-d"))){
                                            echo "<TD class='table-danger' style='text-align:center; padding: 2em 0;'>" . date_format($now, "d") . "<br> " . $description . "</TD>";
                                        }
                                        else{
                                            echo "<TD style='text-align:center; padding: 2em 0;'>" . date_format($now, "d"). "</TD>";
                                        }



                                        date_add($now, date_interval_create_from_date_string("1 days"));
                                        if ($day == "Sunday"){
                                            echo "</TR>";
                                        }
                                    }
                                    echo "</TR>";

                                    function contains($needle){
                                        $connection = new DataConnector();
                                        $dbStuff = $connection->select("calendar_entry", "entryOwner='". $_SESSION['username'] ."'");
                                        while ($row = $dbStuff->fetch_assoc()){
                                            if ($needle == $row['setDate']){
                                                return $row['setDesc'];
                                            }
                                        }
                                        return false;
                                    }
                                ?>

                                <!-- Go Back from date 1 to count number of backlag -->
                                <!-- use visibility hidden to show -->
                                <!-- use active class to show current date -->
                                <!-- use danger to signify taken dates -->
                                                
                            </tbody>
                        </table>
                        <br><br>
                        <form id="calendar_form" class="container" style="float: center;" action="calendar_input.php" method="POST">
                            <div class="row">
                                <h2 class="col-5">Create Event</h2>
                            </div>

                            <br><br>

                            <div class="row">
                                <label class="col-2 justify-content" for="calendar_input_date">Date: </label>
                                <input class="col-3" name="calendar_input_date" type="date" required></input>
                            </div>

                            <br>

                            <div class="row">
                                <label class="col-2" for="calendar_input_desc">Description: </label>
                                <input class="col-3" name="calendar_input_desc" type="text" min=10 required></input>
                            </div>
                            
                            <br>
                        </form>
                        <div class="container" style="width: 30%; margin-left: 8%;">
                            <div class="row justify-content-center">
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <button onclick="verify()" class="btn btn-dark px-5">Save</button>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        </body>
</html>

<script>
    function verify(){
        if (confirm("Are you sure you want to save these details?")){
            document.getElementById("calendar_form").submit();
        }
    }
</script>