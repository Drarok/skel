# Skel

This is a ready-to-roll skeleton app using:

* [Silex](https://silex.symfony.com) microframework
* [Supermodel](https://github.com/drarok/supermodel) models
* [Ladder](https://github.com/drarok/ladder2) database migrations
* [Bootstrap](http://getbootstrap.com) CSS
* [jQuery](https://jquery.com)

## Quick Start

* Clone this repository
* Copy and edit the sample config files (`/ladder.sample.json`, and `/config/db.sample.json`)
* Create your own controllers and other classes either in the Skel namespace, or your own (don't forget to update `composer.json` if you create your own)
* Register your routes in `src/app.php`
* (Optional) Remove the example `HomeController`
* Enjoy!

## Creating database tables via migrations

Skel doesn't offer any "magic", but does include a database migrations tool, [Ladder](https://github.com/drarok/ladder2). To create a migration:

```bash
vendor/bin/ladder create 'Migration name'
```

This will create a file, and show you its path for editing.

An example migration would look something like this:

```php
class Migration1504867317 extends AbstractMigration
{
    public function getName()
    {
        return 'Create users table';
    }

    public function apply()
    {
        Table::factory('users')
            ->addColumn('id', 'autoincrement', ['null' => false, 'unsigned' => true])
            ->addColumn('username', 'varchar', ['null' => false, 'limit' => 50])
            ->addColumn('passwordHash', 'varchar', ['null' => false, 'limit' => 255]) // Size recommended by http://php.net/manual/en/function.password-hash.php
            ->addIndex('PRIMARY', ['id'])
            ->addIndex('username', null, ['unique' => true])
            ->create()
        ;
    }

    public function rollback(array $data = null)
    {
        Table::factory('users')
            ->drop()
        ;
    }
}
```

After you've created a migration, you will need to apply it:

```bash
vendor/bin/ladder migrate
```
