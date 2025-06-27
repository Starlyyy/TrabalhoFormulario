<?php 

require_once "Metragem.php";

Class Filme extends Metragem{
    private $duracao;
    private $estreiaNoCinema;

    public function __construct($n, $d, $dl, $g, $lc, $ls, $fe, $du, $e){
        $this->nome = $n;
        $this->diretor = $d;
        $this->dataLancamento = $dl;
        $this->genero = $g;
        $this->linkCapa = $lc;
        $this->linkStreaming = $ls;
        $this->faixaEtaria = $fe;
        $this->duracao = $du;
        $this->estreiaNoCinema = $e;
    }
    
    //Metodos

    public function getTipo(){
        return "F";
    }
    
    public function getDuracao(){
        return $this->duracao;
    }

    public function getEstreiaNoCinema(){
        return $this->estreiaNoCinema;
    }
}