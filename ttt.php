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

    <!-- Custom styles -->
    <link href="ttt.css" rel="stylesheet">

  </head>

 <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <header class="masthead mb-auto">

      <h2>Transdisciplinary Teamwork Tool [TTT]</h2>

      <div class="inner">
        <h3 class="masthead-brand">Discussion Topics</h3>

      </div>
    </header>


  <main role="main" class="inner cover">
   
  <div class="container">

<?php
require '../db_inc/db_conn.php';


//is this the first visit from this user

if (isset($_POST['firstname'])) {

  $team=$_POST['team'];
  $firstname=$_POST['firstname'];
  $discipline=$_POST['discipline'];


  $sql1 = "SELECT id FROM user WHERE firstname = '$firstname' AND discipline = '$discipline' AND team_id =  $team";
  $sql2 = "INSERT INTO user (firstname, discipline, team_id) VALUES ('$firstname', '$discipline', $team);";
 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else {

      $result = $conn->query($sql1);

          if ($result->num_rows > 0) {

            //duplicate record
            while($row = $result->fetch_assoc()) {

              $user = $row["id"];

            }
          }
          else {

              if ($conn->query($sql2) === TRUE) {
               // echo "New record created successfully";
                $user = mysqli_insert_id($conn);

              } else {

                echo "Error: " . $sql . "<br>" . $conn->error;
              }
          }
  }

  $conn->close();


  //TEMPORARY OUTPUT
  //echo('USER '. $user . '. TEAM '. $team. '. DISCIPLINE '. $discipline);
}


//has a new topic been added?
if ( (isset($_POST['team']))  && (isset($_POST['user'])) && (isset($_POST['topic'])) ){

  if (!(isset($user))) {
    $user=$_POST['user'];
  }

  $team=$_POST['team'];
  $newTopicText= ($_POST['topic']);

  $sql1 = "SELECT creator_id FROM topics WHERE (creator_id = $user AND topic_text = '$newTopicText')";

  $sql2 = "INSERT INTO topics (creator_id, team_id, status, topic_text) VALUES ($user, $team, 1, '$newTopicText')";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $result = $conn->query($sql1);

    if ($result->num_rows > 0) {

      //duplicate record

    }
    else {

        if ($conn->query($sql2) === TRUE) {
          echo "New record created successfully";

        } else {

          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


$conn->close();



//  NOT D.R.Y  - full implementation should move this to a class.


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM topics where team_id=0 OR team_id='".$team."'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
    //header
    echo "<div class='row alert alert-danger'><div class='col-sm'>DISCUSSION TOPIC</div><div class='col-sm'>MY PREVIOUS EXPERIENCE</div><div class='col-sm'>MY SENTIMENT</div>   <div class='col-sm'>MY TEAM AVERAGE </div></div>";

    // output data of each row
    while($row = $result->fetch_assoc()) {

      //last default CHARM PLO topic, so we switch presentation style
      if ($row["id"] > 7) {
        $output = "<div class='row alert alert-success'><div class='col-sm'>" . $row["topic_text"]. "</div><div class='col-sm'><input name='topic".$row["id"]."' id='topicSentiment_".$row["id"]."' type='range' min='1' max='5' value='1' onChange='getTeamSentiments(".$row["id"].")' > </div><div class='col-sm'><img alt='smilie' class='small' id='user_sentiment_img".$row["id"]."' src='assets/smilies/undefined.png'> </div>   <div class='col-sm'><img alt='smilie' class='small' id='team_sentiment_img_".$row["id"]."' src='assets/smilies/undefined.png'> </div></div>";
      }
      else {
        $output = "<div class='row alert alert-info'><div class='col-sm'>" . $row["topic_text"]. "</div><div class='col-sm'><input name='topic".$row["id"]."' id='topicSentiment_".$row["id"]."' type='range' min='1' max='5' value='1' onChange='getTeamSentiments(".$row["id"].")' > </div><div class='col-sm'><img alt='smilie' class='small' id='user_sentiment_img".$row["id"]."' src='assets/smilies/undefined.png'> </div>   <div class='col-sm'><img alt='smilie' class='small' id='team_sentiment_img_".$row["id"]."' src='assets/smilies/undefined.png'> </div></div>";
      }

      echo $output;

    }
  } else {
    echo "Error: 0 results.";
  }
  $conn->close();

}

elseif ( (isset($_POST['team']))  && (isset($user)) ){


$team = $_POST['team'];


  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM topics where team_id=0 OR team_id='".$team."'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    
    //header
    echo "<div class='row alert alert-danger'><div class='col-sm'>DISCUSSION TOPIC</div><div class='col-sm'>HOW WELL DOES MY BACKGROUND PREPARE ME FOR THIS</div><div class='col-sm'>MY SENTIMENT</div>   <div class='col-sm'>MY TEAM AVERAGE </div></div>";

    // output data of each row
    while($row = $result->fetch_assoc()) {

      //last default topic, so we switch presentation style
      if ($row["id"] > 7) {
        $output = "<div class='row alert alert-success'><div class='col-sm'>" . $row["topic_text"]. "</div><div class='col-sm'><input name='topicSlider".$row["id"]."' id='topicSentiment_".$row["id"]."' type='range' min='1' max='5' value='1' onChange='setUserSentiment(".$row["id"]."); getTeamSentiments(".$row["id"].");' > </div><div class='col-sm'><img alt='smilie' class='small' id='user_sentiment_img".$row["id"]."' src='assets/smilies/undefined.png'> </div>   <div class='col-sm'><img alt='smilie' class='small' id='team_sentiment_img_".$row["id"]."' src='assets/smilies/undefined.png'> </div></div>";
      }
      else {
        $output = "<div class='row alert alert-info'><div class='col-sm'>" . $row["topic_text"]. "</div><div class='col-sm'><input name='topicSlider".$row["id"]."' id='topicSentiment_".$row["id"]."' type='range' min='1' max='5' value='1' onChange='setUserSentiment(".$row["id"]."); getTeamSentiments(".$row["id"].");' > </div><div class='col-sm'><img alt='smilie' class='small' id='user_sentiment_img".$row["id"]."' src='assets/smilies/undefined.png'> </div>   <div class='col-sm'><img alt='smilie' class='small' id='team_sentiment_img_".$row["id"]."' src='assets/smilies/undefined.png'> </div></div>";
      }

      echo $output;

    }
  } else {
    echo "Error: 0 results.";
  }
  $conn->close();



}

