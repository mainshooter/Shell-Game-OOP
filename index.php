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

  $Game = new Game(3, 'yellow', 2);

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


  ?>
  <a href="?choose=1"><button type='button'>1</button></a>
  <a href="?choose=2"><button type='button'>2</button></a>
  <a href="?choose=3"><button type='button'>3</button></a>
  <a href="?restart=true">Herstart</a>

</body>
