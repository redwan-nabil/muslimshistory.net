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
    <?php include('partials/_headerUpdate.php'); ?>
    
        <div id="insertAlert"></div>
        
        
    
    <section class="inserting-form mt-5">
        <div class="container">
            <h1 class="text-center">একটি ইভেন্ট যোগ করুন </h1>
            <?php include('partials/_eventAdderForm.php') ?>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>
   
</body>

</html>