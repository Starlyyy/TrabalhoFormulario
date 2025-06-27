<?php 

require_once "modelo/Metragem.php";
require_once "modelo/Filme.php";
require_once "modelo/Serie.php";
require_once "util/conexao.php";

class MetragemDAO {

    static public function inserirMetragem(Metragem $metragem){
        $sql = "INSERT INTO metragens
                (tipo, nome, diretor, dataLancamento, genero, linkCapa, linkStreaming, faixaEtaria, duracao, estreiaNoCinema, qtdEpisodios, qtdTemporadas, dataEncerramento)
                values
                (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $con = Conexao::getConexao();

        $stm = $con->prepare($sql);

        if ($metragem instanceof Filme){
            $stm->execute(array($metragem->getTipo(),
                                $metragem->getNome(),
                                $metragem->getDiretor(),
                                $metragem->getDataLancamento(),
                                $metragem->getGenero(),
                                $metragem->getLinkCapa(),
                                $metragem->getLinkStreaming(),
                                $metragem->getFaixaEtaria(),
                                $metragem->getDuracao(),
                                $metragem->getEstreiaNoCinema(),
                                null,
                                null,
                                null
                                ));
        } elseif ($metragem instanceof Serie){
            $stm->execute(array($metragem->getTipo(),
                                $metragem->getNome(),
                                $metragem->getDiretor(),
                                $metragem->getDataLancamento(),
                                $metragem->getGenero(),
                                $metragem->getLinkCapa(),
                                $metragem->getLinkStreaming(),
                                $metragem->getFaixaEtaria(),
                                null,
                                null,
                                $metragem->getQtdEpisodios(),
                                $metragem->getQtdTemporadas(),
                                $metragem->getDataDeEncerramento()
                                ));
        } 
    }

    static public function listarMetragens(){
        $sql = "SELECT * FROM metragens";

        $con = Conexao::getConexao();

        $stm = $con->prepare($sql);
        $stm->execute();
        $metragens = $stm->fetchAll();

        
        return $metragens;
    }

    static public function excluirMetragem($id){
        $con = Conexao::getConexao();

        $sql = "DELETE FROM metragens WHERE id = ?";

        $stm = $con->prepare($sql);
        $stm->execute([$id]);
    }

    /*static private function mapMetragens (array $registros){
        
        $metragens = [];

        foreach($registros as $reg){
            $metragem = null;
            if($reg['tipo'] == 'F'){
                $metragem = new Filme;
                $metragem->getDuracao($reg['duracao']);
                $metragem->getEstreiaNoCinema($reg['estreiaNoCinema']);
            } else {
                $metragem = new Serie;
                $metragem->getQtdEpisodios($reg['qtdEpisodios']);
                $metragem->getQtdTemporadas($reg['qtdTemporadas']);
                $metragem->getDataDeEncerramento($reg['dataEncerramento']);
            }
            $metragem->getId($reg['id']);
            $metragem->getNome($reg['nome']);
            $metragem->getDiretor($reg['diretor']);
            $metragem->getDataLancamento($reg['dataLancamento']);
            $metragem->getGenero($reg['genero']);
            $metragem->getLinkCapa($reg['linkCapa']);
            $metragem->getLinkStreaming($reg['linkStreaming']);
            $metragem->getFaixaEtaria($reg['faixaEtaria']);

            array_push($metragens, $metragem);
        }

        return $metragens;
    }

    static public function buscarPorId($busca) {
        $sql = "SELECT * FROM metragens WHERE id = ?;";

        $con = Conexao::getConexao();
        $stm = $con->prepare($sql);
        $stm->execute([$busca]);

        $lista = $stm->fetchAll();

        if (empty($lista)) {
            return [];
        }

        $lista = $this->mapMetragens($lista);
        return $lista;
    }*/
}