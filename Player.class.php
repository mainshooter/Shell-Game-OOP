<?php

  class Player {
    private $name;
    private $amount;

    private $Score;

    /**
     * Sets the playername and the amount
     * @param string $playerName [The name of the player]
     * @param int    $amount     [The amount we have to spend]
     */
    public function __construct($playerName, $amount) {
      $this->name = $playerName;
      $this->amount = $amount;

      $this->Score = new Score($this->name);
    }

    public function removeOnePoint() {
      $this->Score->setAmount($this->Score->getAmount() - 1);
    }

    public function addOnePoint() {
      $this->Score->setAmount($this->Score->getAmount() + 1);
    }

    public function getPlayerName() {
      return($this->name);
    }

    public function show() {
      return("
      <div class='player'>
        <strong>{$this->name}:{$this->Score->getAmount()}</strong>
      </div>
      ");
    }
  }


?>
