<?php
  session_start();
  include 'view.php';
?>
<!-- <ol>
  <li>5</li>
  <li>3</li>
</ol> -->
<?php

  require_once 'Ball.class.php';
  require_once 'Player.class.php';
  require_once 'Cup.class.php';
  require_once 'Score.class.php';
  require_once 'Game.class.php';

  $amountOfCups = 5;
  $Game = new Game($amountOfCups, 'yellow', 2);

  $Player[] = new Player('Peter', 20);
  $Player[] = new Player('Yara', 20);
?>
<body>
  <?php

  if (ISSET($_GET['choose'])) {
    $currentBallLocations = $Game->getBallPositions();
    $chosenNumber = $_GET['choose'] - 1;
    if (ISSET($_GET['playerID'])) {
      // We have multiple players
      $pointRun = false;
      for ($i=0; $i < count($currentBallLocations); $i++) {
        if ($currentBallLocations == $chosenNumber) {
          // Correct
          $Player[$_GET['playerID']]->addOnePoint();
          $pointRun = true;
          break;
        }
        else {
          $pointRun = false;
        }
      }
      if ($pointRun == false) {
        // We remove one point because we didn't chose the right one
        $Player[$_GET['playerID']]->removeOnePoint();
      }
    }
    $Game->showCupContent($chosenNumber);
    echo $Game->renderField();
    echo $Player[$_GET['playerID']]->show();
  }

  else {
    echo $Game->renderField();
    if (ISSET($_GET['playerID'])) {
      echo $Player[$_GET['playerID']]->show();
    }
  }

  for ($i=1; $i < $amountOfCups + 1; $i++) {
    if (ISSET($_GET['playerID'])) {
      echo '<a href="?playerID=' . $_GET['playerID'] . '&choose=' . $i . '"><button type="button">' . $i . '</button></a>';
    }
    else {
      echo '<a href="?playerID=0&choose=' . $i . '"><button type="button">' . $i . '</button></a>';
    }

  }
  echo "<br>";
  for ($i=0; $i < count($Player); $i++) {
    $playerName = $Player[$i]->getPlayerName();
    echo "<a href='?playerID={$i}'>Choose: {$playerName}</a>";
    echo "<br>";
  }
  ?>

  <a href="?restart=true">Herstart</a>

</body>
