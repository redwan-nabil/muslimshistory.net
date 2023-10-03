<?php include('partials/_dbconnect.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Historyofmuslim.com , A website for islamic historical events calender. Here you can found islamic evens in this day.">
  <meta name="keywords" content="islamic historical calender, islamic event calender, ihistory ">
  <meta name="author" content="Tanjimul Islam">
  <title>Islamic historical Events Calender | Historyofmuslim.com</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/w3-theme-green.css">
  <script src="js/jquery.min.js"></script>
  <link href="img/ih-border.svg" rel="icon">
  <style>
    .calender-navbar-button {
      background: transparent;
      padding: 5px 10px;
      border: none;
    }

    .bd-aside {
      padding-top: 60px;
    }

    .bd-aside a {
      padding: .1875rem .5rem;
      margin-top: .125rem;
      /* margin-left: .3125rem; */
      color: rgba(0, 0, 0, .65);
      text-decoration: none;
    }

    .bd-aside a:hover,
    .bd-aside a:focus {
      color: rgba(0, 0, 0, .85);
      background-color: rgba(121, 82, 179, .1);
    }

    .bd-aside .active {
      font-weight: 600;
      color: rgba(0, 0, 0, .85);
    }

    .bd-aside .calender-navbar-button {
      padding: .25rem .5rem;
      font-weight: 600;
      color: rgba(0, 0, 0, .65);
      border: 0;
      transition: 0.25s;
    }

    /* .bd-aside .calender-navbar-button:hover,
.bd-aside .calender-navbar-button:focus {
  color: rgba(0, 0, 0, .85);
  background-color: rgba(121, 82, 179, .1);
} */

    .bd-aside .calender-navbar-button:focus {
      /* box-shadow: 0 0 0 1px rgba(121, 82, 179, .7); */
      color: white;
    }

    .bd-aside .calender-navbar-button::before {
      width: 1.25em;
      line-height: 0;
      content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
      transition: transform .35s ease;

      /* rtl:raw:
  transform: rotate(180deg) translateX(-2px);
  */
      transform-origin: .5em 50%;
    }

    .bd-aside .calender-navbar-button[aria-expanded="true"]::before {
      transform: rotate(90deg)
        /* rtl:ignore */
      ;
    }

    .header-section {
      width: 100%;
      min-height: 40px;
      /* padding: 20px; */
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      position: sticky;
      top: 50px;
    }

    .title-event {
      padding-left: 20px;
      padding-right: 20px;
      min-height: 20px;
      width: 100%;
      display: inline-block;
      overflow-x: auto;
      white-space: nowrap;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }

    .title-event::-webkit-scrollbar {
      display: none;
    }

    .padding-left-0 {
      padding-left: 0px !important;
    }

    .right-arrow {
      /* background-color: red; */
      min-height: 40px;
      width: 50px;
      font-size: 25px;
      font-weight: bold;
      cursor: pointer;
      position: absolute;
      right: 0;

    }

    .padding-header {
      padding-top: 20px;
      /* position: fixed;
      top: 50px; */
      background-color: #fff;
      padding-bottom: 10px;
    }

    .right-arrow:hover {
      background-color: #fff !important;
    }
    .accordion-button{
      z-index: 0;
    }
    @media(max-width:767px) {
      .bd-aside {
        display: block;
        position: fixed;
        width: 0px;
        padding: 0px;
        z-index: 100000;
        height: 100%;
        top: 0;
        left: 0;
        overflow-x: hidden;
        padding-top: 60px;

      }

      .showsidenav {
        width: 100%;
        /* padding: 1000px; */
      }
    }
  </style>

</head>

<body class="font-soliman">
  <?php include('partials/_header.php') ?>
  <div class="container-fluid marginnav" style="min-height: 80vh;">
    <div class="row ">
      <nav id="sideNav" class="col-md-4 w3-theme bd-aside container-fluid ">
        <button type="button" id="sidebarClose" style="position:absolute;top:15px;right:15px" class="btn-close p-3" aria-label="Close"></button>
        <ul class="list-unstyled stik font-soliman">
          <?php

          $connect->set_charset('utf8');
          $sql = "SELECT * FROM `event_main_catagory` ORDER BY `event_main_catagory`.`sno` ASC";
          $result = mysqli_query($connect, $sql);
          $counter = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['event_main_catagory_serial'];
            $name = $row['event_main_catagory_name'];
            $sql2 = "SELECT * FROM `catagory` WHERE `main_catagory_serial` = $id ORDER BY `sno` ASC";
            $result2 = mysqli_query($connect, $sql2);
            $num_of_rows = mysqli_num_rows($result2);
            if ($num_of_rows < 1) {
              echo "";
            } elseif ($num_of_rows == 1) {
              while ($row2 = mysqli_fetch_assoc($result2)) {
                $catagory_id = $row2['catagory_id'];
                $catagory_name = $row2['catagory_name'];
              }
              echo '<li class="w3-theme">
              <a class="w-100 padding-left-0 d-inline-flex align-items-center rounded " href="/eventbycatagory.php?catagory_id=' . $catagory_id . '" style=""><button class="w-100  calender-navbar-button d-inline-flex align-items-center collapsed" >' . $name . '</button></a>';
              echo '</li>';
            } else {
              echo '
                           <li class="w3-theme">
                           <button class="w-100  calender-navbar-button d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#catagoryId' . $counter . '" aria-controls="catagoryId' . $counter . '">' . $name . '</button>
                           <ul class="list-unstyled ps-3 padding-left-0 collapse bg-white" id="catagoryId' . $counter . '" style="">';
              while ($row2 = mysqli_fetch_assoc($result2)) {
                $catagory_id = $row2['catagory_id'];
                $catagory_name = $row2['catagory_name'];
                echo '<li><a class="w-100 d-inline-flex align-items-center rounded w3-hover-text-theme" href="/eventbycatagory.php?catagory_id=' . $catagory_id . '" style="padding-left:20px">' . $catagory_name . '</a></li>';
              }
              echo '</ul>
                                  </li>';
            }
            $counter++;
          }

          ?>
        </ul>
      </nav>
      <div class="col-md-8">
        <div class="padding-header">
          <div class="header-section border w3-border-theme">
            <div class="title-event">
            <?php 
            if(isset($_GET["catagory_id"])){
              $catagoryId = $_GET["catagory_id"];
              $connect->set_charset('utf8');
              $sql = "SELECT * FROM `catagory` WHERE catagory_id =$catagoryId";
              $result = mysqli_query($connect, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                  $catagoryname = $row['catagory_name'];
              }
              echo $catagoryname;
          }
          else{
            echo "একটি ক্যাটাগরি নির্বাচন করুন ";
          }
            ?>
            </div>
            <span id="sidebarToggler" class="d-block d-md-none sidebarToggler border w3-border-theme w3-theme w3-hover-text-theme right-arrow text-center d-flex align-item-center justify-content-center"> &#8694;</span>
          </div>
        </div>
        <div style="overflow:hidden">
        <div class=" row accordion show-event-col pb-5" id="accordionExample">
            <?php include('partials/_handleEventByCatagory3.php') ?> 
          </div>
          </div>
      </div>
    </div>
  </div>

  <!-- include js file -->
  <script src="js/bootstrap.bundle.js"></script>
  <!-- <script src="js/main.js"></script> -->
  <script>
    var sidebarTogglerButton = document.querySelector("#sidebarToggler");
    var sidebarTogglerCloseButton = document.querySelector("#sidebarClose");
    var sideSlidingNav = document.querySelector("#sideNav");
    sidebarTogglerButton.addEventListener("click", () => {
      sideSlidingNav.classList.toggle('showsidenav');
      sidebarTogglerButton.style.zIndex = "99999999999";
    })
    sidebarTogglerCloseButton.addEventListener("click", () => {
      sideSlidingNav.classList.toggle('showsidenav');
      sidebarTogglerButton.style.zIndex = "99999999999";
    })
  </script>
  <?php include("partials/_footer.php") ?>
</body>

</html>