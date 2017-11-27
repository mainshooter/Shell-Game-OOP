<?php

  class Ball {
    private $color;
    private $type;

    /**
     * Runs when the class is istanceerd and sets the color
     * @param [string] $color [Our color]
     * @param [string] $type [The material of the cub]
     */
    public function __construct(string $color) {
      $this->color = $color;
    }

    public function show() {
      return("<div class='ball {$this->color}'></div>");
    }
  }


?>
