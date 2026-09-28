<?php
require  __DIR__ . '/../Llibre.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class LlibreTest extends TestCase {
    public static function llibreProvider() {
        return [
            ["El senor de los anillos", "J R R Tolkien", 0003222, 410, Genere::FANTASTIC],
            ["El Hobbit", "J R R Tolkien", 432001, 280, Genere::FANTASTIC],
        ];
    }
    #[DataProvider("llibreProvider")]
    public function testLlibre(string $titol, string $autor, int $isbn, int $pagines, Genere $genere) {
        $llibre1 = new Llibre($titol, $autor, $isbn, $pagines,$genere);
        $this->assertSame($llibre1->titol, $titol);
        $this->assertSame($llibre1->autor, $autor);
        $this->assertSame($llibre1->isbn, $isbn);
        $this->assertSame($llibre1->pagines, $pagines);
        $this->assertSame($llibre1->genere, $genere);
    }
}


?>
