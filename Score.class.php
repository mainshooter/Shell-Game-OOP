<?php

  class Score {
    private $amountPerGame;
    private $playerName;

    /**
     * Checks if we have a session of that player and gives the score to the object from the session
     * @param [string] $playerName [The name of the player wich we need to check]
     */
    public function __construct($playerName) {
      $this->playerName = $playerName;
      if (ISSET($_SESSION[$this->playerName]['amount']) && $_SESSION[$this->playerName]['amount'] > 0) {
        // We have the amount on our session
        $this->setAmount($_SESSION[$this->playerName]['amount']);
      }

      else if (ISSET($_SESSION[$this->playerName]['amount']) && $_SESSION[$this->playerName]['amount'] == 0) {
        // We reset the score
        $this->setAmount(20);
      }
      else {
        $this->setAmount(20);
      }
    }

    /**
     * Updates the session with our score amount
     */
    private function amountHandler() {
      $_SESSION[$this->playerName]['amount'] = $this->getAmount();
    }

    /**
     * Sets the amount to our property
     * @param [int] $amount [Our current lives]
     */
    public function setAmount($amount) {
      $this->amountPerGame = $amount;
    }

    /**
     * Returns our current amount from our property
     * @return [int] [The current amount]
     */
    public function getAmount() {
      return($this->amountPerGame);
    }

    /**
     * At the end of our script we set our score in the session
     */
    public function __destruct() {
      $this->amountHandler($this->getAmount());
    }
  }


?>
