<?php

  class Game {
    private $amountPerGame;

    /**
     * Sets the amount of our socre good
     */
    public function __construct() {
      if (ISSET($_SESSION['amount']) && $_SESSION['amount'] > 0) {
        // We have the amount on our session
        $this->setAmount($_SESSION['amount']);
      }

      else if ($_SESSION['amount'] == 0) {
        // We reset the score
        $this->setAmount(20);
      }

      else {
        $_SESSION['amount'] = 20;
        $this->setAmount(20);
      }
    }

    /**
     * Updates the session with our score amount
     */
    private function amountHandler() {
      $_SESSION['amount'] = $this->getAmount();
    }

    /**
     * Sets the amount to our property
     * @param [int] $amount [Our current lives]
     */
    public function setAmount($amount) {
      $this->amountPerGame = $amount;
      // $this->amountHandler();
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
