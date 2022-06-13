# The Art of Modern PHP 8

<a href="https://www.packtpub.com/product/the-art-of-modern-php-8/9781800566156"><img src="https://static.packt-cdn.com/products/9781800566156/cover/smaller" alt="The Art of Modern PHP 8" height="256px" align="right"></a>

This is the code repository for [The Art of Modern PHP 8](https://www.packtpub.com/product/the-art-of-modern-php-8/9781800566156), published by Packt.

**Learn how to write modern, performant, and enterprise-ready code with the latest PHP features and practices**

## What is this book about?
PHP has come a long way since its introduction. While the language has evolved with PHP 8, there are still a lot of websites running on a version of PHP that is no longer supported. If you are a PHP developer working with legacy PHP systems and wish to discover the tenants of modern PHP, this book is a perfect solution for you.

This book covers the following exciting features: 
* Understand how to use modern PHP features such as objects, types, and more
* Get to grips with PHP package management using Composer
* Explore dependency injection for your PHP applications
* Discover the difference between legacy and modern PHP 8 code and practice
* Write clean PHP code and implement design patterns
* Get hands-on with modern PHP using examples applying MVC and DI techniques

If you feel this book is for you, get your [copy](https://www.amazon.com/dp/1800566158) today!

<a href="https://www.packtpub.com/?utm_source=github&utm_medium=banner&utm_campaign=GitHubBanner"><img src="https://raw.githubusercontent.com/PacktPublishing/GitHub/master/GitHub.png" 
alt="https://www.packtpub.com/" border="5" /></a>


## Instructions and Navigations
All of the code is organized into folders. For example, Chapter02.

The code will look like the following:
```
<?php

declare(strict_types=1);

namespace Book\Part1\Chapter1;

use Book\Part1\Chapter1\Simple\SimpleClass;

require __DIR__ . '/../../../vendor/autoload.php';

$instance = new SimpleClass();
echo "\n" . $instance->name; // Simon

$instance2 = new SimpleClass('Sally');
echo "\n" . $instance2->name; //Sally
```

**Following is what you need for this book:**
	The book is for existing PHP developers and CTO-level professionals who are working with PHP technologies, including legacy PHP, in production. The book assumes beginner-level knowledge of PHP programming as well as experience with server-side development.

With the following software and hardware list you can run all code files present in the book (Chapter 1-12).

### Software and Hardware List

| Chapter  | Software required                   | OS required                        |
| -------- | ------------------------------------| -----------------------------------|
| 1-11        | php 8.0                    | Windows, Mac OS X, and Linux (Any) |
| 12        | php 8.1          | Windows, Mac OS X, and Linux (Any) |

### Related products <Other books you may enjoy>
* PHP 8 Programming Tips, Tricks and Best Practices [[Packt]](https://www.packtpub.com/product/php-8-programming-tips-tricks-and-best-practices/9781801071871) [[Amazon]](https://www.amazon.com/dp/180107187X)

* Drupal 9 Module Development - Third Edition [[Packt]](https://www.packtpub.com/product/drupal-9-module-development-third-edition/9781800204621) [[Amazon]](https://www.amazon.com/dp/1800204620)

## Get to Know the Author
**Joseph Edmonds**
is a business owner, developer, and author. He is a Zend Certified
Engineer, among his other credentials.
He's been a part of the e-commerce, tech, and PHP development worlds since the dawn of
the millennium. He witnessed the exploding growth of e-commerce from the early days,
helping several companies advance and expand their operations. During this time, he has
had the pleasure of seeing PHP grow from a fairly amateur language, punching way above
its weight, into a modern and highly performant language for serious enterprise projects.
Responding to a growing demand for highly specialized PHP development services, he
launched Edmonds Commerce in 2007. As an
independent agency, Edmonds Commerce provides highly specialist PHP development
services to businesses that use open source PHP, and predominantly Magento, as the
backbone of their online systems, solving even the most complex and unique PHP
development challenges.
As a way to offer a high-level, interrelated service to businesses who want to accelerate
their growth, he started an exciting new venture in 2020. LTS (Long Term Support Ltd.)
provides expert help in recruitment, training, DevOps and infrastructure, consultancy,
and development.


