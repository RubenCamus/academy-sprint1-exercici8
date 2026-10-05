<?php
require_once('Genere.php');

class Llibre {
    public string $titol;
    public string $autor;
    public int $isbn;
    public int $pagines;
    public Genere $genere;

    public function __construct(string $titol,string $autor, int $isbn, int $pagines, Genere $genere
    )
    {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->pagines = $pagines;
        $this->genere = $genere;
    }

    public function getTitol() {
        return $this->titol;
    }
    public function getAutor() {
        return $this->autor;
    }
    public function getISBN() {
        return $this->isbn;
    }
    public function getPagines() {
        return $this->pagines;
    }
    public function getGenere() {
        return $this->genere;
    }
}

?>
