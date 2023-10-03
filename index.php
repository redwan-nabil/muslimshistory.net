<!DOCTYPE html>
<html lang="en">

<head>
    <title>Historyofmuslim.com | A website about muslims history | মুসলিম উম্মাহর ইতিহাস</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Historyofmuslim.com, A website for islamic historical events calender. Here you can found islamic evens in this day.">
    <meta name="keywords" content="Historyofmuslim.com, islamic historical calender, islamic event calender">
    <link href="img/ih-border.svg" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3-theme-green.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6QYTGHXFYK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6QYTGHXFYK');
</script>
</head>
<style>
    .carousel-caption {
        background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, .9));
        padding: 5px;
        font-size: 0.9rem;
        padding-top: 30px;
    }

    @media(min-width:701px) {
        .mage {
            width: 100%;
            transition: ease 1s;
        }

    }

    @media(max-width:700px) {
        .mage {
            height: 70vh;
        }
    }
</style>

<body class="bg-light">
    <?php include('partials/_header.php') ?>
    <!-- Title article -->
    <section class="header-picture bg-img text-dark" style="padding-top:66px;">
        <div class="container ">
            <div class="px-md-5" style="padding: 10vh 0px;">
                <!-- <img src="img/ih-border.svg" class="px-3 px-md-5 my-4" height="100px" alt=""> -->

                <h1 class="display-1 px-3 px-md-5  w3-text-theme">History of muslim</h1>
                <p class="text-left text-dark lead px-3 px-md-5"><b>Assalamu alaikum</b>. Welcome to
                    Historyofmuslim.com. It is a website about Islamic History. You can learn about Islamic history and
                    many more from here.</p>
                <!-- <p class="lead" style="font-family: system-ui;"> A website for Islamic History</p> -->
            </div>

        </div>

    </section>
    <section id="event" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <?php
                include("partials/_dbconnect.php");
                include("partials/_blogdbconnect.php");
                $month = date("m");
                $month = str_replace(0, "", $month);
                $connect->set_charset('utf8');
                $sql = "SELECT * FROM `event_islamic` WHERE `esai_month` = $month LIMIT 5";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row) {
                        $id = $row['event_id'];
                        $title = $row['event_title'];
                        echo '
                        <div class="col-lg-4 col-md-6 my-1">
                            <div class="card card-home border w3-hover-border-theme">
                                <div class="card-body">
                                    <h5 class=" font-mahfuj pb-3 pt-1 text-dark">' . substr($title, 0, 70) . ' ...</h5>
                                    <a href="/search-event.php?search-event-id=' . $id . '" class="nav-link text-primary my-1 py-2 font-soliman" style="cursor: pointer;position: absolute;bottom: -4px;left: 0px;">বিস্তারিত পড়ুন</a> 
                                 </div>
                            </div>
                        </div>
                        ';
                    }
                }
                ?>
                <div class="col-lg-4 col-md-6 my-1">
                    <div class="card card-home border w3-hover-border-theme" style="cursor: pointer;">
                        <a href="/calender.php" class="text-decoration-none text-success">
                            <div class="card-body">
                                <h2 class="py-1 font-mahfuj">আরো দেখুন</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="eventbycatagorylink" class="w3-theme">
        <div class="alert alert-success mb-0 font-mahfuj text-center" role="alert">
            <a href="/eventbycatagory.php" class=" text-dark" style="text-decoration:none;">
                <h4>মুসলিমদের ইতিহাস ক্যাটাগরিভিত্তিক দেখুন &#8649;</h4> <a href="/eventbycatagory.php" class="d-inline font-soliman">এখানে ক্লিক করুন</a>
            </a>
        </div>


    </section>
    <section class="w3-theme-light">
        <div class="container py-5">
            <div class="row">
                <?php
                $conn_to_blog_database->set_charset("utf8");
                $sql2 = "SELECT * FROM `blog_details` ORDER BY `blog_details`.`blog_post_datetime` DESC LIMIT 5";
                $result2 = mysqli_query($conn_to_blog_database, $sql2);
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $blog_id = $row2['blog_id'];
                    $blog_title= $row2['blog_title'];
                    $blog_slug = $row2['blog_slug'];
                    $image_link = $row2['blog_image'];
                    echo '<div class="col-md-4 my-2">
        <a href="details.php?blog_slug='.$blog_slug.'" class="text-decoration-none">
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
                <div class="col my-2">
                    <a href="architecture2.php" class="text-success text-decoration-none">
                        <div class="card w3-theme-l5 w3-hover-text-theme w3-hover-border-theme" style="min-height:250px; overflow:hidden">
                            <div class="card-body">
                                <h2 class="card-title">আরো দেখুন</h2>
                                <p class="card-text">এ জাতীয় আরো কন্টেন্ট দেখতে <a href="/catagory.php?catagory_name=Architecture"> এখানে ক্লিক করুন</a></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- <section id="slider" class=" border-top bg-light">
        <div class="slider">
        </div>
    </section> -->
    <!-- About Ihistory -->
    <hr>
    <!-- visitor aritcle -->
    <!-- <section id="cards" class="bg-light">
        <div class="container py-3">
            <h2 class="display-3 text-center py-2 w3-text-theme">Our projects</h2><br>
            <div class="row">
                <div class="col-md-4 col-sm-6 py-2">
                    <div class="card pt-3 card-home w3-theme-light w3-hover-text-theme w3-hover-border-theme">
                        <div class="card-body">
                            <h5 class="card-title "> <b> ইতিহাসের ক্যালেন্ডার </b></h5>
                            <p class="card-text ">মুসলিম জাতির ইতিহাসে ঐতিহাসিক ঘটনাবলী কোনদিনে সংঘটিত হয়েছিল সে বিষয়ে
                                একটি ক্যালেন্ডার।</p>
                            <a href="calender.php" class="btn w3-theme-d4 w3-hover-theme">ইতিহাসের ক্যালেন্ডার</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 py-2">
                    <div class="card pt-3 card-home card-dark w3-theme-d1 w3-hover-theme">
                        <div class="card-body">
                            <h5 class="card-title"><b>মুসলিমদের স্থাপত্য</b></h5>
                            <p class="card-text">ইতিহাস বিখ্যাত মুসলমানদের বিভিন্ন স্থাপনা ও এগুলোর ইতিহাস ঐতিহ্য বিষয়ে
                                তথ্য সম্বলিত লেখা। </p>
                            <a href="architecture2.php" class="btn w3-theme-l4 w3-hover-text-theme">মুসলিম স্থাপত্য</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 py-2">
                    <div class="card pt-3 card-home w3-theme-light w3-hover-text-theme w3-hover-border-theme">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn w3-theme-d4 w3-hover-theme">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light py-5 text-dark">
        <div class="container">
            <h2 class="display-4 w3-text-theme">Ihistory</h2><br>
            <p class="lead ">
                Ihistory is a website for islamic history. It contains content about islamic history. There are islamic
                historical calender and many more. In islamic historical calender you can found what happend in islamic
                history on this day.
            </p>
        </div>
    </section> -->
    <?php include('partials/_footer.php') ?>

    <!-- include js file -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
    <script>

    </script>
</body>

</html>