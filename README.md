

### Install


#### First install the dependencies
```shell
composer update
composer install
npm install
npm run build
cp .env.example .env
```

### Run

#### before you run for the first time (only for the first time)
```shell
php artisan key:generate
php artisan migrate
php artisan storage:link
```

#### Create Admin
```shell
php artisan make:admin admin1 admin@admin.admin adminos
```

#### Run the servers on two different terminals.
```shell
php artisan serve # for the backend, first terminal
npm run dev # for the frontend, second terminal
```

#### to clear the db and test with new data
```shell
php artisan migrate:fresh
```

maybe
```shell
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

Admin
```shell
LOGIN
admin@admin.admin
adminos
```

students
```shell
LOGIN
selhassar@rcenter.com
selhassar@rcenter.com
```

Professors
```shell
LOGIN
sradah@rcenter.com
sradah@rcenter.com

LOGIN
amotonabi@rcenter.com
amotonabi@rcenter.com

LOGIN
rzelmat@rcenter.com
rzelmat@rcenter.com

LOGIN
mraoui@rcenter.com
mraoui@rcenter.com
```


