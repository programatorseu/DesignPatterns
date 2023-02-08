<?php 
interface Shape {
    function draw();
}
class Circle implements Shape {

    public function draw() {
        return "Drawing Circle";
    }
}
abstract class ShapeDecorator implements Shape{
    protected $shape;
    public function __construct(Shape $shape)
    {
        $this->shape = $shape;
    }
    abstract function draw();
}

class BorderShape extends ShapeDecorator {
    public function draw() {
        $result = $this->shape->draw();
        return "$result has border";
    }
}
class RedShape extends ShapeDecorator {
    public function draw() {
        $result = $this->shape->draw();
        return "$result is red";
    }
}

$circle = new Circle();
$circle = new BorderShape($circle);
$circle = new RedShape($circle);
echo $circle->draw();