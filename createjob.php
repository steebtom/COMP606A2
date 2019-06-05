<?php

require "header.php";

?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./main.css">
</head>
<body>
<main>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Create and post a Job.</h1>
    <p class="lead">Get one of our community tradesmen for it.</p>

    <div class="wrapper-main">                                          
        <section class="section-default">

                                                                                     
            <form action="extra/createjobex.php" class="signup-form" method="post">
            <div><input class="createjob" type="text" name="loc" placeholder="Location"></div>
            <textarea rows="4" cols="19" class="createjob" name="descrip" placeholder="Description"></textarea>
            <div><input class="createjob" type="text" name="estcost" placeholder="Estimated Cost"></div>
            <div><input class="createjob" type="date" name="date" placeholder="Job Date"></div>
            <div><input class="createjob" type="date" name="lastdate" placeholder="Last Date for Application"></div>
            <div><button class="signupinp" type="submit" class="btn btn-outline-dark" name="createjobbtn">Create Job</button></div>
            
            </form>
        </section>

    </div>


  </div>
</div>
</main>
</body>