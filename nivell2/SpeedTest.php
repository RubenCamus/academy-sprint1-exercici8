<?php
require  __DIR__ . '/../nivell1/Velocimeter.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class SpeedTest extends TestCase {
    public static function speedProvider() {
        return [
            [9,"Molt lent"],
            [110,"Exces greu"],
            [40,"Velocitat adecuada"],
            [76,"Exces lleu"],
            [-53,"Molt lent"],
        ];
    }
    #[DataProvider('speedProvider')]
    public function testSpeed(int $num, string $expectedResult) {
        // Instantiate new class
        $velocimeter = new Velocimeter($num);
        $this->assertSame($expectedResult, $velocimeter->speedTest());
        //

    }
}
?>
