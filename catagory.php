    <?php include("partials/_blogdbconnect.php") ?>
<?php 
if(isset($_GET['catagory_name']) && $_GET['catagory_name'] != ""){
    $main_catagory = $_GET['catagory_name'];
    $sql = "SELECT * FROM `blog_main_catagory` WHERE `catagory_name` LIKE '$main_catagory' ORDER BY `sno` ASC";
    $result = mysqli_query($conn_to_blog_database,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $main_catagory_id = $row['catagory_id'];
    }
}
else{
    header("location:index.php");
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
    <title>Islamic historical Events Calender | iHistory |ihistory.pro</title>
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
                $sql = "SELECT * FROM `blog_secondary_catagory` WHERE `parent_catagory` = $main_catagory_id ORDER BY `blog_secondary_catagory`.`sno` ASC";
                $result = mysqli_query($conn_to_blog_database, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $secondary_catagory_id = $row['secondary_catagory_id'];
                    $secondary_catagory_name = $row['secondary_catagory_name'];
                    $secondary_catagory_slug = $row['secondary_catagory_slug'];
                    $image_name = $row['image_name'];
                    $manyblog = $row['manyblog'];
                    
                    $sql2 = "SELECT * FROM `blog_catagory` WHERE `secondary_catagory_id` = $secondary_catagory_id ORDER BY `blog_catagory`.`sno` ASC";
                    $result2 = mysqli_query($conn_to_blog_database, $sql2);
                    $numrows2 = mysqli_num_rows($result2);
                //     echo '<div class="col-md-4 my-2">
                //     <a href="/subcatagory.php?catagory_name='.$main_catagory.'&secondary_catagory_slug='.$secondary_catagory_slug.'" class="text-decoration-none">
                //         <div class="card w3-theme-l5 w3-hover-text-theme w3-hover-border-theme">
                //             <img src="/img/architecture/'.$image_name.'" class="card-img-top" alt="">
                //             <div class="card-body">
                //                 <div class="lead">
                //                     <h3>'.$secondary_catagory_name.'</h3>
                //                     <p><span class="badge bg-dark">'.$numrows2.'</span> content to read.</p>
                //                 </div>
                //             </div>
                //         </div>
                //     </a>
                // </div>';
                    if($manyblog == 1 ){
                        if($numrows2 > 0){
                            echo '<div class="col-md-4 my-2">
                            <a href="/subcatagory.php?catagory_name='.$main_catagory.'&secondary_catagory_slug='.$secondary_catagory_slug.'" class="text-decoration-none">
                            <div class="card w3-theme-l5 w3-hover-text-theme w3-hover-border-theme">
                            <img src="/img/architecture/'.$image_name.'" class="card-img-top" alt="">
                            <div class="card-body">
                            <div class="lead">
                            <h3>'.$secondary_catagory_name.'</h3>
                            <p><span class="badge bg-dark">'.$numrows2.'</span> content to read.</p>
                            </div>
                            </div>
                            </div>
                            </a>
                            </div>';
                        }
                    }
                    else{
                        $sql3 = "SELECT * FROM `blog_catagory` WHERE `secondary_catagory_id` = $secondary_catagory_id ORDER BY `sno` ASC";
                        $result3 = mysqli_query($conn_to_blog_database, $sql3);
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            $catagory_id = $row3['catagory_id'];
                            $catagory_name = $row3['catagory_name'];
                            $catagory_slug = $row3['catagory_slug'];
                            $image_link = $row3['image_link'];
                            $manyblog = $row3['manyblog'];
                            if( $manyblog == 1 ){
                                
                                $sql4 = "SELECT * FROM `blog_details` WHERE `blog_catagory` = $catagory_id ORDER BY `sno` ASC";
                                $result4 = mysqli_query($conn_to_blog_database, $sql4);
                                $numrows4 = mysqli_num_rows($result4);
                                echo '<div class="col-md-4 my-2">
                                <a href="/lastcatagory.php?main_catagory='.$main_catagory.'&secondary_catagory_slug='.$secondary_catagory_slug.'&catagory_slug='.$catagory_slug.'" class="text-decoration-none">
                                <div class="card w3-theme-l5 w3-hover-text-theme w3-hover-border-theme">
                                <img src="/img/architecture/'.$image_link.'" class="card-img-top" alt="">
                                <div class="card-body">
                                <div class="lead">
                                <h3>'.$catagory_name.'</h3>
                                <p><span class="badge bg-dark">'.$numrows4.'</span> content to read.</p>
                                </div>
                                </div>
                                </div>
                                </a>
                                </div>';
                            }
                            else{
                                $sql5 = "SELECT * FROM `blog_details` WHERE `blog_catagory` = $catagory_id";
                                $result5 = mysqli_query($conn_to_blog_database, $sql5);
                                while ($row5 = mysqli_fetch_assoc($result5)) {
                                    $blog_id = $row5['blog_id'];
                                    $blog_title= $row5['blog_title'];
                                    $blog_slug = $row5['blog_slug'];
                                    $image_link = $row5['blog_image'];
                                    echo'<div class="col-md-4 my-2">
                                    <a href="details.php?main_catagory='.$main_catagory.'&secondary_catagory_slug='.$secondary_catagory_slug.'&catagory_slug='.$catagory_slug.'&blog_slug='.$blog_slug.'" class="text-decoration-none">
                                        <div class="card card-home w3-theme-l5 w3-hover-text-theme w3-hover-border-theme" style="min-height:250px; overflow:hidden">
                                            <img src="/img/architecture/' . $image_link . '" class="card-img-top" alt="">
                                            <div class="card-body">
                                                <div class="lead">
                                                    <h4>' . $blog_title . '</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                                }
                            }
                            }   
                        }
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