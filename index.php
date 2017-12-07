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

?>
<body>
  <?php

  if (ISSET($_GET['choose'])) {
    $chosenNumber = $_GET['choose'] - 1;
    $Game->showCupContent($chosenNumber);
    echo $Game->renderField();
  }

  else {
    echo $Game->renderField();
  }

  for ($i=1; $i < $amountOfCups + 1; $i++) {
    echo '<a href="?choose=' . $i . '"><button type="button">' . $i . '</button></a>';
  }
  ?>

  <a href="?restart=true">Herstart</a>

</body>
