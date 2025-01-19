<?php
class Menu{
    private $dia;
    private $fecha;
    private $primerosplatos;
    private $segundosplatos;
    private $postres;

    public function __construct($dia, $fecha, $primerosplatos, $segundosplatos, $postres){
        $this->dia = $dia;
        $this->fecha = $fecha;
        $this->primerosplatos = $primerosplatos;
        $this->segundosplatos = $segundosplatos;
        $this->postres = $postres;
    }

    public function getDia(){
        return $this->dia;
    }

    public function setDia($dia){
        $this->dia = $dia;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getPrimerosPlatos(){
        return $this->primerosplatos;
    }

    public function setPrimerosPlatos($primerosplatos){
        $this->primerosplatos = $primerosplatos;
    }

    public function addPrimerosPlatos($nuevoprimero){
        $this->primerosplatos[] = $nuevoprimero;
    }

    public function imprimirPrimerosPlatos(){
        foreach($this->primerosplatos as $primerplato){
            echo $primerplato.'<br>';
        }
    }

    public function getSegundosPlatos(){
        return $this->segundosplatos;
    }

    public function setSegundosPlatos($segundosplatos){
        $this->segundosplatos = $segundosplatos;
    }

    public function addSegundosPlatos($nuevosegundo){
        $this->segundosplatos[] = $nuevosegundo;
    }
    
    public function imprimirSegundosPlatos(){
        foreach($this->segundosplatos as $segundoplato){
            echo $segundoplato.'<br>';
        }
    }

    public function getPostres(){
        return $this->postres;
    }

    public function setPostres($postres){
        $this->postres = $postres;
    }

    public function addPostres($nuevopostre){
        $this->postres[] = $nuevopostre; 
    }

    public function imprimirPostres(){
        foreach($this->postres as $postre){
            echo $postre.'<br>';
        }
    }

}
?>