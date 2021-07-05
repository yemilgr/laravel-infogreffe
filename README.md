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
        'token' => env('INFOGREFFE_TOKEN', 'your-token-here')
    ]
]
```

## How to use it

### Using Infogreffe Facade

```php
use Yemilgr\Infogreffe\Facades\Infogreffe;

$enterpriseFiche = Infogreffe::getEnterpriseFiche('123456789');

if ($enterpriseFiche) {
    dd($enterpriseFiche);
}

return Infogreffe::getLastError(); // Ex: Siren non trouvé
```

### Using Laravel Dependency Injection in your Controllers or Classes

```php
use Yemilgr\Infogreffe\Infogreffe;

class AppController extends Controller
{
    public function index(Infogreffe $infogreffe)
    {
        $enterpriseFiche = $infogreffe->getEnterpriseFiche('123456789');

        if ($enterpriseFiche) {
            dd($enterpriseFiche);
        }

        return $infogreffe->getLastError(); // Ex: Siren non trouvé
    }
}
```

### Command 

```bash
php artisan infogreffe:enterpriseFiche 123456789
```