# E-shop

E-shop administration and api FE

## Installation

- Copy `.env.example` to `.env` file.
- Create `db` with credentials and change `DB_` params on `.env` file.
- For developing recommended to use `mailtrap.io`. Create an account and change `MAIL_` params on `.env` file.
- Run `composer install` command.
- Run `php artisan key:generate` command.
- Run `php artisan migrate` command.
- Run `php artisan storage:link` command.
- Run `php artisan passport:install` command.
- Change `APP_URL` by your own domain on `.env` file.
- Go to your domain on your browser.

**P.S.**: If don't use virtualization, run `php artisan serve` command. Use `--port` parameter if need different port.
