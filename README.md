# Lando Wordpress site template

A no-frills Wordpress project template for theme development using [Lando](https://lando.dev) v3.x.

You can add any theme to it.

It's meant to be used with [ACF Pro](https://www.advancedcustomfields.com/), so that dependency is baked in.


## Installation

1. Install Lando 3.x and its prerequisites
2. Clone this repo and `cd` to the repo folder
3. Create an `.env` file and add:
   1. your ACF Pro key here as `ACF_PRO_KEY`
4. Replace `lando-wp-site-template` and `lando-wp-site-theme` with your preferred name across the project (`.gitignore`, `.lando.yml`)
5. Run `lando start`
6. Once finished, either continue with configuring the WP install manually by opening the site URL displayed in CLI or run `lando wpinstall` — this will perform an automated install of Wordpress, activate all plugins and install a default theme (twentytwentytwo).

Next add your own theme in the mix and install it to the `themes` folder. Keep in mind that the name of the theme should be same with what you renamed `lando-wp-site-theme` to.


## Installation info and default credentials

Core Wordpress is installed into `/wp` folder, and all content goes into `/wp-content`. Couldn't be simpler!

Default credentials are the same as in the original [Lando Wordpress recipe](https://docs.lando.dev/wordpress/getting-started.html) by default.


## Adding plugins

Add plugins to `composer.json` (Wordpress.org plugins can be added using https://wpackagist.org/). Run `lando composer update` to update plugins or install new ones.

New plugins installed via composer won't be automatically enabled to avoid issues, you will have to enable them yourself.


## Installation on server

Add a `wp-config.php` file to a parent folder of the installation and define database connection constants, salts, table prefix there.

Also add a `WP_CONTENT_DIR` constant to the `wp-config.php` file, pointing to the `/wp-content` folder (the path must be absolute), and `WP_CONTENT_URL` with an absolute URL (eg. `https://example.com/wp-content`).

Don't forget to `require_once` composer's `autoload.php` and load `.env` via [Dotenv class](https://github.com/vlucas/phpdotenv).

You can omit the "Happy publishing!" part.

You should also add an `index.php` to the parent folder with an updated path to `wp-blog-header.php` file.


## Connecting to MySQL externally

Use port `32862` to connect to the database externally (eg. with [Sequel Ace](https://github.com/Sequel-Ace/Sequel-Ace)).
