<?php 

require_once "Metragem.php";

Class Serie extends Metragem{
    private $qtdEpisodios;
    private $qtdTemporadas;
    private $dataDeEncerramento;

    //Metodos

    public function __construct($n, $d, $dl, $g, $lc, $ls, $fe, $qe, $qt, $de){
        $this->nome = $n;
        $this->diretor = $d;
        $this->dataLancamento = $dl;
        $this->genero = $g;
        $this->linkCapa = $lc;
        $this->linkStreaming = $ls;
        $this->faixaEtaria = $fe;
        $this->qtdEpisodios = $qe;
        $this->qtdTemporadas = $qt;
        $this->dataDeEncerramento = $de;
    }

    public function getTipo(){
        return "S";
    }

    public function getQtdEpisodios(){
        return $this->qtdEpisodios;
    }

    public function getDataDeEncerramento(){
        return $this->dataDeEncerramento;
    }

    public function getQtdTemporadas(){
        return $this->qtdTemporadas;
    }
}