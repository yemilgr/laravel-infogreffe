# Laravel Infogreffe API Wrapper

This package integrates infograffe service to your laravel application

## Installation

```bash
composer require yemilgr/laravel-infogreffe
```

## Configuration

Set your infogreffe token in `config/services` config file

```php
return [
    // ...
    
    'infogreffe' => [
        'token' => 'AXfBH56aWQcdCKRHkUAd9UcT1zsydYfQajOGeDfjmE3ztMBNbwWxxfu0xWi2'
    ]
]
```

## How to use it

```php
use Yemilgr\Infogreffe\Facades\Infogreffe;

$enterpriseFiche = Infogreffe::getEnterpriceFiche('123456789');

if ($enterpriseFiche) {
    dd($enterpriseFiche);
}

return Infogreffe::getLastError(); // Siren non trouvé
```