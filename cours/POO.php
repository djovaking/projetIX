<?php
interface IntVehicule{
    public function accelerate();
}
class Vehicule{
    public $speed = 0;
    public $gear = 0;

    public function upGear(){
        $this->gear++;
    }
    public function downGear(){
        $this->gear--;
    }
}

final class Moto extends Vehicule implements IntVehicule{
    public function accelerate(){
        $this->speed += 2;
    }
}

final class Car extends Vehicule implements IntVehicule {
    public function accelerate(){
        $this->speed += 1;
    }
}