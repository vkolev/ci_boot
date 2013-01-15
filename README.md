CodeIgniter Boot
================

This is the boot configuration for my CodeIgniter based projects

It's still in the beginning but the important part is done for now in the `MY_Controller.php` and `MY_Model.php` files
where the hard work for working with Models and Controllers is done.

Some feaatures:

Model
-----

Very generic

* CRUD (get/insert/delete/)
* Selector (by)
* Convention: Models are in singular and table names are plural, Models and with `_model.php`

Controller
----------

* Allow autoloading views (`_remap`)
* Load the language library and for each controller load the language file

Languages (i18n)
----------------

Internationalization can be configured in `MY_Lang.php` where you can define new languages in the `$languages` array and
 you can escape some section of your site in the `$special` array. Don't forget to add default redirect if no language
 is set in the URL.

Next to configure for the internationalization is the `routes.php` file in the `application/config` filder. 

    $route['^en/(.+)$'] = "$1";
    $route['^en$'] = $route['default_controller'];

For any other language change the `en` and create a folder like in `MY_Lang.php` in `application/language`
