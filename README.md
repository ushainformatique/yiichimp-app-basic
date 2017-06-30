YiiChimp Basic Project Template
============================

This template is evolved from Yii2 Basic Project Template.

The template contains the basic features provided by Yii2 along with the addition of demo client module which would demonstrate the crud operations using
YiiChimp architectural changes.

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:^1.3.1"
php composer.phar create-project --prefer-dist ushainformatique/yiichimp-app-basic yiichimpbasic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/yiichimpbasic/web/
~~~


### Install from an Archive File

Extract the archive file downloaded from [github.com](http://www.github.com/ushainformatique/yiichimpbasic) to
a directory named `yiichimpbasic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/yiichimpbasic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yiichimp',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

**NOTES:**
- YiiChimp won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.

Install Framework Modules Tables and Data
-----------------------------------------

The framework is provided with modules like users, auth, settings, services and notifications. In case the tables and data for these modules has to be installed, the following commands has to be executed.

yii build/tables
yii build/super
yii build/data

The first command would build the module tables. The second command would install the super user for the application. The third command would install the data for the modules.
    