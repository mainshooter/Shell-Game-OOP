<?php

  class Cup {
    private $color;
    private $type;
    private $status;
    private $containingBall = null;

    /**
     * Sets the color of the cup
     * @param string $color [description]
     */
    public function __construct(string $color, string $type) {
      $this->color = $color;
      $this->type = $type;
      $this->liftDown();
    }

    public function show() {
      return("<div class='cup {$this->color} {$this->status}'>");
    }

    /**
     * Lifst the cup up
     */
    public function liftUp() {
      $this->status = 'liftup';
    }

    /**
     * Puts the cub down
     */
    public function liftDown() {
      $this->status = 'liftdown';
    }
  }


?>
