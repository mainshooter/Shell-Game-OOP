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
  $Cups = [
    new Cup('yellow', 'plastic'),
    new Cup('yellow', 'plastic'),
    new Cup('yellow', 'plastic'),
  ];
  $Cups[0]->liftUp();
?>
<body>
  <div class="cups">
    <?php echo $Cups[0]->show(); ?>
    <?php echo $Ball->show(); ?>

    <?php echo $Cups[1]->show(); ?>
    <?php echo $Cups[2]->show(); ?>
    <div class="clear"></div>
  </div>
  <?php echo $Player->show(); ?>
</body>
