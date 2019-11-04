<?php
$nomeSistema ="Desafio PHP";
$usuario = ["nome" => "Gustavo Corrêa"];
// $produtos = [
//   ["nome" => "Curso - Pica", "preco" => "Investimento: R$1000.00", "duracao"=>"Duração: 40 horas", "img"=>"img/faustao-1177619.jpg"],
//   ["nome" => "Curso - Doido", "preco" => "Investimento: R$2000.00", "duracao"=>"Duração: 500 horas", "img"=>"img/faustao-1177619.jpg"],
//   ["nome" => "Curso - Massa", "preco"=>"Investimento: 3 pó", "duracao"=>"Duração: Eterna", "img"=>"img/faustao-1177619.jpg"]
// ];

$nomeArquivo = "produto.json";
$produtos = json_decode(file_get_contents($nomeArquivo), true);

?>
