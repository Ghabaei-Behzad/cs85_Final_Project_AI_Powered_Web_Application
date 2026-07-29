Behzad Ghabaei <br>
CS 85 PHP Programming <br>
Final Project: AI Powered Web Application <br>
Instructor Seno <br>
7/29/2026 <br>

***Project Description***
A full-stack Laravel web application that leverages artificial intelligence to help content creators draft blog posts. Users simply enter a target title and optional focus keywords, and the app connects to the OpenAI API to generate a structured, formatted blog draft that is automatically saved to a MySQL database. <br>

***Features***
1. AI Integration: Powered by OpenAI's `gpt-4o-mini` model to write high-quality blog content with automatic HTML structure (`<h2>`, `<p>`). <br>
2. Form Validation: Built-in Laravel validation protecting input fields (i.e., minimum character length requirements, maximum limits). <br>
3. Robust Error Handling: Utilizes `try-catch` blocks to capture API network failures or database issues, elegantly feeding errors back to the user without crashing. <br>
4. Persistent Storage: Saves all generated prompts, metadata, and blog drafts inside a MySQL database for continuous access. <br>
5. Responsive UI: Designed using a modern, clean Tailwind CSS layout. <br>

***Set Up Instructions***
1. Start Laravel Herd Application <br>
2. cd Herd <br>
3. laravel new ai-blog-assistant <br>
Update now? No <br>
Starter Kit? None <br>
Testing Framework? Pest <br>
Laravel Boost AI? No <br>
Which Database? mysql <br>
run the default database migration? no <br>
run npm install --ignore-scripts and npm run build? yes <br>
4. cd ai-blog-assistant <br>
Open VS Code with code . <br>
5. back in terminal command prompt at the top of folder: <br>
\ai-blog-assistant> composer require openai-php/laravel <br>
6. php artisan openai:install <br>
OpenAI for Laravel, starring it on GitHub? no <br>
7. \Herd\ai-blog-assistant>php artisan make:model Blog -m <br>
8. \Herd\ai-blog-assistant>php artisan migrate <br>
The database 'ai_blog_assistant' does not exist on the 'mysql' connection.
Would you like to create it? yes <br>
9. ai-blog-assistant>php artisan make:controller BlogController <br>
10. cd resources > cd views > mkdir blogs > cd blogs  > code . >
create resources\views\blogs\index.blade.php <br>
11. Open the browser and enter the URL: http://ai-blog-assistant.test/<br>
12. Interact with the "AI Blog Assistant" to create data. <br>
13. Open mySQL client <br>
enter password <br>
mysql> SHOW DATABASES; <br>
mysql> USE ai_blog_assistant; <br>
mysql> SHOW TABLES; <br>
mysql> SELECT id, title, created_at FROM blogs; <br>
optional** heavy output: mysql> SELECT content FROM blogs ORDER BY id DESC LIMIT 1; <br>
mysql> exit; <br>

***Screenshots***
<img width="1366" height="689" alt="Screenshot (1787)" src="https://github.com/user-attachments/assets/4ca9c6ac-82ed-4298-88e6-842ab626d9c0" />

<img width="1366" height="686" alt="Screenshot (1788)" src="https://github.com/user-attachments/assets/8f0d5ade-d98f-4e6c-8ef1-c65c5510635f" />

<img width="1366" height="685" alt="Screenshot (1789)" src="https://github.com/user-attachments/assets/676a61a7-b9c8-45f4-ad23-2af8f96b33c4" />

<img width="1366" height="725" alt="Screenshot (1790)" src="https://github.com/user-attachments/assets/00352cb9-4716-4b57-94aa-bd138a2e0886" />

***Include a short screen recording*** 
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
