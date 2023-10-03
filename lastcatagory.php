<?php include("partials/_blogdbconnect.php");?>
<?php 
if(isset($_GET['main_catagory']) && $_GET['main_catagory'] != ""){
    $main_catagory = $_GET['main_catagory'];
    $secondary_catagory_slug = $_GET['secondary_catagory_slug'];
    $catagory_slug = $_GET['catagory_slug'];
    echo $catagory_slug;
    $sql = "SELECT * FROM `blog_catagory` WHERE `catagory_slug` LIKE '$catagory_slug' ORDER BY `sno` ASC";
    $result = mysqli_query($conn_to_blog_database,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $catagory_blog_id = $row['catagory_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Historyofmuslim.com, A website for islamic historical events calender. Here you can found islamic evens in this day.">
    <meta name="keywords" content="islamic historical calender, islamic event calender, ihistory ">
    <title>Islamic historical Events Calender | Historyofmuslim.com | Historyofmuslim.com.pro</title>
    <link href="img/ih-border.svg" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/w3-theme-green.css">
    <script src="js/jquery.min.js"></script>
    <style>
        .display-in-mobile {
            display: none;
        }

        @media(max-width:767px) {
            .display-in-mobile {
                display: block;
            }
        }
    </style>

</head>

<body>

    <?php include("partials/_header.php") ?>
    <section id="ourblogs" style="min-height:100vh">
        <div class="container marginnav">
            <h2 class="display-3 text-center w3-text-theme">Content's subjects</h2>

            <!-- contents for pc devices -->

            <div class="row">
                <?php
                $conn_to_blog_database->set_charset("utf8");
                $sql = "SELECT * FROM `blog_details` WHERE `blog_catagory` = $catagory_blog_id";
                $result = mysqli_query($conn_to_blog_database, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $blog_id = $row['blog_id'];
                    $blog_title= $row['blog_title'];
                    $blog_slug = $row['blog_slug'];
                    $image_link = $row['blog_image'];
                    echo'<div class="col-md-4 my-2">
                    <a href="details.php?main_catagory='.$main_catagory.'&secondary_catagory_slug='.$secondary_catagory_slug.'&catagory_slug='.$catagory_slug.'&blog_slug='.$blog_slug.'" class="text-decoration-none">
                        <div class="card card-home w3-theme-l5 w3-hover-text-theme w3-hover-border-theme" style="min-height:250px; overflow:hidden">
                            <img src="/img/blog_image/main_image/'.$image_link.'" class="card-img-top" alt="">
                            <div class="card-body">
                                <div class="lead">
                                    <h4>' . $blog_title . '</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php include("partials/_footer.php") ?>
    <!-- include js file -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
</body>

</html>