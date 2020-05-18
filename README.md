# LopAnimalVaInterfaceEdible
Để dễ dàng gọi (sử dụng) phương thức makeSound() của các đối tượng mô phỏng động vật, tạo lớp trừu tượng Animal.

Triển khai lớp Chicken và Tiger là lớp con của lớp Animal.

Để dễ dàng gọi (sử dụng) phương thức howToEat() của các đối tượng “ăn được”, tạo interface Edible. Cho lớp Chicken triển khai interface Edible.

Tạo lớp trừu tượng Fruit để mô phỏng các đối tượng “trái cây”, cũng là một Edible. Triển khai các lớp con Orange và Apple.

Giản đồ UML được thể hiện như sau:



Hướng dẫn
Bước 1: Xây dựng lớp Animal, Tiger, và Chicken

Lớp Animal: Tạo mới thư mục AbstractClass, trong đó tạo tệp PHP với tên Animal.php

<?php
abstract class Animal
{
    abstract public function makeSound();
}

Lớp Tiger: Tạo mới thư mục Animals, trong đó tạo mới tệp PHP với tên Tiger.php


<?php
include_once(dirname( __FILE__ ) . '/../AbstractClass/Animal.php');
class Tiger extends Animal
{
    public function makeSound()
    {
        return "Tiger: roarrrrr!";
    }
}
Lớp Chicken: Trong thư mục Animals  tạo mới tệp với tên Chicken

<?php
include_once(dirname( __FILE__ ) . '/../AbstractClass/Animal.php');
class Chicken extends Animal
{
    public function makeSound()
    {
        return "Chicken: cluck-cluck!";
    }
}
Tại thư mục gốc tạo mới tệp với tên AbtractAndInterfaceTest để chạy thử.

<?php
include('Animals/Chicken.php');
include('Animals/Tiger.php');

echo ('---- Animals<br>');
$animals[0] = new Tiger();
$animals[1] = new Chicken();

foreach ($animals as $animal) {
     echo $animal->makeSound(). '<br>';
}
Bước 2: Xây dựng  interface là Edible:

Tạo mới thư mục InterfaceClass, tạo tệp PHP mới với tên Edible.php

<?php
interface Edible
{
    public function howToEat();
}

Sửa lại tệp Chicken.php

<?php
include_once(dirname( __FILE__ ) . '/../AbstractClass/Animal.php');
include_once(dirname( __FILE__ ) . '/../InterfaceClass/Edible.php');

class Chicken extends Animal implements Edible
{
    public function makeSound()
    {
        return "Chicken: cluck-cluck!";
    }

    public function howToEat()
    {
        return "could be fried";
    }
}

Sửa lại tệp AbtractAndInterfaceTest và chạy thử để xem kết quả.

<?php
include('Animals/Chicken.php');
include('Animals/Tiger.php');

echo ('---- Animals
');
$animals[0] = new Tiger();
$animals[1] = new Chicken();

foreach ($animals as $animal) {
       echo $animal->makeSound(). ' ';
       if ($animal instanceof Chicken) {
           echo $animal->howToEat(). ' ';
       }
}
Bước 3: Xây dựng lớp Fruit, Apple và Orange.

Trong thư mục AbstractClass, tạo tệp PHP với tên Fruits.php

<?php
include_once(dirname(__FILE__) . '/../InterfaceClass/Edible.php');

abstract class Fruit implements Edible
{
}

Tạo thư mục Fruits, trong đó tạo tệp tin Apple.php có mã như sau:

<?php
include_once(dirname(__FILE__) . '/../AbstractClass/Fruit.php');

class Apple extends Fruit
{
    public function howToEat()
    {
        return "Apple could be slided";
    }
}

Trong thư mục Fruits, tạo mới tệp Orange.php với mã như sau:

<?php
include_once(dirname(__FILE__) . '/../AbstractClass/Fruit.php');

class Orange extends Fruit
{

    public function howToEat()
    {
        return "Orange could be juiced";
    }
}

Sửa lại tệp AbtractAndInterfaceTest và chạy thử để xem kết quả.

<?php
include('Animals/Chicken.php');
include('Animals/Tiger.php');
include('Fruits/Apple.php');
include('Fruits/Orange.php');

echo ('---- Animals<br>');

$animals[0] = new Tiger();
$animals[1] = new Chicken();

foreach ($animals as $animal) {
    echo $animal->makeSound() . '<br>';

    if ($animal instanceof Chicken) {
        echo $animal->howToEat() . '<br>';
    }
}

echo ('---- Fruits<br>');

$fruits[0] = new Apple();
$fruits[1] = new Orange();

foreach ($fruits as $fruit) {
    echo $fruit->howToEat() . '<br>';
}
Chạy và quan sát chương trình.

Mã nguồn tham khảo: https://github.com/codegym-vn/abstract-animal-interface-edible.git
