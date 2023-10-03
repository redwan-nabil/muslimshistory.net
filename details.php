<?php include("partials/_blogdbconnect.php") ?>
<?php include("partials/functions.php") ?>
<?php
// main_catagory=&secondary_catagory_slug=&catagory_slug=&blog_slug=
if(isset($_GET['blog_slug']) && $_GET['blog_slug'] != ""){
    if(isset($_GET['main_catagory'])){
        $main_catagory = $_GET['main_catagory'];
    }
    if(isset($_GET['secondary_catagory_slug'])){
        $secondary_catagory_slug = $_GET['secondary_catagory_slug'];
    }
    if(isset($_GET['catagory_slug'])){
        $catagory_slug = $_GET['catagory_slug'];
    }
    $blog_slug = $_GET['blog_slug'];
    // echo $blog_slug;
    $conn_to_blog_database->set_charset("utf8");
    $sql = "SELECT * FROM `blog_details` WHERE `blog_slug` LIKE '$blog_slug' ORDER BY `sno` ASC";
    $result = mysqli_query($conn_to_blog_database, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $blog_title = $row['blog_title'];
        $blog_description = $row['blog_description'];
        $blog_catagory= $row['blog_catagory'];
        $blog_image = $row['blog_image'];
        $blog_all_image = $row['blog_all_img'];
        $blog_footnote = $row['blog_footnote'];
    }
}   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="IHistoryofmuslim.com, A website for islamic historical events calender. Here you can found islamic evens in this day.">
    <meta name="keywords" content="islamic historical calender, islamic event calender, Historyofmuslim.com ">
    <meta name="author" content="Tanjimul Islam">
    <title>Islamic historical Events Calender | Historyofmuslim.com</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="img/ih-border.svg" rel="icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/w3-theme-green.css">
    <script src="js/jquery.min.js"></script>
    <style>
        .img-div {
            width: 100%;
            padding: 10px 0px;
            /* object-fit: cover; */
        }

        .ref-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        @media(max-width:575px) {
            .img-div {
                width: 60%;
                margin: auto;
            }
        }

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

<body class="font-soliman">
    <?php include("partials/_header.php") ?>

    <div class="marginnav container pt-3" style="min-height: 90vh;">
        <div class="row mb-3">
            <div class="col-md-12 pb-2">
                <h1 class="text-center w3-text-theme font-mahfuj mt-4 mb-1"> <?php echo $blog_title; ?></h1>

            </div>
            <!-- <p style="font-size:1.2rem;" class="font-soliman border px-5">lorem500</p>'; -->
        </div>
        <div class="row px-2 ">
            <div class="col-md-10 col-12 col-lg-9 m-auto border shadow-lg bg-light p-2">

                <div class="p-3">
                    <img class="img-fluid rounded overflow-scroll" src="/img/blog_image/main_image/<?php echo $blog_image?>">
                </div>
                <p class="text-justify p-3"><?php echo $blog_description; ?></p>
                <div class="accordion" id="blogAttachment">
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="imageHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#imageCollapse" aria-expanded="false" aria-controls="imageCollapse">
                                Gallary
                            </button>
                        </h4>
                        <div id="imageCollapse" class="accordion-collapse collapse" aria-labelledby="imageHeading"
                             style="">
                            <div class="accordion-body">
                                <div class="row mx-1 my-2">
                                <?php 
                                $imagearray = $blog_all_image;
                                $divided_the_imagearray =  explode('###',$imagearray);
                                $count_the_element_of_imagearray = count($divided_the_imagearray);
                                $imagearraycounter = 0;
                                if($count_the_element_of_imagearray>= 1){
                                   while($imagearraycounter < $count_the_element_of_imagearray){
                                    $image_description = $imagearraycounter+1 ;
                                    echo'   
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="img-div">
                                            <a target="blank" href="img/blog_image/other_image/'.$divided_the_imagearray[$imagearraycounter].'">
                                            <figure class="figure">
                                                <img class="ref-img" src="img/blog_image/other_image/'.$divided_the_imagearray[$imagearraycounter].'" alt="">
                                                <figcaption class="figure-caption">'.$divided_the_imagearray[$image_description].'
                                                    </figcaption>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>' ;                              
                                    $imagearraycounter+=2;
                                } 
                                }
                                
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h4 class="accordion-header" id="footnoteHeading">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#footnoteCollapse" aria-expanded="true"
                                aria-controls="footnoteCollapse">
                                Footnote
                            </button>
                        </h4>
                        <div id="footnoteCollapse" class="accordion-collapse collapse show" aria-labelledby="footnoteHeading"
                            >
                            <div class="accordion-body">
                                <ul>
                                <?php 
                                $divided_the_footnote =  explode('###',$blog_footnote);
                                $count_the_element_of_footnote = count($divided_the_footnote);
                                $footnote_no_counter = 0;
                                if($blog_footnote != ""){
                                while($footnote_no_counter < $count_the_element_of_footnote ){
                                    $footnote_no_counter_bangla = banglaNumber($footnote_no_counter+1);
                                    echo '<li style="list-style-type:none;"><b>['.$footnote_no_counter_bangla.']</b>'. $divided_the_footnote[$footnote_no_counter].' </li>';
                                    $footnote_no_counter++;
                                }
                                }
                                else {
                                    echo"কোনো ফুটনোট পাওয়া যায়নি।";
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build .</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build .</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build .</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build .</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <br>
    <!-- include js file -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
</body>

</html>