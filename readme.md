# it-jobsight

**JobSight -- based on Laravel**

*** needs ::

* installer **composer** [https://getcomposer.org/](https://getcomposer.org/)
* installer **git** [https://git-scm.com/](https://git-scm.com/)
* installer **nodejs** [https://nodejs.org/en/](https://nodejs.org/en/) 
* installer **yarn** [https://classic.yarnpkg.com/en/docs/install/#windows-stable](https://classic.yarnpkg.com/en/docs/install/#windows-stable)


Download and Installation :
========================

### 1. Clone or download repository.

```
git clone https://github.com/AbdaliDahir/it-jobs.git
```

### 2. Run composer.
```
composer install
```

### 3. create database && seeding database with test data.

```   
php artisan migrate
php artisan db:seed
php artisan key:generate
```

### 4. install front packages.

help cmds:

```
npm install
npm run dev
npm run watch
```

### 5.  run project

```
php artisan serve --port=18085
```

### 6.  clear cache

```
php artisan cache:clear
php artisan route:clear
```

don't miss to run apache - mysql

Enjoy!
