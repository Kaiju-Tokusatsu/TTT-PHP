<?php
/*



session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => true,
]);



*/
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Daniel Griffin">
   
    <title>Transdisciplinary Teamwork Tool [TTT]</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles -->
    <link href="ttt.css" rel="stylesheet">
  </head>

 <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">

    <h2>Transdisciplinary Teamwork Tool [TTT]</h2>
  </header>


<div  class="alert alert-danger">
  Welcome to the TD teamwork tool!  Please add some basic information before we find your teammates.
</div>


  <form action='ttt.php' method='post'>
   
  <div class="form-group">
    <label for="team">Which team are you in?</label>


    <select name="team" id="team" required>
      <option value="">--Please choose an option--</option>
      <option value="1">Team 1</option>
      <option value="2">Team 2</option>
      <option value="3">Team 3</option>
      <option value="4">Team 4</option>
      <option value="5">Team 5</option>
      <option value="6">Team 6</option>
      <option value="7">Team 7</option>
      <option value="8">Team 8</option>
      <option value="9">Team 9</option>
      <option value="10">Team 10</option>
    </select>

  </div>

    <div class="form-group">
    <label for="firstname">What is your firstname?</label>

    <input type="text" required name="firstname">

    </div>


 <div class="form-group">

    <label for="email">Your CHARM-EU email address</label>

    <input type="email" required name="email">
    
    </div>


 <div class="form-group">

    <label for="discipline">What is your Academic Background / Discipline?</label>
    
    <input type="text" required name="discipline"><br>

    <input type="submit" name="submit" value="Join your team!" class="btn btn-primary mb-2">

   </div>
  </form>

</body>
</html>
