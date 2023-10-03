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
    <script src="js/bootstrap.bundle.js"></script>
    <script>
    function deleteEvent(id) {
        var confirmer = confirm("আপনি কি ইভেন্টটি মুছে ফেলতে চাচ্ছেন?");
        if (confirmer) {
            console.log(id);
            $.ajax({
                url: "partials/_deleteEvent.php",
                method: "POST",
                data: {
                    delevent_id: id
                },
                success: function(data) {
                    $("#message").html(data);
                    window.location.reload(true);
                    delevent_id = "#accordion"+id;
                    console.log(delevent_id);
                    // $('#showEvent').html(data);
                }
            });
        }
    }
    function editEvent(id) {
        
        window.location = `editModal.php?eventid=${id}`;
        
    }

    </script>
</head>

<body>
<?php
    include("partials/_headerUpdate.php");
    include("partials/_dbconnect.php");
    ?>

    <section class="pt-2 mb-4">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-4 show-event-col pr-0" style="padding-right: 0px;">
                   
                    
                    <table class="table border table-hover" width="100%">
                       <?php 
                       $connect->set_charset('utf8');
                       $sql = "SELECT * FROM `catagory` ORDER BY `catagory`.`catagory_id` ASC";
                       $result = mysqli_query($connect, $sql);
                       $counter = 1;
                       while ($row = mysqli_fetch_assoc($result)) {
                           $id = $row['catagory_id'];
                           $name = $row['catagory_name'];
                           $startYear = $row['catagory_starting_year'];
                           echo ' <tr onclick=""><td>'.$counter.'</td><td><a href = "monthlessevent.php?catagory_id='.$id.'">'.$name.'</a></td></tr>';
                           $counter++;
                       }
                       ?>
                    </table>
                </div>
                
                <div class="col scrollbar">
                    <div class=" border-custom" style="height:100%;">
                        <div class="bar bg-success text-light" id="mcatagoryName" >
                            একটি ক্যাটাগরি নির্বাচন করুন। 
                        </div>
                        <div class="accordion show-event-col" id="taccordionExample">
                            <div id="mshowEventByCatagory">
                            <?php
                                include("partials/_dbconnect.php");
                                include('partials/functions.php');
                                $noEvent=true;
                                if(isset($_GET["catagory_name_id"])){
                                    $catagoryId = $_GET["catagory_name_id"];
                                    $connect->set_charset('utf8');
                                    $sql = "SELECT * FROM `catagory` WHERE catagory_id =$catagoryId";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $catagoryname = $row['catagory_name'];
                                    }
                                    echo $catagoryname;
                                }
                                if(isset($_GET["catagory_id"])){
                                    $catagoryId = $_GET["catagory_id"];
                                    $connect->set_charset('utf8');
                                    // $sql = "SELECT * FROM `eng-month` WHERE month_id =$catagoryId";
                                    // $result = mysqli_query($connect, $sql);
                                    $accordionid = 1;
                                    // while ($row = mysqli_fetch_assoc($result)) {
                                    //     $monthName = $row['month_name_bn'];
                                    // }
                                    
                                    $sql2 = "SELECT * FROM `event_islamic` WHERE `event_catagory` = $catagoryId";
                                    $result2 = mysqli_query($connect, $sql2);
                                    while ($row2 = mysqli_fetch_assoc($result2)) {

                                        if ($row2) {
                                            $noEvent=false;
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
                                           $returnMadaniDateTime = returnDateTime($madani_condition, $madani_year, $madani_month, $madani_day, $madani_bar, 'month_name_arabic', $connect,'মাদানী');
                                           $returnEsaiDateTime = returnDateTime($esai_condition, $esai_year, $esai_month, $esai_day, $esai_bar, 'month_name_bn', $connect, 'ইসায়ী');
                                        }
                                        echo '<div class="accordion-item" id="accordion'.$id.'>
                                                    <h4 class="accordion-header" id="theading'.$title.'">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tcollapse'.$accordionid.'" aria-expanded="false" aria-controls="tcollapse'.$accordionid.'">
                                                            ' . $title . '
                                                        </button>
                                                    </h4>
                                                    <div id="tcollapse'.$accordionid.'" class="accordion-collapse collapse" aria-labelledby="theading'.$accordionid.'"  style="color:var(--ms-darkest);background-color:var(--ms-lighter);" data-bs-parent="#taccordionExample">
                                                        <div class="accordion-body">
                                                       '. $returnEsaiDateTime. $returnMakkiDateTime. $returnMadaniDateTime.'<div style="height:7px"></div>'.$description.'
                                                       তথ্যসূত্রঃ '.$footnote.'
                                                       <hr>
                                                       <div class="btn-group me-2" role="group" aria-label="First group">
                                                       <button type="button"  onclick="editEvent(' . $id . ')"class="btn btn-warning">Edit</button>
                                                       <button type="button" onclick="deleteEvent(' . $id . ')" id = "' . $id . '" class="btn btn-danger">Delete</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                             </div>';
                                        $accordionid = $accordionid+1 ;
                                    }
                                if($noEvent){

                                }
                                }



                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- include js file -->
    <script src="js/main.js"></script>
    
</body>

</html>







































































<script>
    // function mgetrequest(id){
    //     // $.ajax({
    //     //     url:"partials/_monthlessevent.php",
    //     //     method:"GET",
    //     //     data: {
    //     //         catagory_id:id
    //     //     },
    //     //     success:function(data){
    //     //         $('#mshowEventByCatagory').html(data);
    //     //     }
    //     // })
    //     $.ajax({
    //         url:"partials/_monthlessevent.php",
    //         method:"GET",
    //         data: {
    //             catagory_name_id:id
    //         },
    //         success:function(data){
    //             $('#mcatagoryName').html(data);
    //         }
    //     })
    // }
</script>