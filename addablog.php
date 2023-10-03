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

    <div id="catagorySubmitAlert2"></div>


    <section>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <!-- <form action="addblogcatagory.php" method="POST"> -->
                    <h4>নতুন ব্লগ ক্যাটাগরি যুক্ত করুন</h4>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="architecturetitle" id="architecturetitle" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="arcfoldername" id="arcfoldername" placeholder="FOLDER NAME">
                    </div>
                    <div class="mb-3">
                        <textarea type="text" rows="10" class="form-control" name="arcdescription" id="arcdescription" placeholder="বর্ণনা"></textarea>
                    </div>

                    <!-- </form> -->
                </div>
                <div class="col-md-6 mt-md-3 pt-md-5">
                    <div class="mb-3">
                        <textarea type="text" rows="3" class="form-control" name="arcdescriptionshort" id="arcdescriptionshort" placeholder="সংক্ষিপ্ত বর্ণনা"></textarea>
                    </div>
                    <div class="mb-3">
                        <select class="form-select border-radius-none form-select " name="arccatagoryno" id="arccatagoryno" aria-label=".form-select-lg example">
                            <option selected value="">ক্যাটাগরি</option>
                            <?php
                            // header("Content-Type: text/html;charset=UTF-8");
                            // mysqli_query("set names 'utf8'");
                            $connect->set_charset('utf8');
                            $sql = "SELECT * FROM `architecture-blog-catagory`";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['architecture_catagory_id'];
                                $name = $row['architecture_catagory_name'];
                                echo ' <option class="month" value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="arcimglink" id="arcimglink" placeholder="IMAGE NAME">
                    </div>
                    <div class="mb-3">
                        <input type="submit" id="addAArcBlog" class="form-control" value="ক্যাটাগরি যুক্ত করুন">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
    <script>
        $("#addAArcBlog").click(function() {
            var architecturetitle = $("#architecturetitle").val();
            var arcfoldername = $("#arcfoldername").val();
            var arcdescription = $("#arcdescription").val();
            var arcdescriptionshort = $("#arcdescriptionshort").val();
            var arccatagoryno = $("#arccatagoryno").val();
            var arcimglink = $("#arcimglink").val();
            $.ajax({
                url: "partials/_addablog.php",
                method: "POST",
                data: {
                    architecturetitle: architecturetitle,
                    arcfoldername: arcfoldername,
                    arcimglink: arcimglink,
                    arcdescription: arcdescription,
                    arcdescriptionshort: arcdescriptionshort,
                    arccatagoryno: arccatagoryno,
                },
                success: function(data) {
                    $('#catagorySubmitAlert2').html(data);
                }
            });
        });
    </script>

</body>

</html>