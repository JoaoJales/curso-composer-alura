# Buscador de Cursos Alura

Biblioteca/CLI em PHP para buscar títulos de cursos disponíveis no site da Alura a partir de uma carreira ou categoria.

## Instalação

Instale via Composer no seu projeto:

```bash
composer require joaojales/buscador-cursos
```

Ou clone este repositório para desenvolvimento local.

## Uso

Você pode utilizar como biblioteca (em seu próprio código) ou via linha de comando.

### 1) Como biblioteca

Exemplo mínimo:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'verify' => false, // desabilita verificação do SSL quando necessário
    'base_uri' => 'https://www.alura.com.br'
]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/carreiras/desenvolvimento-backend-php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
```

### 2) Via linha de comando (CLI)

Se você instalou como dependência, o Composer criará um binário em `vendor/bin`:

```bash
php vendor/bin/buscar-cursos.php
```

Se estiver rodando diretamente neste repositório, execute:

```bash
php buscar-cursos.php
```
