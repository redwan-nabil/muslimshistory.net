<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Historyofmuslim.com, A website for islamic historical events calender. Here you can found islamic evens in this day.">
    <meta name="keywords" content="islamic historical calender, islamic event calender, Historyofmuslim.com ">
    <meta name="author" content="Tanjimul Islam">
    <title>Islamic historical Events Calender | Historyofmuslim.com</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3-theme-green.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="img/ih-border.svg" rel="icon">
    <style>
    .accordion-body{
        color: black;
    }
    ::-webkit-scrollbar{
    width: 7px;
}
::-webkit-scrollbar-thumb{
    background-color:var(--ms-darkest) ;
    height:auto;
    border-bottom-left-radius: 1000px;
    
}
.col-md-6 ::-webkit-scrollbar-thumb{
    background-color:var(--ms-darkest) ;
    height:auto;
    border-bottom-left-radius: 1000px;
}
.col-md-6 ::-webkit-scrollbar{
    width: 5px;
} 
    </style>
    <script src="js/jquery.min.js"></script>

</head>

<body class="body-calender">
    <?php
    include("partials/_header.php");
    include("partials/_dbconnect.php");
    ?>

    <section class="pt-5 mb-5">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-6 col-lg-8 mt-3 ">
                    <div class="calender-div">
                    <div class="">
                        <select class="form-select form-select selector-month w3-theme" name="month" id="month" style="border-radius: 0px !important; border:0px solid red;" aria-label=".form-select-lg example">
                            <?php
                            // header("Content-Type: text/html;charset=UTF-8");
                            // mysqli_query("set names 'utf8'");
                            $connect->set_charset('utf8');
                            $sql = "SELECT * FROM `eng-month`";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['month_id'];
                                $name = $row['month_name'];
                                $day = $row['month_day'];
                                if($id != date("m")){
                                echo ' <option class="month" value="' . $id . '">' . $name . '</option>';
                                }
                                else{
                                echo ' <option selected class="month" value="' . $id . '">' . $name . '</option>';

                                }
                            }
                            ?>
                        </select>
                    </div>
                    <table class="calender" width="100%">
                        <tbody id="showcalender">
                            <?php
                            include("partials/calender_date.php");
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4 mt-3 scrollbar">
                    <div class=" border-custom shadow" style="height:100%;">
                        <div class="bar bg-success w3-theme" id="eventType" >
                            এই মাসের ঘটনা সমূহ 
                        </div>
                        <div class="accordion show-event-col" id="accordionExample">
                            <div id="showEvent">
                               <?php include('partials/_handleEvent.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>

    <?php include('partials/_footer.php')?>

    <!-- include js file -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
</body>

</html>