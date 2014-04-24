Make a backup of your data first!
---------------------------------

Just in case.

Introduction
------------

This chapter describes the command line tools to handle your application database schema and data.
We'll use [schmunk42/database-command](https://github.com/schmunk42/database-command) to create migrations.

Create initial data (only) migration 
------------------------------------

After adding content to your development system, run the command

    ./yiic database dump initial_data \
    --createSchema=0 --truncateTable=1 --foreignKeyChecks=0
    
This will create a migration which includes a complete "dump" 
of your database, ready to use when deploying the production system.

Just copy the file from `app/runtime/` to `app/migrations` and commit it.

Please see the following section how to handle additional migrations, after the app has been deployed to a production system.

Get (only) the data from your production system
-----------------------------------------------

If you've already a running system, from which you want to use and maybe modify the existing data and schema, follow this workflow:

* Please note that you should add the following settings **only to your local and development** files!

* add `app/migrations/data` to `config/console-local.php` to `commandMap` => `migrate` => `modulePaths`
* add production database `dbProduction` to `config/development.php` under `components`

```     
    ./yiic database dump production_data \
    --dbConnection=dbProduction --createSchema=0 \
    --truncateTable=1 --foreignKeyChecks=0
```

> Note: You may want to run `composer update` in advance, to verify schema integrity with installed extensions.

* copy dump from `app/runtime/` to `app/migrations/data`

* excute dump (on default local database connection)

```
    ./yiic migrate
```

The new migration should appear in the list of to-be-executed migrations.

**Make sure that you do not accidentally run the data migration on production systems!**

> Hint: You can run the dump again, if you need to update the database with data from the production system. Remove the outdated `production_data` migration from your repo and create a new one. Git will treat it as a rename.