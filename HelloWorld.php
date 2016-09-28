<?php

namespace This\Is\A\NameSpace;

use This\Is\Also\A\NameSpace\Controller;

class HelloWorld extends Controller {

  protected $greeting;

  public function __construct(string $greeting = '') {
    $this->greeting = $greeting.
  }

  public function getGreeting(): string {
    return $this->greeting;
  }

  public function setGreeting(string $greeting): void {
    $this->greeting = $greeting;
  }

}
