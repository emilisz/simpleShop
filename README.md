# simpleShop

Simple shop project 

## Getting Started

Before launching application you need to:
1.  Download project.
2.  Rename env.example to .env and change your database values.
    
    DB_USERNAME='adeo'
    DB_PASSWORD='password'

3.  Run 

```
    composer update --no-scripts
```

4.  Lauch migration and seeders

```
    php artisan migrate --seed
```



6.  Set application encryption key 'php artisan key:generate'

```
   php artisan key:generate
```

7.  Set link to images:

```
   php artisan storage:link
```

8.  Log in into application with credentials 'adeo' and 'password'


### End you are ready to go!
