# Kurort (Command-line interface)

## Introduction

**Kurort** is an application for easy management of your personal web server that supports the Ubuntu system. Kurort tries to simplify the work with the processes necessary for most PHP applications, such as:

* Create Nginx virtual host 
* Adding new MySQL databases
* Scheduled cron jobs
* Supervisor Process Management


## Getting started

Connect to your server as root via SSH

```
ssh root@your.server
```

Download the installation script, and run it:

```bash
curl http://example.com/install.sh | bash
```

Follow the installation instructions. As a result, PHP, Composer, MySQL, Nginx, Redis, and Supervisor will be installed on your server.


## Kurort way


After installation, a new user `kurort` will be created on your server, whose home directory all projects will be located. All Cron tasks will be executed on behalf of this user, and it will also be used to connect to MySQL.

Whenever you need it (Almost all the time) to work on your applications and not on the server settings, you must perform operations under this user. You can easily log in under it using the command:

```bash
su kurort
```

## Composer

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

## Requirements

These are the following requirements to run Kurort properly on your server.

- [Ubuntu](https://ubuntu.com/) (LTS preferred)
- 512MB RAM or more
- 1 CPU core or more
- Solid internet connection
- 2GB free hard disk space (for Nginx, MySQL etc.)

## Support

Do you have a question and need help with Kurort? Don't worry. We're here to help!

As a first step, check the detailed documentation. If you find your question is not answered within the documentation,
there's a fair chance that it may be relevant to more people. Please do not hesitate to file your question as an issue
so others can also participate.

Do you want to support? Awesome! Let's start with letting the world know why you think Kurort is awesome and try to help
others get on board!
Send a tweet, write a blog post, give a talk at your local user group or conference. There are many ways you can help.
You can always reach out to us in private and help others in our support channels. Thank you!


## License

Kurort is open-source software released under the [MIT license](LICENSE), which means you can modify the code yourself or hire a freelancer if needed. Also, you can always check the code and make sure there are no backdoors or spyware modules in it.

