<?php
require_once('Llibre.php');
require_once('Genere.php');
require_once('GeneralResponse.php');
class Biblioteca {
    public array $llibres;

    public function __construct(array $llibres)
    {
        $this->llibres = $llibres;
    }

    public function validarLlibre(Llibre $llibre) {
        if ($llibre == null) {throw new Exception("Llibre no es valid");}
        if ($llibre->autor == null) {throw new Exception("Autor llibre no es valid");}
        if ($llibre->isbn == null) {throw new Exception("ISBN llibre no es valid");}
        if ($llibre->titol == null) {throw new Exception("Titol llibre no es valid");}
        if ($llibre->genere == null) {throw new Exception("Genere llibre no es valid");}
        return true;
    }

    public function checkLlibreExisteix(Llibre $llibre) {
        if ($this->consultarLlibre($llibre->isbn, 'isbn') != null) {
            throw new Exception("Llibre ja existeixs");
        }
    }
    public function afegirLlibre(Llibre $llibre) {
        $this->validarLlibre($llibre);
        if ($this->consultarLlibre($llibre->isbn, 'isbn') != null) {
            throw new Exception("Llibre ja existeixs");
        }
        array_push($this->llibres, $llibre);
    }
    public function eliminarLlibre(Llibre $llibre) {
        $this->validarLlibre($llibre);
        $llibreAEliminar = $this->consultarLlibre($llibre->isbn, 'isbn');
        if ($llibreAEliminar == null) {throw new Exception("Llibre no existeixs");}
        $this->llibres = array_filter($this->llibres, fn() => !$llibreAEliminar);
    }

    public function modificarLlibre(int $isbn, mixed $valorACanviar, string $filtre) {
        $llibre = $this->consultarLlibre($isbn);
        switch ($filtre) {
            case 'isbn':
            if ($llibre->isbn == $filtre) {
                $llibre->isbn = $valorACanviar;
                return new GeneralResponse(true, "S'ha canviat el ISBN del llibre");
            }
            case 'titol':
            if ($llibre->titol == $filtre) {
                $llibre->titol = $valorACanviar;
                return new GeneralResponse(true, "S'ha canviat el TITOL del llibre");
            }
            case 'autor':
            if ($llibre->autor == $filtre) {
                $llibre->autor = $valorACanviar;
                return new GeneralResponse(true, "S'ha canviat l'AUTOR del llibre");
            }
            case 'genere':
            if ($llibre->genere == $filtre) {
                $llibre->genere = $valorACanviar;
                return new GeneralResponse(true, "S'ha canviat el GENERE del llibre");
            }
            default:
            return null;
        }
    }
    public function consultarLlibre(mixed $codi,$filtre = "isbn") {
        foreach($this->llibres as $llibre) {
            switch ($filtre) {
                case 'isbn':
                if ($llibre->isbn == $codi) {
                    return $llibre;
                }
                case 'titol':
                if ($llibre->titol == $codi) {
                    return $llibre;
                }
                case 'autor':
                if ($llibre->autor == $codi) {
                    return $llibre;
                }
                case 'genere':
                if ($llibre->genere == $codi) {
                    return $llibre;
                }
                default:
                return null;
            }
        }
    }
    public function getLlibresLlargs() {
        return array_filter($this->llibres, fn($llibre) => $llibre->pagines > 500);
    }
}
?>
