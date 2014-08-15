## Laravel PHP Framework

This is a boilerplate for new Laravel apps. Please check out Laravel at [their web site](http://laravel.com/).

### EditorConfig

raptblue/framework uses a `.editorconfig` file to enforce code standards.  You can find out more and download a plugin for your editor or IDE at [editorconfig.org](http://editorconfig.org).

### Composer Packages

raptblue/framework includes the following extra packages:
````
"phpunit/phpunit"
"mockery/mockery"
"zizaco/factory-muff"
"way/generators"
````

### Testing

raptblue/framework includes folders for `functional`, `integration`, and `unit` tests.
`TestCase.php` is also setup to migrate the database at the beginning of each run (to SQLite in-memory) and is configured to use FactoryMuff.
