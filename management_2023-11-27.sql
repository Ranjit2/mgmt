# ************************************************************
# Sequel Ace SQL dump
# Version 20039
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.31)
# Database: management
# Generation Time: 2023-11-27 12:15:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2023_11_27_000202_create_tasks_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reset_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_assign_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `user_assign_id`, `created_at`, `updated_at`)
VALUES
	(1,'Ut sed enim ut ipsa','<p>jkbgygyvhgvftydtydydytdfuyg</p>',0,1,'2023-11-27 10:19:04','2023-11-27 11:28:52'),
	(2,'Choosing the Right Hosting Environment','<p>your application’s performance and reliability. Dedicated hosting gives you more control and flexibility over your server configuration, but it also requires more maintenance and management. Cloud hosting allows you to scale your resources on demand, but it also comes with higher costs and complexity. Serverless hosting lets you run your code without worrying about servers at all, but it also has some limitations in terms of functionality and compatibility.</p><p>The best hosting option for your PHP application depends on various factors, such as:</p><ul><li>The size and complexity of your application</li><li>The expected traffic and load patterns</li><li>The level of security and compliance you need</li><li>The features and tools you want to use</li><li>The budget and resources you have</li></ul><p>You should compare different hosting options and evaluate their pros and cons before making a decision. You should also consider using a hybrid approach that combines different hosting options to achieve the best results.</p><h2><strong>Optimizing Your Code and Database Queries</strong></h2><p>Another important strategy for scaling your PHP application is to optimize your code and database queries. This means writing clean, efficient, and maintainable code that follows the best practices and standards for PHP development. You should also use a code editor or IDE that can help you debug, refactor, and test your code easily.</p><p>Some of the common ways to optimize your code are:</p><ul><li>Using PHP 8 or higher, which offers significant performance improvements over previous versions</li><li>Using a PHP framework that provides a structured and organized way of developing your application</li><li>Using an opcode cache such as OPcache or APCu that can speed up your code execution by storing precompiled scripts in memory</li><li>Using a code profiler such as Xdebug or Blackfire that can help you identify and fix performance bottlenecks in your code</li><li>Using a code quality tool such as PHP_CodeSniffer or PHPStan that can help you check and enforce coding standards and best practices</li></ul>',0,0,'2023-11-27 11:19:14','2023-11-27 11:19:14'),
	(3,'The One Skill Which Will Help You Meet Your Client\'s Expectations','<p>it doesn’t discount the effort I’ve put into studying and improving). I’ve always had a way with words. However, I honed and developed this skill further during my previous job. Allow me to provide a brief background:</p><p>I was employed in the sales sector, specifically for a new company in the fast-moving consumer goods market, dealing with foods and drinks. The company specializes in producing its own brands of beer, water, and coffee. It’s easy to grasp the level of saturation in this market, given the presence of well-established brands raking in millions annually.</p><p>It was like trying to develop a new soda with an almost non-existent marketing budget and attempting to compete with industry giants like Coca-Cola and Pepsi. Surprisingly, within less than a year (considering I was only 20 years old at the time), I successfully gained over 1000 clients. These clients were consistent and generated remarkable revenue, all achieved without any marketing or promotional budget.</p><h2><strong>How did I achieve this?</strong></h2><p>To start, I effectively sold myself to the clients, earning their trust by demonstrating genuine care for their business. I made it clear that my intention wasn’t solely to take their money. How? I have blue eyes. Kidding. It was through consistency, a sincere concern for their…</p><p>&nbsp;</p>',0,0,'2023-11-27 11:20:45','2023-11-27 11:25:16'),
	(4,'Coding with Laravel: Uncover the Best Tips and Tricks 👨‍💻','<p>Laravel, the popular PHP framework, has taken the <a href=\"https://kanhasoft.com/web-app-development.html\">web development</a> world by storm. Known for its elegant syntax, robust features, and active community, Laravel has made it easier than ever to build powerful web applications. Whether you’re a seasoned <a href=\"https://kanhasoft.com/hire-dedicated-developers.html\">developer</a> or just starting out, there are always new tips and tricks to discover in the world of Laravel. In this comprehensive guide, we’ll explore some of the best tips and tricks for coding with Laravel, and we’ll sprinkle in a few emojis for fun! 😄</p><h2><strong>What is Laravel? 🚀</strong></h2><p>Before we dive into the tips and tricks, let’s take a quick look at what Laravel is all about. Laravel is an open-source <a href=\"https://kanhasoft.com/php-application-development.html\">PHP web application</a> framework that follows the model-view-controller (MVC) architectural pattern. It provides a wide range of tools and libraries for tasks like routing, authentication, and database management, making it an excellent choice for building web applications.</p><p><strong>Laravel’s main features include:</strong></p><p>· Elegant syntax.</p><p>· Powerful ORM (Object-Relational Mapping) called Eloquent.</p><p>· A robust query builder.</p><p>· Blade templating engine.</p><p>· Built-in authentication and authorization.</p><p>· Artisan command-line tool for managing tasks.</p><p>· A vibrant community and active development.</p><p>Now that you have an idea of what <a href=\"https://kanhasoft.com/blog/10-laravel-hacks-for-beginners-in-2023-unlock-the-full-potential-of-laravel/\">Laravel is, let’s dive into some tips and tricks</a> to help you become a Laravel pro! 🤓</p><h2><strong>1. Artisan Commands: Your Swiss Army Knife 🧰</strong></h2><p>Laravel’s Artisan commands are your go-to tools for various tasks, from creating models and controllers to migrating databases and even generating boilerplate code. Here are some handy Artisan commands to r</p>',1,0,'2023-11-27 11:21:21','2023-11-27 11:27:08'),
	(5,'Unique Columns with SingleStore and Laravel','<p>For one of my projects, I am currently evaluating the use of SingleStore as a database backend. Of course, after all, the site I admire so much, <a href=\"https://usefathom.com/\">usefathom.com</a>, relies on SingleStore, and Jack Ellis released a quite expensive course on the subject, which I — behaving fittingly to a fanboy — bought straight away.<br>These are my first steps.</p><h2><strong>Teething Troubles</strong></h2><p>Firstly, SingleStore cannot be installed via brew on the Mac. Such a pity, especially since I had just recently banished Docker from my devices.<br>Much to my delight, however, takeout supports SingleStore, allowing me to quickly set up a container that turned out to be “ready to go”.</p><p>My joy did not last long, as the switch to SingleStore in Laravel, thanks to the included db-driver for Laravel, was quickly done, but during the migration of my database, which was really not particularly complex, errors rushed through my terminal.</p><p>SingleStore is a shard-database an</p>',0,0,'2023-11-27 11:22:05','2023-11-27 11:22:05'),
	(6,'How to configure your Laravel application CI/CD on Github','<p>Laravel is an open-source PHP framework that was created by Taylor Otwell. It’s designed to simplify the development of web applications by providing an expressive syntax, robust tooling, and a wide range of features that handle common web development tasks.</p><p><strong>Key Features of Laravel:</strong></p><ol><li>Eloquent ORM (Object-Relational Mapping): Laravel provides an elegant, active-record-style ORM called Eloquent. It simplifies database operations by allowing developers to work with databases using PHP objects and models. This makes it easier to query, insert, update, and delete database records.</li><li>Artisan CLI: Laravel’s command-line tool, Artisan, automates various development tasks such as creating migrations, generating controllers, running tests, and more. It’s a powerful feature that streamlines the development process.</li><li>Blade Templating Engine: Laravel’s Blade templating engine is intuitive and efficient. It allows developers to write templates with clean, concise syntax and provides features like template inheritance, control structures, and partials.</li><li>Middleware: Middleware in Laravel enables you to filter HTTP requests entering your application. You can use middleware for tasks like authentication, logging, and CORS handling.</li><li>Authentication and Authorization: Laravel provides a built-in authentication system that makes it easy to implement user registration, login, and password reset functionality. It also offers an expressive authorization system for controlling user access to different parts of the application.</li><li>Database Migrations and Seeding: Laravel’s migration system allows you to define your database schema in code and easily apply changes to it. Seeders help populate your database with sample data for testing and development.</li><li>Routing: Laravel offers a simple and expressive routing system for defining web and API routes. You can easily create named routes and group routes for better organization.</li><li>Testing: Laravel supports PHPUnit and includes helper methods for testing your applications. It also provides convenient ways to simulate HTTP requests, making it easier to test your routes and controllers.</li><li>Queues and Job Management: Laravel’s queue system allows you to defer the processing of time-consuming tasks, improving application performance. You can easily configure and manage background jobs.</li><li>Task Scheduling: Laravel’s task scheduler provides an elegant way to schedule recurring tasks within your application. This is useful for automated, periodic tasks like sending emails or cleaning up the database.</li><li>Dependency Injection and IoC Container: Laravel makes use of dependency injection and an Inversion of Control (IoC) container, making it easy to manage class dependencies and create testable and maintainable code.</li><li>API Support: Laravel is well-suited for building APIs, with features like API resource classes, API authentication, and API versioning support.</li><li>Community and Packages: Laravel has a vibrant community and a rich ecosystem of packages available through Composer, making it easy to extend the framework with addit</li></ol>',0,0,'2023-11-27 11:22:42','2023-11-27 11:27:42'),
	(8,'this is task 11','<p>new body nnnnnnnnnnn</p>',0,2,'2023-11-27 11:28:22','2023-11-27 11:29:16');

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'ranj','admin@gmail.com',NULL,'$2y$12$HCY591Oczwyz0qoIOBlituH.MuH5NH9iGE57pdk09aeDTivq5TEMW',NULL,'2023-11-27 10:18:45','2023-11-27 10:18:45'),
	(2,'john','John@gmail.com',NULL,'$2y$12$HCY591Oczwyz0qoIOBlituH.MuH5NH9iGE57pdk09aeDTivq5TEMW',NULL,'2023-11-27 10:18:45','2023-11-27 10:18:45'),
	(3,'Nick','nick.doe@gmail.com',NULL,'$2y$12$HCY591Oczwyz0qoIOBlituH.MuH5NH9iGE57pdk09aeDTivq5TEMW',NULL,'2023-11-27 10:18:45','2023-11-27 10:18:45');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
