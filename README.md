# Command-line interface / Commands

## Introduction

**Kurort** is an application for easy management of a personal server.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec suscipit augue fringilla, euismod eros sit amet,
malesuada felis. Curabitur scelerisque tempus porttitor.

Nullam lobortis justo a cursus efficitur. Aliquam erat volutpat. Nunc eu lacus ligula. Nunc pretium, ipsum id volutpat
elementum, odio elit ultricies purus, sed euismod neque tellus vel ipsum.

## Getting started

Kurort utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using Kurort, make sure you have Composer installed on
your machine.

```bash
composer global require kurort/cli
```

Make sure to place Composer's system-wide vendor bin directory in your `$PATH` so the Kurort executable can be located
by your system. This directory exists in different locations based on your operating system; however, some common
locations include for GNU / Linux Distributions: `$HOME/.config/composer/vendor/bin` or `$HOME/.composer/vendor/bin`

You could also find the composer's global installation path by running `composer global about` and looking up from the
first line.

In ullamcorper lorem velit, id fringilla metus ornare vitae. Phasellus facilisis nibh dolor, ac laoreet orci ultrices
at. Nulla risus orci, ultricies quis elementum sit amet, tincidunt ac mi. Pellentesque vehicula volutpat ligula, in
dapibus dolor. Maecenas sit amet consectetur nibh, et hendrerit justo. Donec pellentesque nunc eu purus eleifend,
feugiat viverra erat facilisis. Fusce tempus dignissim lacus, at molestie magna aliquam ut. Morbi lacinia sapien sed
mauris tincidunt, sit amet ullamcorper odio feugiat. Duis in sagittis diam. Aenean congue lorem mi, quis tristique urna
sollicitudin malesuada.

## Support

Do you have a question and need help with Kurort? Don't worry. We're here to help!

As a first step, check the detailed documentation. If you find your question is not answered within the documentation,
there's a fair chance that it may be relevant to more people. Please do not hesitate to file your question as an issue
so others can also participate.

Do you want to support? Awesome! Let's start with letting the world know why you think Kurort is awesome and try to help
others get on board!
Send a tweet, write a blog post, give a talk at your local user group or conference. There are many ways you can help.
You can always reach out to us in private and help others in our support channels. Thank you!

## Tests

To run the test suite, you first need to clone this repo and then install all
dependencies [through Composer](https://getcomposer.org):

```bash
$ composer install
```

To run the test suite, go to the project root and run:

```bash
$ php vendor/bin/phpunit
```

## License

Laravel Installer is open-sourced software licensed under the [MIT license](LICENSE).
