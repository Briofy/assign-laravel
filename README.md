# assign-laravel
The official repository for assign module from Briofy for Laravel

## Installation
Require this package with composer using the following command:
```bash
composer require briofy/assign-laravel
```

## Configuration
After you installed `briofy/assign-laravel` package. Next, you need to **configure** laravel. You can publish configuration files and see config in `config/briofy-assign.php` config file.
For publishing config file run the following command in your terminal:
```bash
php artisan vendor:publish
```
Then select `briofy-assign-config` in the config list.

## Usage

We use Laravel jobs to implement the package functionalities. All jobs are published under `Briofy\Assign\Jobs` namespace.
By using Laravel native `dispatch_sync()` function you can dispatch the following jobs to interact with the package:
- AssignJob
- RevokeJob
- CheckIsAssignedJob
- GetAssignmentsJob

## Changelog

You can see the package [changelog](https://github.com/Briofy/assign-laravel/blob/main/CHANGELOG.md) here.
