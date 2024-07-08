<?php
require '../db_inc/db_conn.php';

//check that we've got a team ID
if( (isset($_POST['team'])) && (isset($_POST['user'])) && (isset($_POST['question_id'])) && (isset($_POST['topicSentiment'])) ){


  $team=$_POST['team'];
  $user=$_POST['user'];
  $question_id=$_POST['question_id'];
  $sentimentValue= ($_POST['topicSentiment']);



    // user_session table stores the state and transaction history by recording all changes.  Latest record = state.

    $sql = "INSERT INTO user_session (interaction_id, user_id, team_id, question_id, sentiment_score) VALUES (NULL, $user, $team, $question_id, $sentimentValue);";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

}

else {
  //echo('no parameters supplied');  

  /*


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Save sentiments</title>
</head>
<body>

<form action="set_topic_sentiment.php" method="post">
  
  TEAM <input type="text" name="team"> <br>

  USER <input type="text" name="user"> <br>

  QUESTION ID <input type="text" name="question_id"> <br>

  SENTIMENT <input type="text" name="topicSentiment"> <br>

  <input type="submit" name="submit" value="Add test data">

</form>

</body>
</html>


*/

}


?>
