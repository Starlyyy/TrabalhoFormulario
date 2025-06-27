<?php 

abstract class Metragem {
    protected $id;
    protected $nome;
    protected $diretor;
    protected $dataLancamento;
    protected $genero;
    protected $linkCapa;
    protected $linkStreaming;
    protected $faixaEtaria;

    public abstract function getTipo();

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getDiretor(){
        return $this->diretor;
    }

    public function getDataLancamento(){
        return date('Y-m-d', strtotime($this->dataLancamento));
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getLinkCapa(){
        return $this->linkCapa;
    }

    public function getLinkStreaming(){
        return $this->linkStreaming;
    }

    public function getFaixaEtaria(){
        return $this->faixaEtaria;
    }
}