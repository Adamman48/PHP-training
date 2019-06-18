<?php

require_once './Aircraft_abstract.php';
use Aircraft;

class SU35 extends Aircraft {
  private function __construct(int $ammoCapacity = 12, int $dmg = 50)
  {
    parent::__construct($ammoCapacity, $dmg);
  }

  private function getType() : string {
    return 'Sukhoi SU-35';
  }

  private function isPriority() : bool {
    return true;
  }
}

class J10 extends Aircraft {
  private function __construct(int $ammoCapacity = 8, int $dmg = 30) {
    parent::__construct($ammoCapacity, $dmg);
  }

  private function getType() : string {
    return 'Chengdu J-10';
  }

  private function isPriority() : bool {
    return false;
  }
}

?>