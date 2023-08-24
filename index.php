<?php
require_once('app/controller/calendar.php');
$calendar = new Calendar();
$data = $calendar->index();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
      .red{
        color:red !important;
        text-align:center !important;
      }
      .black{
        color: black !important;
        text-align:center !important;
      }
      .month{
        font-size: 170%;
        color:red !important;
        text-align:left;
        vertical-align: bottom;
      }
      .year{
        font-size: 120%;
        color:black !important;
        text-align:right;
        vertical-align: bottom;
      }
    </style>
  </head>
  <body class='container'>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <?php
        require_once('app/view/calendar.php');
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <?php
        require_once('app/view/form.php');
      ?>
    </div>
  </div>
  </body>
</html>