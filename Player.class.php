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

    /**
     * Removes one point of the score of a player
     * @return [type] [description]
     */
    public function removeOnePoint() {
      $this->Score->setAmount($this->Score->getAmount() - 1);
    }

    /**
     * Adds one point to the score of a player
     */
    public function addOnePoint() {
      $this->Score->setAmount($this->Score->getAmount() + 1);
    }

    /**
     * Gets the current name of the player in the object and returns it
     * @return [string] [The name of the player]
     */
    public function getPlayerName() {
      return($this->name);
    }

    /**
     * Presents the view of the player and returns the view
     * @return [string] [The view of the player]
     */
    public function show() {
      return("
      <div class='player'>
        <strong>{$this->name}:{$this->Score->getAmount()}</strong>
      </div>
      ");
    }
  }


?>
