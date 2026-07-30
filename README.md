Behzad Ghabaei <br>
CS 85 PHP Programming <br>
Final Project: AI Powered Web Application <br>
Instructor Seno <br>
7/29/2026 <br>

***Project Description*** <br>
A full-stack Laravel web application that leverages artificial intelligence to help content creators draft blog posts. Users simply enter a target title and optional focus keywords, and the app connects to the OpenAI API to generate a structured, formatted blog draft that is automatically saved to a MySQL database. <br>

***Features*** <br>
1. AI Integration: Powered by OpenAI's `gpt-4o-mini` model to write high-quality blog content with automatic HTML structure (`<h2>`, `<p>`). <br>
2. Form Validation: Built-in Laravel validation protecting input fields (i.e., minimum character length requirements, maximum limits). <br>
3. Robust Error Handling: Utilizes `try-catch` blocks to capture API network failures or database issues, elegantly feeding errors back to the user without crashing. <br>
4. Persistent Storage: Saves all generated prompts, metadata, and blog drafts inside a MySQL database for continuous access. <br>
5. Responsive UI: Designed using a modern, clean Tailwind CSS layout. <br><br>

   -The Backend Framework uses Laravel (PHP) <br>
   -The Database is the MySQL <br>
   -The Frontend uses Blade Templates and Tailwind CSS <br>
   -The API Client is the OpenAI PHP SDK for Laravel <br>

