<?php 

require_once "Metragem.php";

Class Filme extends Metragem{
    private $duracao;
    private $estreiaNoCinema;

    //Metodos

    public function getTipo(){
        return "F";
    }
    
    // GETTERS AND SETTERS

    public function getDuracao()
    {
        return $this->duracao;
    }

    public function setDuracao($duracao): self
    {
        $this->duracao = $duracao;

        return $this;
    }

    public function getEstreiaNoCinema()
    {
        return $this->estreiaNoCinema;
    }

    public function setEstreiaNoCinema($estreiaNoCinema): self
    {
        $this->estreiaNoCinema = $estreiaNoCinema;

        return $this;
    }

}