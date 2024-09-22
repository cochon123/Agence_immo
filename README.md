<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)

je ne sais pas si j'ai le droit de faire ca, je n'ai jamais appris comment faire un bon repository
je vais juste copier coller un truc que chat gpt m'as donné pour faire des recherche approximative

<!-- Oui, Laravel propose plusieurs solutions pour effectuer des recherches approximatives à partir de mots-clés. L'une des méthodes les plus populaires est d'utiliser **Laravel Scout**, qui permet d'intégrer des moteurs de recherche comme Algolia, Meilisearch, ou Elasticsearch dans ton application Laravel¹.

Voici un aperçu de la façon dont tu peux configurer Laravel Scout pour effectuer des recherches textuelles :

1. **Installation de Laravel Scout** :
    ```bash
    composer require laravel/scout
    ```

2. **Configuration de Laravel Scout** :
    Ajoute le service provider dans `config/app.php` :
    ```php
    'providers' => [
        // ...
        Laravel\Scout\ScoutServiceProvider::class,
    ],
    ```

    Publie la configuration de Scout :
    ```bash
    php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
    ```

3. **Choix du moteur de recherche** :
    Configure le moteur de recherche dans `config/scout.php`. Par exemple, pour utiliser Algolia :
    ```php
    'driver' => env('SCOUT_DRIVER', 'algolia'),
    ```

4. **Marquage des modèles pour l'indexation** :
    Utilise le trait `Searchable` dans ton modèle :
    ```php
    use Laravel\Scout\Searchable;

    class Article extends Model
    {
        use Searchable;
    }
    ```

5. **Indexation des données** :
    Pour indexer les données existantes :
    ```bash
    php artisan scout:import "App\Models\Article"
    ```

6. **Recherche dans les modèles** :
    Tu peux maintenant effectuer des recherches approximatives :
    ```php
    $articles = Article::search('mot clé')->get();
    ```

En utilisant Laravel Scout, tu peux facilement ajouter des fonctionnalités de recherche puissante et flexible à ton application¹².

Si tu préfères une solution plus simple, tu peux également utiliser des requêtes SQL avec des clauses `LIKE` pour des recherches approximatives :
```php
$results = DB::table('articles')
    ->where('title', 'like', '%mot clé%')
    ->orWhere('content', 'like', '%mot clé%')
    ->get();
```

N'hésite pas à me dire si tu as besoin de plus de détails ou d'aide pour la mise en place ! 😊

¹: [Utiliser Laravel Scout pour activer la recherche textuelle](https://kinsta.com/fr/blog/laravel-scout-recherche-textuelle/)
²: [Laravel/Searchbar : comment être plus pertinent dans une recherche multi-mots ?](https://www.developpez.net/forums/d2134375/php/bibliotheques-frameworks/laravel/laravel-searchbar-etre-plus-pertinent-recherche-multi-mots/)

Source : conversation avec Copilot, 18/08/2024
(1) Utiliser Laravel Scout pour activer la recherche textuelle. https://kinsta.com/fr/blog/laravel-scout-recherche-textuelle/.
(2) Laravel/Searchbar : comment être plus pertinent dans une recherche .... https://www.developpez.net/forums/d2134375/php/bibliotheques-frameworks/laravel/laravel-searchbar-etre-plus-pertinent-recherche-multi-mots/.
(3) Tutoriel Laravel 9 #8 : Moteur de recherche - Gekkode. https://www.gekkode.com/developpement/tutoriel-laravel-8-8-moteur-de-recherche/.
(4) undefined. https://github.com/spatie/laravel-searchable. -->