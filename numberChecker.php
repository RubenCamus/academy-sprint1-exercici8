<?php
class NumberChecker  {


	public function __construct(private int $number){}

	public function isEven(): bool {
		return $this->number%2 == 0;
	}
	public function isPositive(): bool {
		return $this->number > 0;
	}

}


function testNumbers(int $numberToCheck) {
    $testClass = new NumberChecker($numberToCheck);
    echo "Current number to check is $numberToCheck" . "\n";
    if (gettype($numberToCheck) != "integer") {echo "Not a number";return; }
    if ($testClass->isEven()) {
        echo "Number is even";
        echo PHP_EOL;
    } else {
        echo "Number is odd";
        echo PHP_EOL;
    }
    if ($testClass->isPositive()) {
        echo "Number is positive";
        echo PHP_EOL;
    } else {
        echo "Number is negative";
        echo PHP_EOL;
    }
}

testNumbers(20);
testNumbers(-20);
testNumbers(9);
testNumbers(-9);

?>
