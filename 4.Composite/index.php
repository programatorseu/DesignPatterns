<?php 
abstract class PracownikAbstract {
    protected $imie;
    protected $nazwisko;
    protected $stanowisko;
    protected $podwladni = [];
    public function __construct(string $firstName, string $lastName, string $position)
    {
        $this->imie = $firstName;
        $this->nazwisko = $lastName;
        $this->stanowisko = $position;
    }
    public function get() {
        return "$this->imie  $this->nazwisko  $this->stanowisko";
    }
    public function podwladni() {
        return $this->podwladni;
    }
    abstract public function addPodwladnego(PracownikAbstract $pracownik);
}
class Szef extends PracownikAbstract {
    public function addPodwladnego(PracownikAbstract $pracownik)
    {
        $this->podwladni[] = $pracownik;
    }
}
class Manager extends PracownikAbstract {
    public function addPodwladnego(PracownikAbstract $pracownik)
    {
        $this->podwladni[] = $pracownik;   
    }
}

class Pracownik extends PracownikAbstract {
    public function addPodwladnego(PracownikAbstract $pracownik)
    {
        return false;
    }
}
$szef = new Szef("Piotr", "Sad", "CEO");
$manager = new Manager("Robert", "M", "Manager");
$pracownik = new Pracownik("Ryszard", "Sad", "Pracownik");

$szef->addPodwladnego($manager);
$manager->addPodwladnego($pracownik);

function printZespol(PracownikAbstract $pracownik, string $prefix) {

    echo $prefix . $pracownik->get() . "\n";
    $prefix .= "     ";
    foreach($pracownik->podwladni() as $podwladny) {
        printZespol($podwladny, $prefix);
    }
}
printZespol($szef, '');