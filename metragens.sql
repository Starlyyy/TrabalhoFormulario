CREATE TABLE metragens (
    id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    tipo varchar(1) NOT NULL, /*Tipo de metragem: F (Filme) ou S (Serie)*/
    nome varchar(70) NOT NULL,
    diretor varchar(70) NOT NULL,
    dataLancamento date NOT NULL,
    genero varchar(2) NOT NULL,
    linkCapa varchar(2000),
    linkStreaming varchar(2000),
    faixaEtaria varchar(2) NOT NULL,
    duracao time, /*a partir daqui sao atributos das classes filhas*/
    estreiaNoCinema date,
    qtdEpisodios int,
    qtdTemporadas int,
    dataEncerramento date
);