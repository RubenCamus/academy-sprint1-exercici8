<?php
require  __DIR__ . '/../nivell1/NumberChecker.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
class NumTest extends TestCase {
    public static function numberProvider() {
        return [
            [9,true,false],
            [12,true,true],
            [0,false, true],
            [-1734, false,true],
            [-53,false,false],
        ];
    }
    #[DataProvider('numberProvider')]
    public function testNumber(int $num, bool $expectedPositive, bool $expectedEven) {
        // Instantiate new class
        $numChecker = new NumberChecker($num);
        $this->assertSame($expectedEven, $numChecker->isEven());
        $this->assertSame($expectedPositive, $numChecker->isPositive());
        //

    }
}

?>
