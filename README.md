# Stock Web

## How to use

- Clone the repository with `git clone https://github.com/jirath-arn/Stock_Web.git`
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate:fresh --seed` (it has some seeded data for your testing)