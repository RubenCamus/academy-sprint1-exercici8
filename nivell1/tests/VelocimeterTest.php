<?php
require  __DIR__ . '/../exercici2/Velocimeter.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;


Class VelocimeterTest extends TestCase {
    public function testSpeed() {
        // Instantiate new class
        $velocimeter = new Velocimeter(99);
        $this->assertSame("Exces moderat", $velocimeter->speedTest());
        //
    }
}

?>
