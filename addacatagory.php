<?php include('partials/_dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('partials/_dbconnect.php'); ?>
    <?php include('partials/_headerUpdate.php'); ?>
    
    <div id="catagorySubmitAlert"></div>
    
    
    <section>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <h4>নতুন ক্যাটাগরি যুক্ত করুন</h4>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="catName" placeholder="ক্যাটাগরির নাম লিখুন">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="startYear" placeholder="শুরুর বছর">
                    </div>
                    <div class="mb-3">
                        <input type="submit" id="catagorySubmit" class="form-control" value="ক্যাটাগরি যুক্ত করুন">
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <h4>ক্যাটাগরি সমূহ।</h4>
                    <div class="show-event-col">
                        <table class="table table-hover ">
                            <tbody>
                                <?php
                                // header("Content-Type: text/html;charset=UTF-8");
                                // mysqli_query("set names 'utf8'");
                                $connect->set_charset('utf8');
                                $sql = "SELECT * FROM `catagory`";
                                $result = mysqli_query($connect, $sql);
                                $counter = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['catagory_id'];
                                    $name = $row['catagory_name'];
                                    $startYear = $row['catagory_starting_year'];
                                    echo ' <tr class="" value="' . $id. '"><td>'.$counter.'</td><td>'.$name.'</td><td>'.$startYear.'</td></tr>';
                                    $counter++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
    <script>
        $("#catagorySubmit").click(function() {
            var catName = $("#catName").val();
            var startYear = $("#startYear").val();
            console.log(startYear);
            $.ajax({
                url: "partials/_insertEvent.php",
                method: "POST",
                data: {
                    catName: catName,
                    startYear: startYear
                },
                success: function(data) {
                    $('#catagorySubmitAlert').html(data);
                }
            });
        });
    </script>

</body>

</html>
