<?php

  class Cup {
    private $color;
    private $type;

    /**
     * Sets the color of the cup
     * @param string $color [description]
     */
    public function __construct(string $color, string $type) {
      $this->color = $color;
      $this->type = $type;
    }

    public function show() {
      return("<div class='cup {$this->color} liftup'></div>");
    }

    /**
     * Lifst the cup up
     */
    public function liftUp() {

    }

    /**
     * Puts the cub down
     */
    public function liftDown() {

    }
  }


?>
