<?php

abstract class Aircraft {
  protected $maxAmmo;
  protected $currentAmmo;
  protected $baseDamage;

  protected function __construct()
  {

  }

  protected function fight() : int
  {
    (int) $dmgDealt = $this->currentAmmo * $this->baseDamage;
    $this->currentAmmo = 0;
    return $dmgDealt;
  }

  protected function refill(int $ammoStash) : int 
  {
    
  }

}

?>