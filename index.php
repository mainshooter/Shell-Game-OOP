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

  $amountOfCups = 3;
  $Game = new Game($amountOfCups, 'yellow', 2);

  $Player[] = new Player('Peter', 20);
  $Player[] = new Player('Yara', 20);
  $Player[] = new Player('Sander', 20);
?>
<body>
  <?php

  if (ISSET($_GET['choose'])) {
    $currentBallLocations = $Game->getBallPositions();
    $chosenNumber = $_GET['choose'] - 1;
    if (ISSET($_GET['playerID'])) {
      // We have multiple players
      $Game->managerScore($Player[$_GET['playerID']], $chosenNumber);
    }
    else {
      $Game->managerScore($Player[0], $chosenNumber);
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
    else {
      $Player[0]->show();
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


</body>
