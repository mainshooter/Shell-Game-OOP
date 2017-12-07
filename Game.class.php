<?php
  require_once 'Cup.class.php';
  require_once 'Ball.class.php';
  require_once 'Player.class.php';

  class Game {
    private $Cups;
    private $Ball;

    private $ballLocation;

    /**
     * Prepairs the object for the Cups and the Balls
     * @param [INT] $sizeOfCups    [How much Cups we want in the game]
     * @param [string] $color         [The name of the color you want the cup to be]
     * @param [int] $amountOfBalls [How many balls there needs to be]
     */
    public function __construct($sizeOfCups, $color, $amountOfBalls) {
      for ($i=0; $i < $sizeOfCups; $i++) {
        $this->Cups[] = new Cup($color, 'Cup');
        $this->Cups[$i]->liftDown();
      }
      $this->Ball = new Ball('red');
      for ($i=0; $i < $amountOfBalls; $i++) {
        $this->ballLocation[] = $this->randomBallPosition();
      }
    }

    /**
     * Renders the view of the game and returns it
     * @return [string] [The html code to see the game]
     */
    public function renderField() {
      $renderResult = '<div class="cups">';

      for ($i=0; $i < count($this->Cups); $i++) {
        $renderResult .= $this->Cups[$i]->show();
        for ($t=0; $t < count($this->ballLocation); $t++) {
          if ($i == $this->ballLocation[$t]) {
            $renderResult .= $this->Ball->show();
          }
        }
        $renderResult .= "</div>";
      }
      $renderResult .= '</div><div class="clear"></div>';
        return($renderResult);
    }

    /**
     * Mangegs the score and asign point to a player object
     * @param  [object] $Player             [The object Player that we need to manger the score for]
     * @param  [int] $chozenBallLocation [The ball location the client has chosen]
     */
    public function managerScore($Player, $chozenBallLocation) {
      $pointRun = false;
      $currentBallLocations = $this->getBallPositions();
      for ($i=0; $i < count($currentBallLocations); $i++) {
        if ($currentBallLocations == $chozenBallLocation) {
          // Correct
          $Player->addOnePoint();
          $pointRun = true;
          break;
        }
        else {
          $pointRun = false;
        }
      }
      if ($pointRun == false) {
        // No point added
        $Player->removeOnePoint();
      }
    }

    /**
     * Changed position to be up of the chosen cup
     * @param  [int] $CupNumber [The number of the chozen cup]
     */
    public function showCupContent($CupNumber) {
      $this->Cups[$CupNumber]->liftUp();
    }

    /**
     * Returns all the position of the balls
     * @return [array] [A array with all position of the balls]
     */
    public function getBallPositions() {
      return($this->ballLocation);
    }

    /**
     * Generate a random number that you use to chose a random position of the ball(s)
     * The number is minimum 0 and maximum how many cups we have.
     * @return [int] [The generated location]
     */
    private function randomBallPosition() {
      $ballLocation = random_int(0,count($this->Cups));
      return($ballLocation);
    }
  }


?>
