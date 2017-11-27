<?php include 'view.php'; ?>
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
<body>
  <div class="cups">
    <?php echo $Cup1->show(); ?>
    <?php echo $Ball->show(); ?>

    <?php echo $Cup2->show(); ?>
    <?php echo $Cup3->show(); ?>
    <div class="clear"></div>
  </div>
  <?php echo $Player->show(); ?>
</body>
