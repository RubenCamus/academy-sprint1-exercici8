<?php
require  __DIR__ . '/../Biblioteca.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class BibliotecaTest extends TestCase {
    public static function bibliotecaProvider(): array {
        return[
            [
                [
                new Llibre("El senor de los anillos", "J R R Tolkien", 0003222, 410, Genere::FANTASTIC),
                new Llibre("El Hobbit", "J R R Tolkien", 432001, 280, Genere::FANTASTIC),
                new Llibre("El retrato de Dorian Grey", "Oscar Wilde", 283102, 190, Genere::RELATO)
                ]
            ]
        ];
    }
    public static function llibreProvider() {
        return
        [
        [new Llibre("El retrato de Dorian Grey", "Oscar Wilde", 283102, 190, Genere::RELATO)]
        ];
    }
    #[DataProvider("bibliotecaProvider")]
    public function testValidarBiblioteca(array $llibres) {
        $biblioteca1 = new Biblioteca($llibres);
        $this->assertSame($biblioteca1->llibres, $llibres);
        }
    public function testValidarLlibre() {
        $biblioteca1 = new Biblioteca([new Llibre("El retrato de Dorian Grey", "Oscar Wilde", 283102, 190, Genere::RELATO)]);
        $this->assertSame($biblioteca1->validarLlibre($biblioteca1->llibres[0]), true);
    }
    #[DataProvider("llibreProvider")]
    public function testCrearLlibre(Llibre $llibre) {
        $biblioteca1 = new Biblioteca([]);
        $biblioteca1->afegirLlibre($llibre);
        $this->assertSame($biblioteca1->llibres[0]->titol,"El retrato de Dorian Grey");
        }
    #[DataProvider("llibreProvider")]
    public function testGetItem(Llibre $llibre) {
        $biblioteca1 = new Biblioteca([$llibre]);
        $this->assertSame($biblioteca1->consultarLlibre($llibre->getISBN()), $llibre);
    }
    #[DataProvider("llibreProvider")]
    public function testEliminarLlibre(Llibre $llibre) {
        $biblioteca1 = new Biblioteca([$llibre]);
        $biblioteca1->eliminarLlibre($llibre);
        $this->assertSame($biblioteca1->llibres, []);
    }
    public function testLlibresLlargs() {
        $llibre = new Llibre("abc", "dfg", 001, 501, Genere::CIENCIAFICCIO);
        $biblioteca1 = new Biblioteca([$llibre]);
        $this->assertSame($biblioteca1->getLlibresLlargs(), [$llibre]);
    }
}

?>
