<?php

require  __DIR__ . '/NumberChecker.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class NumberCheckerTest extends TestCase {

    public function testEven() {
        $this->assertSame(true, new NumberChecker(10)->isEven());
        $this->assertSame(false, new NumberChecker(9)->isEven());
    }
    public function testPositive() {
        $this->assertSame(true, new NumberChecker(99)->isPositive());
        $this->assertSame(false, new NumberChecker(-100)->isPositive());
    }
}
?>
