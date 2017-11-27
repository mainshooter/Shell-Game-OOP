<?php

  class Player {
    private $name;
    private $amount;

    /**
     * Sets the playername and the amount
     * @param string $playerName [The name of the player]
     * @param int    $amount     [The amount we have to spend]
     */
    public function __construct(string $playerName, int $amount) {
      $this->name = $playerName;
      $this->amount = $amount
    }
  }


?>