else { die('... MISSING PARAMETER DATA ...'); }



?> 

</div>
</main>

<div>
  <h4>Add your own team topic here </h4>

  <form action="ttt.php" method="post">
    
    <input type="textarea" name="topic" required />

    <input type="hidden" name="user" value="<?php echo $user; ?>" />
    <input type="hidden" name="team" value="<?php echo $team; ?>" />

    <input type="submit" name="submit" value="Share this with my team" />

  </form> 
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="text/javascript">
    
  function getTeamSentiments(topicID){

    var tempUserSliderValue = document.getElementById('topicSentiment_'+topicID).value;

    var pathUser = 'assets/smilies/'+tempUserSliderValue+'.png';

    //update the user src
    document.getElementById('user_sentiment_img'+topicID).src = pathUser;

 
    //get_average_topic_sentiment.php  (topic id , team id)
    var url = "get_average_topic_sentiment.php?team=<?php echo $team; ?>&question_id="+topicID+"&userdefault="+tempUserSliderValue;

    console.log(url);
    const xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

          var HTTPresponseText = this.responseText;

          HTTPresponseText = HTTPresponseText.trim();

          var pathTeam = 'assets/smilies/'+ HTTPresponseText +'.png';

          document.getElementById('team_sentiment_img_'+topicID).src = pathTeam;

          //console.log('assets/smilies/'+ this.responseText +'.png');

      }
    }
  }

  function setUserSentiment(topicID){



    var tempUserSliderValue = document.getElementById('topicSentiment_'+topicID).value;

    //set_topic_sentiment.php  (team, user, question_id, sentimentValue)

    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", "set_topic_sentiment.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('team=<?php echo $team; ?>&user=<?php echo $user; ?>&question_id='+topicID+'&topicSentiment='+tempUserSliderValue+''); 
    //console.log('POST DATA: team=<?php echo $team; ?>&user=<?php echo $user; ?>&question_id='+topicID+'&topicSentiment='+tempUserSliderValue+''); 
  }


  </script>

</body>
</html>
