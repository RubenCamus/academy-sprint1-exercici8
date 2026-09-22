<?php
class Velocimeter {

    public function __construct(private int $speed)
    {
        $this->speed = $speed;
    }

    public function speedTest() {
        if ($this->speed < 30) {
            return "Molt lent";
        } else if ($this->speed >= 30 and $this->speed <= 60) {
            return "Velocitat adecuada";
        } else if ($this->speed >= 61 and $this->speed <= 80) {
            return "Exces Lleu";
        } else if ($this->speed >= 81 and $this->speed <= 100) {
            return "Exces Moderat";
        } else if ($this->speed > 100) {
            return "Exces greu";
        }
    }
}
?>
