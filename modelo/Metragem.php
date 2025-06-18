<?php 

abstract class Metragem {
    private $id;
    private $nome;
    private $diretor;
    private $dataLancamento;
    private $genero;
    private $linkCapa;
    private $linkStreaming;
    private $faixaEtaria;

    public abstract function getTipo();
    

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of diretor
     */
    public function getDiretor()
    {
        return $this->diretor;
    }

    /**
     * Set the value of diretor
     */
    public function setDiretor($diretor): self
    {
        $this->diretor = $diretor;

        return $this;
    }

    /**
     * Get the value of dataLancamento
     */
    public function getDataLancamento()
    {
        return $this->dataLancamento;
    }

    /**
     * Set the value of dataLancamento
     */
    public function setDataLancamento($dataLancamento): self
    {
        $this->dataLancamento = $dataLancamento;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero($genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of linkCapa
     */
    public function getLinkCapa()
    {
        return $this->linkCapa;
    }

    /**
     * Set the value of linkCapa
     */
    public function setLinkCapa($linkCapa): self
    {
        $this->linkCapa = $linkCapa;

        return $this;
    }

    /**
     * Get the value of linkStreaming
     */
    public function getLinkStreaming()
    {
        return $this->linkStreaming;
    }

    /**
     * Set the value of linkStreaming
     */
    public function setLinkStreaming($linkStreaming): self
    {
        $this->linkStreaming = $linkStreaming;

        return $this;
    }

    /**
     * Get the value of faixaEtaria
     */
    public function getFaixaEtaria()
    {
        return $this->faixaEtaria;
    }

    /**
     * Set the value of faixaEtaria
     */
    public function setFaixaEtaria($faixaEtaria): self
    {
        $this->faixaEtaria = $faixaEtaria;

        return $this;
    }
}