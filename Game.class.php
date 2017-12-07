<?php
  require_once 'Cup.class.php';
  require_once 'Ball.class.php';
  require_once 'Player.class.php';

  class Game {
    private $Cups;
    private $Ball;
    private $Player;
    private $Score;

    private $ballLocation;

    public function __construct($sizeOfCups, $color) {
      for ($i=0; $i < $sizeOfCups; $i++) {
        $this->Cups[] = new Cup($color, 'Cup');
        $this->Cups[$i]->liftDown();
      }
      $this->Ball = new Ball('red');
      $this->Player = new Player('Peter', 20);
      $this->Score = new Score();
      $this->Score->setAmount(20);
      $this->ballLocation = $this->randomBallPosition();
    }

    public function renderField() {
      $renderResult = '<div class="cups">';

      for ($i=0; $i < count($this->Cups); $i++) {
        if ($i == $this->ballLocation) {
          $renderResult .= $this->Cups[$i]->show();
          $renderResult .= $this->Ball->show();
          $renderResult .= "</div>";
        }

        else {
          $renderResult .= $this->Cups[$i]->show();
          $renderResult .= "</div>";
        }
      }
      $renderResult .= '</div><div class="clear"></div>';
        $renderResult .= $this->Player->show();
        $renderResult .= "Points: " . $this->Score->getAmount();
        return($renderResult);
    }

    public function showCupContent($CupNumber) {
      $this->Cups[$CupNumber]->liftUp();
    }

    public function getBallPosition() {
      return($this->ballLocation);
    }

    private function randomBallPosition() {
      $ballLocation = random_int(0,count($this->Cups));
      return($ballLocation);
    }
  }


?>
