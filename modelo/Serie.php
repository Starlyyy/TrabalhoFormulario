<?php 

require_once "Metragem.php";

Class Serie extends Metragem{
    private $qtdEpisodios;
    private $qtdTemporadas;
    private $dataDeEncerramento;

    //Metodos

    public function getTipo(){
        return "S";
    }
    
    // GETTERS AND SETTERS

    public function getQtdEpisodios()
    {
        return $this->qtdEpisodios;
    }

    public function setQtdEpisodios($qtdEpisodios): self
    {
        $this->qtdEpisodios = $qtdEpisodios;

        return $this;
    }

    public function getDataDeEncerramento()
    {
        return $this->dataDeEncerramento;
    }

    public function setDataDeEncerramento($dataDeEncerramento): self
    {
        $this->dataDeEncerramento = $dataDeEncerramento;

        return $this;
    }

    public function getQtdTemporadas()
    {
        return $this->qtdTemporadas;
    }

    public function setQtdTemporadas($qtdTemporadas): self
    {
        $this->qtdTemporadas = $qtdTemporadas;

        return $this;
    }
    
}