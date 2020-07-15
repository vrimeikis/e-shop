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
- Create admin user run `php artisan backend:new-admin` command and follow instructions.
- Go to your domain on your browser.

**P.S.**: If don't use virtualization, run `php artisan serve` command. Use `--port` parameter if need different port.

## API

`URL`: http://domain.com/{endpoint}

### Headers

| Name      | Value            | Description                            |
|-----------|------------------|----------------------------------------|
| Accept    | application/json |                                        |
| Authorize | Bearer {$token}  | Need if route required to be logged in |

### Register

Url: `api/auth/register`
Method: `POST`

Post data:

```php
[
    'name' => 'required|string',
    'email' => 'required|string',
    'password' => 'required|string',
    'password_confirmation' => 'required|string',
]
```

- **201**

```json
{
  "token": "string",
  "token_type": "Bearer"
}
```

- **422**

```json
{
  "message": "string",
  "errors": {
    "email": [
      "string"
    ]
  }
}
```

### Login

Url: `api/auth/login`
Method: `POST`

Post data:

```php
[
    'email' => 'required|string',
    'password' => 'required|string',
]
```

- **202**

```json
{
  "token": "string",
  "token_type": "Bearer"
}
```

- **422**

```json
{
  "message": "string",
  "errors": {
    "email": [
      "string"
    ]
  }
}
```

### Logout

Url: `api/auth/logout`
Method: `POST`

- **202**

```json
```

### User

Logged in user data

Url: `api/user`
Method: `GET`

- **200**

```json
{
  "id": 1,
  "name": "string",
  "email": "string",
  "email_verified_at": "null|datetime",
  "created_at": "datetime",
  "updated_at": "datetime"
}
```

- **401**

```json
{
  "message": "Unauthenticated."
}
```

### Products list

Url: `/api/products`
Method: `GET`

Query parameters:

| Key    | Value   | Description |
|--------|---------|-------------|
| `page` | integer | Page number |

- **200**

```json
{
    "current_page": "integer",
    "data": [
        {
            "id": "integer",
            "title": "string",
            "slug": "string",
            "price": "integer",
            "vat": "string",
            "description": "null|string",
            "quantity": "integer",
            "created_at": "datetime",
            "updated_at": "datetime",
            "images": [
                "string",
                ...
            ],
            "media": [
                "media data"
            ]
        },
        ...
    ],
    "first_page_url": "string",
    "from": "integer",
    "last_page": "integer",
    "last_page_url": "string",
    "next_page_url": "null|string",
    "path": "string",
    "per_page": "integer",
    "prev_page_url": "null|string",
    "to": "integer",
    "total": "integer"
}
```