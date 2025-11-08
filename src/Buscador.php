<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $crawler;
    private $httpClient;
    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url);

        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $ElementosCursos = $this->crawler->filter('h5.course-card__title');
        $cursos = [];
        foreach ($ElementosCursos as $item) {
            $cursos[] = $item->textContent;
        }

        return $cursos;
    }
}
