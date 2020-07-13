# Lando Wordpress site template

A no-frills boilerplate Wordpress project for theme development based on [Lando](https://lando.dev) v3.x. 

You can use it with any theme. 

It's meant to be used with [Timber](timber.github.io/docs/) and [ACF Pro](https://www.advancedcustomfields.com/). 

## Installation

1. Install Lando 3.x and its prerequisites
2. Clone this repo and `cd` to the repo folder
3. Create an `.env` file with `ADMIN_EMAIL=youremail@domain.tld` entry. You can also add your ACF Pro key here as `ACF_PRO_KEY`
4. Run `lando start`
5. Once finished, run `lando install` — this will perform an automated install of Wordpress, activate all plugins and install a default theme (twentytwenty). 

You can (should) add your own theme in the mix. After installing it to the `themes` folder, add the theme folder name as an exception to `.gitignore`. 

## Installation info and default credentials

Core Wordpress is installed into `/wp` folder, and all content goes into `/wp-content`. Couldn't be simpler!

Default credentials are the same as in the original [Lando Wordpress recipe](https://docs.lando.dev/config/wordpress.html) by default.

## Connecting to MySQL externally

Use port `32841` to connect to the database externally (eg. with [Sequel Ace](https://github.com/Sequel-Ace/Sequel-Ace)).

## Miscellaneous

Keep in mind that you must include Timber in your theme in order for it to work: 

```
$composer_autoload = __DIR__ . '/../../vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}
```
