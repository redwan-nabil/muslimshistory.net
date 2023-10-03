<?php include("partials/_dbconnect.php") ?>
<?php include("partials/_header.php") ?>
<?php include("partials/functions.php") ?>
<?php
$isvalid = false;
// code for searched event link event gentrator;

if (isset($_GET["search-event-id"])) {
    if ($_GET["search-event-id"] != '') {
        $searcheventid = $_GET["search-event-id"];
        $connect->set_charset('utf8');
        $sql2 = "SELECT * FROM `event_islamic` WHERE `event_id` = $searcheventid";
        $result2 = mysqli_query($connect, $sql2);
        $numrows=mysqli_num_rows($result2);
        if($numrows <= 0){
            $isvalid = false;
        }
        while ($row2 = mysqli_fetch_assoc($result2)) {
            if ($row2) {
                $noEvent=false;
                $isvalid = true;
                $id = $row2['event_id'];
                $title = $row2['event_title'];
                $makki_condition = $row2['makki_condition'];
                $makki_year = $row2['makki_year'];
                $makki_month = $row2['makki_month'];
                $makki_day = $row2['makki_day'];
                $makki_bar = $row2['makki_bar'];
                $madani_condition = $row2['madani_condition'];
                $madani_year = $row2['madani_year'];
                $madani_month = $row2['madani_month'];
                $madani_day = $row2['madani_day'];
                $madani_bar = $row2['madani_bar'];
                $esai_condition = $row2['esai_condition'];
                $esai_year = $row2['esai_year'];
                $esai_month = $row2['esai_month'];
                $esai_day = $row2['esai_day'];
                $esai_bar = $row2['esai_bar'];
                $description = $row2['event_description'];
                $footnote = $row2['event_footnote'];
                $sql3 = "SELECT * FROM `eng-month` WHERE `month_id` = $makki_month";
                $result3 = mysqli_query($connect, $sql3);
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $makki_month_name = $row3['month_name_arabic'];
                }
                if ($description != ""){
                    $description = 'বর্ণনাঃ '. $description;
                }
                else{
                    $description = "";
                }
              
               $returnMakkiDateTime = returnDateTime($makki_condition, $makki_year, $makki_month, $makki_day, $makki_bar, 'month_name_arabic', $connect, 'মাক্কী');
               $returnMadaniDateTime = returnDateTime($madani_condition, $madani_year, $madani_month, $madani_day, $madani_bar, 'month_name_arabic', $connect,'হিজরী');
               $returnEsaiDateTime = returnDateTime($esai_condition, $esai_year, $esai_month, $esai_day, $esai_bar, 'month_name_bn', $connect, 'ইসায়ী');
            }
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Ihistory, A website for islamic historical events calender. Here you can found islamic evens in this day.">
    <meta name="keywords" content="islamic historical calender, islamic event calender, ihistory ">
    <meta name="author" content="Tanjimul Islam">
    <title>Islamic historical Events Calender | Historyofmuslim.com</title>
    <link href="img/ih-border.svg" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/w3-theme-green.css">
    <script src="js/jquery.min.js"></script>

<body>
    <section class="marginnav" style="min-height:100vh;">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 pt-3 ">
                <div class="w3-theme-l5 font-soliman p-4 border w3-border-theme">
                    <?php  
                    if ($isvalid == true){
                    echo '                
                        <h3><b>'.$title.'</b></h3>
                        <p>
                        '. $returnEsaiDateTime. $returnMakkiDateTime. $returnMadaniDateTime.'<div style="height:5px"></div>'.$description.'
                        </p>
                        <hr>
                        <p>'.$footnote.'</p>';
                    }
                    if($isvalid == false){
                        echo '<p class="m-0"><b>দুঃখিত,</b> কোনো ফলাফল পাওয়া যায়নি।</p>';
                    }
                        ?>
                </div>
                </div>
                <div class="col-md-3 pt-3">
                    <div class="w3-theme p-3">
                    <h4>About us</h4>
                    <p class="">
                    Ihistory is a website for islamic history. It contains content about islamic history. There are islamic historical calender and many more. In islamic historical calender you can found what happend in islamic history on this day.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("partials/_footer.php") ?>
    <!-- include js file -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
</body>

</html>