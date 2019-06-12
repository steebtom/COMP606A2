<?php

require "header.php";
include_once("./extra/class/jobs.php");


?>
<head>
  <link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<body>
<main>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- <h1 class="display-4">Create and post a Job.</h1> -->
    <p class="lead">Welcome to workify</p>
    <p class="lead">Please select your job</p>
    <form action="sample.php" class="signup-form" method="post">

    <?php

      $job = new Jobs();
      $result = $job->displayjoblanding();

      if(!$result)
      {
        echo "<script>alert('Couldnt Create the Job'); </script>";
      }

    ?>

  </div>
</div>
</main>
</body>