<?php

abstract class Aircraft {
  protected $maxAmmo;
  protected $currentAmmo;
  protected $baseDamage;

  protected function __construct(int $ammoCapacity, int $dmg)
  {
    (int) $this->maxAmmo = $ammoCapacity;
    (int) $this->currentAmmo = 0;
    (int) $this->baseDamage = $dmg;
  }

  protected function fight() : int
  {
    (int) $dmgDealt = $this->currentAmmo * $this->baseDamage;
    $this->currentAmmo = 0;
    return $dmgDealt;
  }

  protected function refill(int $ammoStash) : int 
  { 
    (int) $ammoNeeded = $this->maxAmmo - $this->currentAmmo;
    (int) $remainingAmmo = $ammoStash - $ammoNeeded;

    if ($remainingAmmo >= $ammoNeeded) 
    {
      $this->currentAmmo = $this->maxAmmo;
      return $remainingAmmo;
    } elseif ($remainingAmmo < $ammoNeeded && $remainingAmmo > 0) 
    {
      $this->currentAmmo += $remainingAmmo;
      return $remainingAmmo;
    } else 
    {
      $this->currentAmmo += $ammoStash;
      return 0;
    }
  }

  protected function getStatus() : string 
  {
    $maxDmgOutput = $this->currentAmmo * $this->baseDamage;
    return "Type: {$this->getType}\nAmmo: {$this->currentAmmo}\nBase Damage: {$this->baseDamage}\nAll Damage: $maxDmgOutput}\n";
  }

  abstract protected function getType() : string;

  abstract protected function isPriority() : bool;
}

?>