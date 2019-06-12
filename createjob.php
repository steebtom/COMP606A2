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
            <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="text" name="loc" placeholder="Location" required></div></div>
            <div class="form-group row"><div class="col-xs-4"><textarea class="form-control" rows="4" cols="100" class="createjob" name="descrip" placeholder="Description" required></textarea></div></div>
            <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="text" name="estcost" placeholder="Estimated Cost" required></div></div>
            <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="date" name="date" placeholder="Job Date" required></div></div>
            <div class="form-group row"><div class="col-xs-4"><input class="form-control" type="date" name="lastdate" placeholder="Last Date for Application" required></div></div>
            <button class="btn btn-success" type="submit" class="btn btn-outline-dark" name="createjobbtn">Create Job</button></div>
            
            </form>
        </section>

    </div>


  </div>
</div>
</main>
</body>