***Set Up Instructions*** <br>
1. Start Laravel Herd Application <br>
2. ```cd Herd``` (Changes your terminal's current directory to the folder where Laravel Herd manages your local sites.) <br>
3. ```laravel new ai-blog-assistant``` (Create your new Laravel project framework, bootstrap a new framework skeleton) | "Creating An Application Using A Starter Kit" | https://laravel.com/docs/13.x/starter-kits  <br>
-```Update now? No ```<br>
-```Starter Kit? None ```(Skips installing pre-packaged UI frameworks like Laravel Breeze or Jetstream so you can build your front end from scratch.) <br>
-```Testing Framework? Pest``` (Configures your testing suite to utilize Pest PHP, a highly expressive, elegant PHP testing framework.) <br>
-```Laravel Boost AI? No``` <br>
-```Which Database? mysql ```(Modifies your application's .env configuration file to immediately target a MySQL database engine.) <br>
-```run the default database migration? no``` <br>
-```run npm install --ignore-scripts and npm run build? yes ```(Automatically triggers Node Package Manager (npm) to fetch UI compilation dependencies and run a production build via the asset bundler Vite.) <br>
4. ```cd ai-blog-assistant ``` (Moves your command line context directly into the root folder of the newly built app) <br>
Open VS Code with ```code . ```( launches Visual Studio Code inside that specific environment) <br>
5. Back in terminal command prompt at the top of folder: <br>
```\ai-blog-assistant> composer require openai-php/laravel ```(Utilizes the PHP dependency manager Composer to pull down the official community-maintained OpenAI PHP for Laravel package into your vendor file directory.) |1. "OpenAI PHP for Laravel" | https://laravel-news.com/package/openai-php-laravel | 2. "Packagist" Sandro Gehri - Nuno Maduro | https://packagist.org/packages/openai-php/laravel | 3. https://github.com/openai-php/laravel/blob/main/README.md |  <br>
6. ``` php artisan openai:install``` (Executes a package-specific command that copies a global openai.php configuration file directly into your application's /config)| "Get Started" | Sandro Gehri - Nuno Maduro | https://packagist.org/packages/openai-php/laravel<br>
Is config\services.php needed?
```
'openai' => [
    'key' => env('OPENAI_API_KEY'),
    'url' => env('OPENAI_API_URL', 'https://api.openai.com/v1'),
    'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
],
```
No, it's not needed to manually add that code to config/services.php because you installed the official openai-php/laravel integration package.  When you ran the installation command "php artisan openai:install", the package automatically generated a brand-new, dedicated configuration file located at config/openai.php.  The package is pre-configured to look directly inside your .env file for the OPENAI_API_KEY variable. It initializes its own API clients using that specific file, completely bypassing the need to use Laravel's generic config/services.php array.  The package uses a Laravel Service Provider behind the scenes. When the application boots up, this provider reads from config/openai.php and automatically registers the OpenAI client into Laravel's service container. This is what allows the OpenAI::chat()->create() Facade to work smoothly anywhere in the code without any manual configuration wiring.
-```OpenAI for Laravel, starring it on GitHub? no``` <br>
7. Open the .env file and add the API Key.
 ```
OPENAI_API_KEY=
OPENAI_ORGANIZATION=
```
or copy and paste these variables into the .env file
```
OPENAI_API_URL=https://api.openai.com/v1
OPENAI_MODEL=gpt-4o-mini
OPENAI_API_KEY=sk-proj-xxx-xxx-xxx
```
8. Set up the database section of the .env file
 ```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ai_blog_assistant
DB_USERNAME=root
DB_PASSWORD= what is your password?
 ```
9. Open the the database /migrations file named "date_create_blogs_table.php" and update the up() function this will automatically create a new table in your database named blogs with five specific columns. | "Migration Structure" | https://laravel.com/docs/5.8/migrations <br>

10. ```\Herd\ai-blog-assistant>php artisan make:model Blog -m ```(This dual-purpose Laravel Artisan Model Generator creates an Eloquent data model class called Blog. The -m flag instructs Laravel to automatically generate a matching database schema file, a migration script, inside database/migrations/) | https://laravel.com/docs/13.x/eloquent <br>
11. ```\Herd\ai-blog-assistant>php artisan migrate ```(Instructs the framework's engine to review all unexecuted file blueprints inside database/migrations/ and run them against your active database server. When it discovers that ai_blog_assistant does not exist on MySQL yet, it prompts you to auto-create the raw database schema) | "Running Migrations" | https://laravel.com/docs/13.x/migrations <br>
-```The database 'ai_blog_assistant' does not exist on the 'mysql' connection.```
```Would you like to create it? yes ```<br>
12. ```ai-blog-assistant>php artisan make:controller BlogController ```(Builds a standard PHP class template inside app/Http/Controllers/ via the Laravel Controller Generator, which will eventually route your incoming HTTP requests, process data payload logic, and load views.) "Writing Controllers" | https://laravel.com/docs/13.x/controllers <br>
13. ```cd resources``` > ```cd views``` > ```mkdir blogs``` > ```cd blogs```  >``` code . ```>
create resources\views\blogs\index.blade.php (Standard operating system terminal navigation that walks into your application template file directory, generates a dedicated folder named blogs, and points VS Code there. Also, generates a foundational file utilizing Laravel Blade Templates, which processes HTML combined with raw PHP data loops to display information on screen.) <br>


**The code logic checklist** <br>
- "How to obtain an OPENAI key?" https://github.com/Ghabaei-Behzad/cs85_module12/blob/main/README.md
- .env file has DB_CONNECTION, DB_PASSWORD etc., and OPENAI_API_URL, OPENAI_MODEL, OPENAI_API_KEY credentials filled.
- up() function updated in database\migrations\date_create_blogs_table.php
- Model is created, with $fillable in Models\Blog.php
- BlogController.php is created at app/Http/Controllers/BlogController.php
- Define Routing and connect your web URLs to the controller methods in routes/web.php.
- build a user interface with resources/views/blogs/index.blade.php
14. Open the browser and enter the URL: ```http://ai-blog-assistant.test/``` (This is an auto-configured local domain mapping managed on your machine by Laravel Herd's Site Management. It serves your project instantly without requiring you to run a manual server execution script.) <br>
15. Interact with the "AI Blog Assistant" to create data. <br>
16. Open mySQL client <br>
enter password <br>
mysql> ```SHOW DATABASES; ```(A core MySQL Administrative Query that lists every active data schema group managed on your server engine instance.) | 15.7.7.15 | https://dev.mysql.com/doc/refman/8.4/en/show-databases.html<br>
mysql> ```USE ai_blog_assistant; ```(Informs your SQL terminal connection that all upcoming data extraction queries should target this specific application's active workspace.) <br>
mysql> ```SHOW TABLES;``` (Outputs a visual list of structural tables built inside your application) <br>
mysql>``` SELECT id, title, created_at FROM blogs; ```( A standard query that targets specific columns inside your blogs table to visually confirm that entries are being saved correctly by the app.) <br>
optional** heavy output: mysql> ```SELECT content FROM blogs ORDER BY id DESC LIMIT 1; ```<br>
mysql> ```exit; ```(Closes the communication pipe safely and logs you off from the MySQL server terminal.) "Chapter 5 Tutorial" | https://dev.mysql.com/doc/refman/8.4/en/database-use.html <br>

***Screenshots***
<img width="1366" height="689" alt="Screenshot (1787)" src="https://github.com/user-attachments/assets/4ca9c6ac-82ed-4298-88e6-842ab626d9c0" />

<img width="1366" height="686" alt="Screenshot (1788)" src="https://github.com/user-attachments/assets/8f0d5ade-d98f-4e6c-8ef1-c65c5510635f" />

<img width="1366" height="685" alt="Screenshot (1789)" src="https://github.com/user-attachments/assets/676a61a7-b9c8-45f4-ad23-2af8f96b33c4" />

<img width="1366" height="725" alt="Screenshot (1790)" src="https://github.com/user-attachments/assets/00352cb9-4716-4b57-94aa-bd138a2e0886" />

***Include a short screen recording (10 MB only)*** <br>
https://github.com/user-attachments/assets/42bd38b9-f7ac-451c-b055-29d8c4cbc992














<!--
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

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

https://github.com/user-attachments/assets/f0c19c6c-8057-4cf1-b8a7-3bbec3e3de3c



If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
-->
