<?php

    require_once "util/Conexao.php";
    require_once "dao/MetragemDAO.php";

    $conn = Conexao::getConexao();

    $metragens = MetragemDAO::listarMetragens();

    $tipo = "";
    $nome = "";
    $diretor = "";
    $lancamento = "";
    $genero = "";
    $capa = "";
    $streaming = "";
    $faixaEtaria = "";
    $duracao = "";
    $estreia = "";
    $episodios = 0;
    $temporadas = 0;
    $encerramento = "";

    if (isset($_POST['nome'])) {
        $tipo = $_POST['tipo'];
        $nome = trim($_POST['nome']);
        $diretor = trim($_POST['diretor']);
        $lancamento = $_POST['dataLancamento'];
        $genero = $_POST['genero'];
        $capa = $_POST['capa'];
        $streaming = $_POST['streaming'];
        $faixaEtaria = $_POST['faixaetaria'];
        $duracao = $_POST['duracao'];
        $estreia = $_POST['estreia'];
        $episodios = $_POST['qtdEpisodios'];
        $temporadas = $_POST['qtdTemporadas'];
        $encerramento = $_POST['encerramento'];

        //validar os dados

        $erros = [];

        if(!$nome) {
            array_push($erros, "Informe o nome!");

        } elseif(strlen($nome) < 3 || strlen($nome) > 50) {
            array_push($erros, "O nome do filme nao pode ter menos de tres caracteres e nem exceder 50!");
            
        } else {
            $sql = "SELECT id FROM metragens WHERE nome = ?";
            $stm = $conn->prepare($sql);
            $stm->execute([$nome]);
            $result = $stm->fetchAll();

            if(count($result) > 0) {
                array_push($erros, "Ja existe um filme/serie com esse titulo");
            }
        }
        
        if(!$diretor) {
            array_push($erros, "Informe o diretor!");
        }
        
        if(!$lancamento) {
            array_push($erros, "Informe a data de lancamento!");
        }
        
        if(!$genero) {
            array_push($erros, "Informe o genero!");
        }
        
        if(!$capa) {
            array_push($erros, "Informe o link da capa!");
        } 
        
        if(!$streaming) {
            array_push($erros, "Informe o link do streaming!");
        } 
        
        if(!$faixaEtaria) {
            array_push($erros, "Informe a faixa etaria!");
        } 
        
        
        if ($tipo == "F") {

            if(!$duracao) {
                array_push($erros, "Informe a duracao!");
            } 
            if(!$estreia) {
                array_push($erros, "Informe a estreia!");
            } 
        }

        if ($tipo == "S") {
            if(!$episodios) {
                array_push($erros, "Informe a quantidade de episodios!");
            } 
            
            if(!$temporadas) {
                array_push($erros, "Informe a quantidade de temporadas!");
            } 
            
            if(!$encerramento) {
                array_push($erros, "Informe a data de encerramento!");
            } 
        }
        
        

        if(count($erros) == 0 ) {

            if($tipo == "F"){
                $filme = new Filme($nome, $diretor, $lancamento, $genero, $capa, $streaming, $faixaEtaria, $duracao, $estreia);

                MetragemDAO::inserirMetragem($filme);

                header('location: index.php');
            } else{
                $serie = new Serie($nome, $diretor, $lancamento, $genero, $capa, $streaming, $faixaEtaria, $episodios, $temporadas, $encerramento);

                MetragemDAO::inserirMetragem($serie);

                header('location: index.php');
            }
    

        } else {

            $msgErro = implode("<br>", $erros);

        }

    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="metragem.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">
    <title>MetraInject - Seu site de cadastro de metragens</title>
</head>

<body>

    <header>
        <h1>Cadastro de Metragens</h1>
    </header>

    <div id="erros" style='color: red; font-size: 25px;'>
    
        <!-- escrever las cosas aqui -->

        <?= $msgErro ?>
    
    </div>
    
    <main>
        <form action="" method="post">
            <h2>Cadastre uma Metragem</h2>

            <section class="form-section">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?=$nome?>">
                </div>

                <div class="form-group">
                    <label for="diretor">Diretor:</label>
                    <input type="text" name="diretor" id="diretor" class="form-control" value="<?=$diretor?>">
                </div>

                <div class="form-group">
                    <label for="dataLancamento">Data de Lançamento:</label>
                    <input type="date" name="dataLancamento" id="dataLancamento" class="form-control" value="<?=$lancamento?>">
                </div>
                
                <div class="form-group">
                    <label for="genero">Gênero:</label>
                    <select name="genero" id="genero" class="form-select">
                        <option value='' <?php if($genero == ""){ echo "disabled selected hidden";} ?>>Escolha</option>
                        <option value="T" <?php if($genero == "T"){ echo "selected";} ?>>Terror</option>
                        <option value="S" <?php if($genero == "S"){ echo "selected";} ?>>Suspense</option>
                        <option value="A" <?php if($genero == "A"){ echo "selected";} ?>>Ação</option>
                        <option value="F" <?php if($genero == "F"){ echo "selected";} ?>>Ficção</option>
                        <option value="FC" <?php if($genero == "FC"){ echo "selected";} ?>>Ficção Científica</option>
                        <option value="C" <?php if($genero == "C"){ echo "selected";} ?>>Comédia</option>
                        <option value="R" <?php if($genero == "R"){ echo "selected";} ?>>Romance</option>
                        <option value="DR" <?php if($genero == "DR"){ echo "selected";} ?>>Drama</option>
                        <option value="DO" <?php if($genero == "DO"){ echo "selected";} ?>>Documentário</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="capa">Link da Capa:</label>
                    <input type="text" name="capa" id="capa" class="form-control" value="<?=$capa?>">
                </div>

                <div class="form-group">
                    <label for="streaming">Link do Streaming:</label>
                    <input type="text" name="streaming" id="streaming" class="form-control" value="<?=$streaming?>">
                </div>

                <div class="form-group">
                    <label for="faixaetaria">Faixa Etária:</label>
                    <select name="faixaetaria" id="faixaetaria" class="form-select">
                        <option value='' <?php if($faixaEtaria == ""){ echo "disabled selected hidden";} ?>>Escolha</option>
                        <option value="L" <?php if($faixaEtaria == "L"){ echo "selected";} ?>>Livre</option>
                        <option value="10" <?php if($faixaEtaria == "10"){ echo "selected";} ?>>10 anos</option>
                        <option value="12" <?php if($faixaEtaria == "12"){ echo "selected";} ?>>12 anos</option>
                        <option value="14" <?php if($faixaEtaria == "14"){ echo "selected";} ?>>14 anos</option>
                        <option value="16" <?php if($faixaEtaria == "16"){ echo "selected";} ?>>16 anos</option>
                        <option value="18" <?php if($faixaEtaria == "18"){ echo "selected";} ?>>18 anos</option>
                    </select>
                </div>

                <h3>É filme ou Série?</h3>

                <div class="form-group">
                    <div class="radio-group">
                        <input type="radio" name="tipo" id="tipo-filme" value="F">
                        <label for="tipo">É filme</label>

                        <input type="radio" name="tipo" id="tipo-serie" value="S">
                        <label for="tipo">É série</label>
                    </div>
                </div>
            </section>

            <section class="filme form-section" style="display: none;">
                <div class="form-group">
                    <label for="duracao">Duração (minutos):</label>
                    <input type="time" name="duracao" id="duracao" class="form-control" value="<?=$duracao?>">
                </div>

                <div class="form-group">
                    <label for="estreia">Estreia no cinema:</label>
                    <input type="date" name="estreia" id="estreia" class="form-control" value="<?=$estreia?>">
                </div>
            </section>

            <section class="serie form-section" style="display: none;">
                <div class="form-group">
                    <label for="qtdEpisodios">Quantidade de episódios:</label>
                    <input type="number" name="qtdEpisodios" id="qtdEpisodios" class="form-control" value="<?=$episodios?>">
                </div>

                <div class="form-group">
                    <label for="qtdTemporadas">Quantidade de Temporadas:</label>
                    <input type="number" name="qtdTemporadas" id="qtdTemporadas" class="form-control" value="<?=$temporadas?>">
                </div>

                <div class="form-group">
                    <label for="encerramento">Data de encerramento:</label>
                    <input type="date" name="encerramento" id="encerramento" class="form-control" value="<?=$encerramento?>">
                </div>
            </section>

            <button class="btn btn-primary" type="submit">Enviar</button>

            
        </form>


        <div class="tabela-metragens">
            <h2>Metragens Cadastradas</h2>
                <table class="table table-striped-columns">
                    <thead>
                        <tr>
                            <th>Capa</th>
                            <th>Nome</th>
                            <th>Diretor</th>
                            <th>Tipo</th>
                            <th>Gênero</th>
                            <th>Lançamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($metragens as $m):
                            $gen = "";
                            $tip = "";
                            
                            switch ($m['genero']) {
                                case "T":
                                    $gen = "Terror";
                                    break;
                                case "S":
                                    $gen = "Suspense";
                                    break;
                                case "A":
                                    $gen = "Ação";
                                    break;
                                case "F":
                                    $gen = "Ficção";
                                    break;
                                case "FC":
                                    $gen = "Ficção Científica";
                                    break;
                                case "C":
                                    $gen = "Comédia";
                                    break;
                                case "R":
                                    $gen = "Romance";
                                    break;
                                case "DR":
                                    $gen = "Drama";
                                    break;
                                case "DO":
                                    $gen = "Documentário";
                                    break;
                            }
                            
                            switch ($m['tipo']){
                                case "F":
                                    $tip = "Filme";
                                    break;
                                case "S":
                                    $tip = "Série";
                                    break;
                            }
                        ?>
                        <tr>
                            <td><img src="<?= $m['linkCapa'] ?>" width="75px" height="75px"></td>
                            <td><?= $m['nome'] ?></td>
                            <td><?= $m['diretor'] ?></td>
                            <td><?= $tip ?></td>
                            <td><?= $gen ?></td>
                            <td><?= $m['dataLancamento'] ?></td>
                            <td><a href="excluir.php?id=<?=$m['id']?>" onclick="return confirm('confirma a exclosão?')"><button class="btn btn-primary">excluir</button></a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
        </div>
        </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Script para mostrar/ocultar seções baseado no tipo selecionado
        document.querySelectorAll('input[name="tipo"]').forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'F') {
                    document.querySelector('.filme').style.display = 'block';
                    document.querySelector('.serie').style.display = 'none';
                } else if (this.value === 'S') {
                    document.querySelector('.serie').style.display = 'block';
                    document.querySelector('.filme').style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
