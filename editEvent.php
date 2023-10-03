<?php include('partials/_dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
</head>

<body>
    <?php include('partials/_headerUpdate.php'); 
    ?>
    
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="div">
                        <select class="form-select form-select selector-month bg-dark" name="month" id="month" style="border-radius: 0px !important;" aria-label=".form-select-lg example">
                            <?php
                            // header("Content-Type: text/html;charset=UTF-8");
                            // mysqli_query("set names 'utf8'");
                            if(isset($_GET['month_id'])){
                                $monthid = $_GET['month_id'];
                                $connect->set_charset('utf8');
                                $sql = "SELECT * FROM `eng-month`";
                                $result = mysqli_query($connect, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['month_id'];
                                    $name = $row['month_name'];
                                    $day = $row['month_day'];
                                    if ($id != $monthid) {
                                        echo ' <option class="month" value="' . $id . '">' . $name . '</option>';
                                    } else {
                                        echo ' <option selected class="month" value="' . $id . '">' . $name . '</option>';
                                    }
                                }
                            }
                            else{
                                $connect->set_charset('utf8');
                                $sql = "SELECT * FROM `eng-month`";
                                $result = mysqli_query($connect, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['month_id'];
                                    $name = $row['month_name'];
                                    $day = $row['month_day'];
                                    if ($id != date("m")) {
                                        echo ' <option class="month" value="' . $id . '">' . $name . '</option>';
                                    } else {
                                        echo ' <option selected class="month" value="' . $id . '">' . $name . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <table class="calender" width="100%">
                        <tbody id="showcalender">
                            <?php
                            include("partials/calender_date.php");
                            // include('partials/_editModal.php');
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class=" border-custom shadow" style="height:100%; ">
                        <div class="bar bg-dark" id="eventType">
                            এই মাসের ঘটনা সমূহ
                        </div>
                        <div class="accordion show-event-col" id="accordionExample">
                            <div id="showEvent">
                                <?php include('partials/_handleEvent.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
           
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
    <script>
       
    </script>
</body>

</html>