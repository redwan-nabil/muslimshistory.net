<?php include("partials/_blogdbconnect.php") ?>
<?php 
if(isset($_GET['catagory_name']) && $_GET['catagory_name'] != ""){
    $main_catagory = $_GET['catagory_name'];
    $secondary_catagory_slug = $_GET['secondary_catagory_slug'];
    $sql = "SELECT * FROM `blog_secondary_catagory` WHERE `secondary_catagory_slug` LIKE '$secondary_catagory_slug' ORDER BY `sno` ASC";
    $result = mysqli_query($conn_to_blog_database,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $secondary_catagory_id = $row['secondary_catagory_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ihistory, A website for islamic historical events calender. Here you can found islamic evens in this day.">
    <meta name="keywords" content="islamic historical calender, islamic event calender, ihistory ">
    <meta name="author" content="Tanjimul Islam">
    <title>Islamic historical Events Calender | Historyofmuslim.com</title>
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
                $sql = "SELECT * FROM `blog_catagory` WHERE `secondary_catagory_id` = $secondary_catagory_id ORDER BY `sno` ASC";
                $result = mysqli_query($conn_to_blog_database, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $catagory_id = $row['catagory_id'];
                    $catagory_name = $row['catagory_name'];
                    $catagory_slug = $row['catagory_slug'];
                    $image_link = $row['image_link'];
                    
                    $sql2 = "SELECT * FROM `blog_details` WHERE `blog_catagory` = $catagory_id ORDER BY `sno` ASC";
                    $result2 = mysqli_query($conn_to_blog_database, $sql2);
                    $numrows2 = mysqli_num_rows($result2);
                    echo '<div class="col-md-4 my-2">
                            <a href="/lastcatagory.php?main_catagory='.$main_catagory.'&secondary_catagory_slug='.$secondary_catagory_slug.'&catagory_slug='.$catagory_slug.'" class="text-decoration-none">
                                <div class="card w3-theme-l5 w3-hover-text-theme w3-hover-border-theme">
                                    <img src="/img/architecture/'.$image_link.'" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <div class="lead">
                                            <h3>'.$catagory_name.'</h3>
                                            <p><span class="badge bg-dark">'.$numrows2.'</span> content to read.</p>
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