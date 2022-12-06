<?php

namespace jhondev123\composer;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorDeCurso
{
    private ClientInterface $httpClient;
    private Crawler $crawler;

    public function __construct(ClientInterface $httpClient , Crawler $crawler)
{

    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
}


    public function buscar(string $url):array
    {
        $resposta = $this->httpClient->request('GET', $url);

        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];
        foreach ($elementosCursos as $elemento){
            $cursos[]= $elemento->textContent;
        }
        return $cursos;
    }

}