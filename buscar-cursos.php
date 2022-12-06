<?php

require 'vendor/autoload.php';
Teste::teste();
exibeMensagem("aeaeaea");
use GuzzleHttp\Client;

use jhondev123\composer\BuscadorDeCurso;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify'=> false,'base_uri'=>'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new BuscadorDeCurso($client,$crawler);
$cursos = $buscador->buscar('cursos-online-programacao/php');
foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}