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
<?php include('partials/_dbconnect.php');
if (isset($_GET['eventid'])) {
    $updateEventId = $_GET['eventid'];
}
?>
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
    <div class="container">
        <div class="row mt-5">
            <?php
                $connect->set_charset('utf8');
                $sql = "SELECT * FROM `event_islamic` WHERE `event_id` = '$updateEventId'";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['event_id'];
                    $title = $row['event_title'];
                    $makki_condition = $row['makki_condition'];
                    $makki_year = $row['makki_year'];
                    $makki_month = $row['makki_month'];
                    $makki_day = $row['makki_day'];
                    $makki_bar = $row['makki_bar'];
                    $madani_condition = $row['madani_condition'];
                    $madani_year = $row['madani_year'];
                    $madani_month = $row['madani_month'];
                    $madani_day = $row['madani_day'];
                    $madani_bar = $row['madani_bar'];
                    $esai_condition = $row['esai_condition'];
                    $esai_year = $row['esai_year'];
                    $esai_month = $row['esai_month'];
                    $esai_day = $row['esai_day'];
                    $esai_bar = $row['esai_bar'];
                    $event_Importance = $row['event_Importance'];
                    $description = $row['event_description'];
                    $event_catagory = $row['event_catagory'];
                    $footnote = $row['event_footnote'];
                    
                    
                }
                ?>
                <h2 class="text-center text-dark " id = "upAlert"><?php echo $title; ?></h2>
                
            <div class="col-md-6 px-4 mt-4">
                <div class="row">

                    <div class="p-md-0">
                        <input type="text" class="form-control border-radius-none" id="ueventTitle" name="eventTitle" value="<?php echo $title ?>">
                        <input type="text" class="form-control border-radius-none d-none" id="ueventId" name="eventId" value="<?php echo $id ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <label for="">মাদানী বর্ননা</label>
                    <div class="col-md-3 p-md-0">
                        <select class="form-select border-radius-none" name="madaniCondition" id="umadaniCondition" aria-label="Default select example">
                            <option selected value="হিজরতপূর্ব">হিজরতপূর্ব</option>
                            <?php 
                            if($madani_condition == "হিজরি"){
                                echo'<option selected value="হিজরি">হিজরি</option>';
                            }
                            else{
                                echo'<option value="হিজরি">হিজরি</option>';
                            }
                            ?>
                            
                        </select>
                    </div>
                    <div class="col-md-3 p-md-0">
                        <input type="text" class="form-control border-radius-none" id="umadaniYear" name="madaniYear"  value="<?php echo $madani_year ?>"placeholder="মাদানী সন">
                    </div>
                    <div class="col-md-3 p-md-0"><select class="form-select border-radius-none form-select " name="madaniMonth" id="umadaniMonth" aria-label=".form-select-lg example">
                        
                            <option selected value="">মাসের নাম</option>
                            <?php
                            // header("Content-Type: text/html;charset=UTF-8");
                            // mysqli_query("set names 'utf8'");
                            $connect->set_charset('utf8');
                            $sql = "SELECT * FROM `eng-month`";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['month_id'];
                                $name = $row['month_name_arabic'];
                                $day = $row['month_day'];
                                if ($madani_month == $id ){
                                echo ' <option selected class="month" value="' . $id . '">' . $name . '</option>';

                                }
                                else{
                                echo ' <option class="month" value="' . $id . '">' . $name . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 p-md-0">
                        <div class="row mx-custom-datebar">
                            <div class="col-md-5 p-md-0">
                                <select class="form-select px-md-2 border-radius-none" name="madaniDate" id="umadaniDate" aria-label="Default select example">
                                    <option selected value="0">তারিখ</option>
                                    <?php
                                    if($madani_day == 32){
                                        echo'<option selected value="32">মাসের শুরুর দিক</option>';
                                    }
                                    else{
                                        echo'<option value="32">মাসের শুরুর দিক</option>';
                                    }
                                    if($madani_day == 33){
                                        echo'<option selected value="33">মাসের মাঝামাঝি</option>';
                                    }
                                    else{
                                        echo'<option value="33">মাসের মাঝামাঝি</option>';
                                    }
                                    if($madani_day == 34){
                                        echo'<option selected value="34">মাসের শেষের দিক</option>';
                                    }
                                    else{
                                        echo'<option value="34">মাসের শেষের দিক</option>';
                                    }
                                    $i = 1;
                                    while ($i <= $day) {
                                        if ($i == $madani_day) {
                                            echo '<option selected value="' . $i . '">' . $i . '</option>';
                                        } else {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }

                                        $i++;
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-6 p-md-0">
                                <select class="form-select px-md-2 border-radius-none" name="madaniBar" id="umadaniBar" aria-label="Default select example">
                                <option value="0">পাওয়া যায়নি</option>
                                    <?php
                                    $connect->set_charset('utf8');
                                    $sql = "SELECT * FROM `day_name`";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['day_id'];
                                        $dayName = $row['day_name'];
                                        if($id == $madani_bar){
                                            echo ' <option selected class="month" value="' . $id . '">' . $dayName . '</option>';

                                        }
                                        else{
                                            echo ' <option class="month" value="' . $id . '">' . $dayName . '</option>';

                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-3">
                    <label for="">ইসায়ী বর্ননা</label>
                    <div class="col-md-3 p-md-0">
                        <select class="form-select border-radius-none " name="esaiCondition" id="uesaiCondition" aria-label="Default select example">
                        <option selected value="ইসায়ী">ইসায়ী</option>
                            <?php 
                            if($madani_condition == "খ্রিষ্টপূর্ব"){
                                echo'<option selected value="খ্রিষ্টপূর্ব">খ্রিষ্টপূর্ব</option>';
                            }
                            else{
                                echo'<option value="খ্রিষ্টপূর্ব">খ্রিষ্টপূর্ব</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 p-md-0">
                        <input type="text" class="form-control border-radius-none" id="uesaiYear" name="esaiYear" placeholder="ইসায়ী সন" value="<?php echo $esai_year ?>">
                    </div>
                    <div class="col-md-3 p-md-0"><select class="form-select border-radius-none form-select " name="esaiMonth" id="uesaiMonth" aria-label=".form-select-lg example">
                        <option selected value="">মাসের নাম</option>

                            <?php
                            // header("Content-Type: text/html;charset=UTF-8");
                            // mysqli_query("set names 'utf8'");
                            $connect->set_charset('utf8');
                            $sql = "SELECT * FROM `eng-month`";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['month_id'];
                                $name = $row['month_name_bn'];
                                $day = $row['month_day'];
                                if ($esai_month == $id ){
                                    echo ' <option selected class="month" value="' . $id . '">' . $name . '</option>';
    
                                    }
                                    else{
                                    echo ' <option class="month" value="' . $id . '">' . $name . '</option>';
                                    }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 p-md-0">
                        <div class="row  mx-custom-datebar">
                            <div class="col-md-5 p-md-0">
                                <select class="form-select px-md-2 border-radius-none" name="esaiDate" id="uesaiDate" aria-label="Default select example">
                                    <option selected value="0">তারিখ</option>
                                    <?php
                                    // echo $esai_day;
                                    if($esai_day == 32){
                                        echo'<option selected value="32">মাসের শুরুর দিক</option>';
                                    }
                                    else{
                                        echo'<option value="32">মাসের শুরুর দিক</option>';
                                    }
                                    if($esai_day == 33){
                                        echo'<option selected value="33">মাসের মাঝামাঝি</option>';
                                    }
                                    else{
                                        echo'<option value="33">মাসের মাঝামাঝি</option>';
                                    }
                                    if($esai_day == 34){
                                        echo'<option selected value="34">মাসের শেষের দিক</option>';
                                    }
                                    else{
                                        echo'<option value="34">মাসের শেষের দিক</option>';
                                    }
                                    $i = 1;
                                    while ($i <= $day) {
                                        if ($i == $esai_day) {
                                            echo '<option selected value="' . $i . '">' . $i . '</option>';
                                        } else {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }

                                        $i++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 p-md-0">
                                <select class="form-select px-md-2 border-radius-none" name="esaiBar" id="uesaiBar" aria-label="Default select example">
                                    <option value="0">পাওয়া যায়নি</option>
                                    <?php
                                    $connect->set_charset('utf8');
                                    $sql = "SELECT * FROM `day_name`";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['day_id'];
                                        $dayName = $row['day_name'];
                                        if($id == $esai_bar){
                                            echo ' <option selected class="month" value="' . $id . '">' . $dayName . '</option>';

                                        }
                                        else{
                                            echo ' <option class="month" value="' . $id . '">' . $dayName . '</option>';

                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-3">
                    <label for="">মাক্কী বর্ননা</label>
                    <div class="col-md-3 p-md-0">
                        <select class="form-select border-radius-none" name="makkiCondition" id="umakkiCondition" aria-label="Default select example">
                        <option selected value="হিজরতপূর্ব">হিজরতপূর্ব</option>
                            <?php 
                            if($madani_condition == "হিজরি"){
                                echo'<option selected value="হিজরি">হিজরি</option>';
                            }
                            else{
                                echo'<option value="হিজরি">হিজরি</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 p-md-0">
                        <input type="text" class="form-control border-radius-none" id="umakkiYear" name="makkiYear" placeholder="মাক্কী সন" value="<?php echo $makki_year ?>">
                    </div>
                    <div class="col-md-3 p-md-0"><select class="form-select border-radius-none form- " name="makkiMonth" id="umakkiMonth" aria-label=".form-select-lg example">
                        <option selected value="">মাসের নাম</option>

                            <?php
                            // header("Content-Type: text/html;charset=UTF-8");
                            // mysqli_query("set names 'utf8'");
                            $connect->set_charset('utf8');
                            $sql = "SELECT * FROM `eng-month`";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['month_id'];
                                $name = $row['month_name_arabic'];
                                $day = $row['month_day'];
                                if ($makki_month == $id ){
                                    echo ' <option selected class="month" value="' . $id . '">' . $name . '</option>';
    
                                    }
                                    else{
                                    echo ' <option class="month" value="' . $id . '">' . $name . '</option>';
                                    }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 p-md-0">
                        <div class="row  mx-custom-datebar">
                            <div class="col-md-5 p-md-0">
                                <select class="form-select px-md-2 border-radius-none" name="makkiDate" id="umakkiDate" aria-label="Default select example">
                                    <option selected value="0">তারিখ</option>
                                    <?php
                                    if($makki_day == 32){
                                        echo'<option selected value="32">মাসের শুরুর দিক</option>';
                                    }
                                    else{
                                        echo'<option value="32">মাসের শুরুর দিক</option>';
                                    }
                                    if($makki_day == 33){
                                        echo'<option selected value="33">মাসের মাঝামাঝি</option>';
                                    }
                                    else{
                                        echo'<option value="33">মাসের মাঝামাঝি</option>';
                                    }
                                    if($makki_day == 34){
                                        echo'<option selected value="34">মাসের শেষের দিক</option>';
                                    }
                                    else{
                                        echo'<option value="34">মাসের শেষের দিক</option>';
                                    }
                                    $i = 1;
                                    while ($i <= $day) {
                                        if ($i == $makki_day) {
                                            echo '<option selected value="' . $i . '">' . $i . '</option>';
                                        } else {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }

                                        $i++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 p-md-0">
                                <select class="form-select px-md-2 border-radius-none" name="makkiBar" id="umakkiBar" aria-label="Default select example">
                                    <option value="0">পাওয়া যায়নি</option>
                                    <?php
                                    $connect->set_charset('utf8');
                                    $sql = "SELECT * FROM `day_name`";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['day_id'];
                                        $dayName = $row['day_name'];
                                        if($id == $makki_bar){
                                            echo ' <option selected class="month" value="' . $id . '">' . $dayName . '</option>';

                                        }
                                        else{
                                            echo ' <option class="month" value="' . $id . '">' . $dayName . '</option>';

                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 px-4 mt-4">
                <div class="row">
                    <div class="p-md-0">
                        <textarea placeholder="বর্ণনা" name="eventDescription" id="ueventDescription" aria-expand="none" cols="30" rows="4" class="setheightoftextarea form-control"><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="">ক্যাটাগরি ও গুরুত্ব</label>
                    <div class="col-md-9 p-md-0">
                        <select class="form-select border-radius-none form- " name="catagory" id="ucatagory" aria-label=".form-select-lg example">
                            <option selected value="">ক্যাটাগরি
                            </option>
                            <?php
                            // header("Content-Type: text/html;charset=UTF-8");
                            // mysqli_query("set names 'utf8'");
                            $connect->set_charset('utf8');
                            $sql = "SELECT * FROM `catagory`";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['catagory_id'];
                                $name = $row['catagory_name'];
                                if ($id == $event_catagory){
                                    echo ' <option selected class="month" value="' . $id . '">' . $name . '</option>';

                                }
                                else{
                                    echo ' <option class="month" value="' . $id . '">' . $name . '</option>';

                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 p-md-0">
                        <select class="form-select border-radius-none" name="importance" id="uimportance" aria-label="Default select example">
                            <option selected value="0">গুরুত্ব</option>
                            <?php 
                            $i = 1;
                            while($i <= 4){
                                if($i == $event_Importance){
                                echo'<option selected value="'.$i.'">'.$i.'</option>';
                            }
                            else{
                                echo'<option value="'.$i.'">'.$i.'</option>';
                            }
                            $i++;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="">ফুটনোট লিখুন</label>
                    <div class="col-md-9 p-md-0">
                        <input type="text" class="form-control border-radius-none" id="ufooter" name="footer" placeholder="ফুটনোট" value="<?php echo $footnote  ?>">
                    </div>
                    <div class="col-md-3 p-md-0">
                        <input type="submit" class="form-control btn bg-ms-darkest text-ms-lighter btn-outline-dark  border-radius-none" id="updateButton" value="জমা দিন">
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/main.js"></script>
        <script>

        </script>
</body>

</html>