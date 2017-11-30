<?php
  session_start();
  include 'view.php';
  var_dump($_SESSION);
?>
<ol>
  <li>5</li>
  <li>3</li>
</ol>
<?php

  require_once 'Ball.class.php';
  require_once 'Player.class.php';
  require_once 'Cup.class.php';
  require_once 'Game.class.php';

  $Game = new Game();
  $Ball = new Ball('red');
  $Player = new Player('Peter', 100);
  $Cups = [
    new Cup('yellow', 'plastic'),
    new Cup('yellow', 'plastic'),
    new Cup('yellow', 'plastic'),
  ];
  $randomNummer = random_int(0,2);
?>
<body>
  <?php

  if (ISSET($_GET['choose'])) {
    $chosenNumber = $_GET['choose'] - 1;
    $Cups[$chosenNumber]->liftUp();
    generateField();
    if ($randomNummer != $_GET['choose']) {
      // No eachal to each other one point off!
      $Game->setAmount($Game->getAmount()-1);
    }
  }

  else {
      generateField();
  }
  function generateField() {
    global $Cups;
    global $Player;
    global $Ball;
    global $randomNummer;
    global $Game;

    echo '<div class="cups">';

    for ($i=0; $i < count($Cups); $i++) {
      if ($i == $randomNummer) {
        echo $Cups[$i]->show();
        echo $Ball->show();
        echo "</div>";
      }

      else {
        echo $Cups[$i]->show();
        echo "</div>";
      }
    }
    echo '</div><div class="clear"></div>';
      echo $Player->show();
      echo "Points: " . $Game->getAmount();
  }

  ?>
  <a href="?choose=1"><button type='button'>1</button></a>
  <a href="?choose=2"><button type='button'>2</button></a>
  <a href="?choose=3"><button type='button'>3</button></a>
  <a href="?">Herstart</a>

</body>
