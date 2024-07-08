<?php

require '../db_inc/db_conn.php';


//check that we've got a team ID
if( (isset($_GET['team']))  && (isset($_GET['question_id'])) ){


$team=$_GET['team'];
$question_id=$_GET['question_id'];
$userCurrentValue=$_GET['userdefault'];


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT COUNT(user_id) AS tmp_userCount, SUM(sentiment_score) AS tmp_teamTotalSentiment FROM user_session WHERE team_id =". $team . " AND question_id =". $question_id . " ORDER BY interaction_id DESC LIMIT 1" ;

  //die($sql);

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    

    // output data of each row
    while($row = $result->fetch_assoc()) {

      if ($row["tmp_userCount"] > 0) {

        $teamAverage = round(  $row["tmp_teamTotalSentiment"]  /   $row["tmp_userCount"] );
  
      } else {
        //First reponse from a team member on this topic, wait for teammate inputs... average is an average of one team member
        
        $teamAverage = $userCurrentValue;
      }

      echo $teamAverage;

    }

  } 
  else {
    echo "Error: 0 results.  ";
  }

  $conn->close();

}
else {

//No parameters submitted, so render the test form instead


/*

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Get sentiments</title>
</head>
<body>

<!--
<form action="get_average_topic_sentiment.php" method="get">
  
  TEAM <input type="text" name="team"> <br>
  QUESTION ID <input type="text" name="question_id"> <br>

  <input type="submit" name="submit" value="check with test data">

</form>
-->


</body>
</html>


*/

}
?>








