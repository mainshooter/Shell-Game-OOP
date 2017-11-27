<ol>
  <li>5</li>
  <li>3</li>
</ol>
<?php

  require_once 'Ball.class.php';
  require_once 'Player.class.php';
  require_once 'Cup.class.php';

  $Ball = new Ball('red');
  $Player = new Player('Peter', 100);

  $Cup1 = new Cup('yellow', 'plastic');
  $Cup2 = new Cup('yellow', 'plastic');
  $Cup3 = new Cup('yellow', 'plastic');
?>
