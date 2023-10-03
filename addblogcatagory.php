
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

    <?php include('partials/_headerUpdate.php'); ?>
    <?php include('partials/_dbconnect.php'); ?>

    <div id="catagorySubmitAlert"></div>


    <section>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <!-- <form action="addblogcatagory.php" method="POST"> -->
                        <h4>নতুন ব্লগ ক্যাটাগরি যুক্ত করুন</h4>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="architecturename" id="architecturename" placeholder="ক্যাটাগরির নাম লিখুন">
                        </div>
                        <div class="mb-3">
                            <textarea type="text" rows="10" class="form-control" name="architecturedesc" id="architecturedesc" placeholder="বর্ণনা"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="foldername" id="foldername" placeholder="FOLDER NAME">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="imglink" id="imglink" placeholder="IMAGE NAME">
                        </div>
                        <div class="mb-3">
                            <input type="submit" id="makeafolder" class="form-control" value="ক্যাটাগরি যুক্ত করুন">
                        </div>
                    <!-- </form> -->
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
                                $sql = "SELECT * FROM `architecture-blog-catagory`";
                                $result = mysqli_query($connect, $sql);
                                $counter = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['architecture_catagory_id'];
                                    $name = $row['architecture_catagory_name'];
                                    $foldername = $row['architecture_folder_name'];
                                    echo ' <tr class="" value="' . $id . '"><td>' . $counter . '</td><td>' . $name . '</td><td>' . $foldername . '</td></tr>';
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
        $("#makeafolder").click(function() {
            var architecturename = $("#architecturename").val();
            var foldername = $("#foldername").val();
            var imglink = $("#imglink").val();
            var architecturedesc = $("#architecturedesc").val();
            $.ajax({
                url: "partials/_insertcatagory.php",
                method: "POST",
                data: {
                    architecturename: architecturename,
                    architecturedesc: architecturedesc,
                    foldername: foldername,
                    imglink: imglink
                },
                success: function(data) {
                    $('#catagorySubmitAlert').html(data);
                }
            });
        });
    </script>

</body>

</html>