<?php
include_once(dirname(__FILE__) . '/../AbstractClass/Fruit.php');

class Orange extends fruit {
    public function howToEat() {
        return "Orange could be juiced";
    }
}
