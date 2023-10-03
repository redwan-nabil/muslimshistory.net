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


    <?php include('partials/_headerUpdate.php') ?>

    <div id="controler">
        <div class="container mt-5">
            <div class="row border p-4 m-1 text-decoration-none bg-light ">
                <h1 class="text-center text-primary">Event formating</h1>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                <a href="insertevent.php " class="text-decoration-none">
                    <div class="alert alert-primary">
                        <h5>Insert a event</h5>
                    </div>
                </a>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                <a href="addacatagory.php" class="text-decoration-none"> 
                    <div class="alert alert-primary">
                        <h5>Add event catagory</h5>
                    </div>
                </a>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                    <a href="editevent.php" class="text-decoration-none">
                    <div class="alert alert-primary">
                        <h5>Edit event</h5>
                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                    <a href="monthlessevent.php" class="text-decoration-none">
                    <div class="alert alert-primary">
                        <h5>Edit event by catagory</h5>
                    </div>
                    </a>
                </div>
            </div>
            <div class="row border p-4 m-1 text-decoration-none bg-light ">
                <h1 class="text-center text-success">Blog formating</h1>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                <a href="blogformatting/addmaincatagory.php " class="text-decoration-none">
                    <div class="alert alert-success">
                        <h5>Add main catagory</h5>
                    </div>
                </a>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                <a href="blogformatting/addsubcatagory.php" class="text-decoration-none"> 
                    <div class="alert alert-success">
                        <h5>Add sub catagory</h5>
                    </div>
                </a>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                <a href="blogformatting/addlastcatagory.php" class="text-decoration-none"> 
                    <div class="alert alert-success">
                        <h5>Add last catagory</h5>
                    </div>
                </a>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-12 ">
                <a href="blogformatting/addablog.php" class="text-decoration-none"> 
                    <div class="alert alert-success">
                        <h5>Add a blog</h5>
                    </div>
                </a>
                </div>
            </div>
        </div>

    </div>


    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>

</body>

</html>