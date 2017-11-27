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
  $randomNummer = random_int(1,3);
?>
<body>
  <div class="cups">
    <?php

      for ($i=0; $i < count($Cups); $i++) {
        if ($i == $randomNummer) {
          echo $Cups[$i]->show();
          echo $Ball->show();
        }

        else {
          echo $Cups[$i]->show();
        }
      }
    ?>
    <div class="clear"></div>
  </div>
  <?php echo $Player->show(); ?>
</body>
