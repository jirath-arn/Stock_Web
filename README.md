# Stock Web

## How to use

- Clone the repository with `git clone https://github.com/jirath-arn/Stock_Web.git`
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate:fresh --seed` (it has some seeded data for your testing)
- Run `php artisan storage:link`
- That's it: launch the main URL and login with default credentials (__admin@admin.com__ - __12345678__) or (__user@user.com__ - __12345678__)