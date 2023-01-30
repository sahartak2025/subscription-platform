# Subscription platform laravel

## Deployment

To deploy this project follow steps below

* Copy project to your local machine

* Copy .env.example to .env

* Configure local domain and set as root public folder of project

* Create new database with name 'subscription-platform' or another (if name is different please update 'DB_DATABASE' and
  all database configs property in .env file)

* Currently, used mailer is mailtrap (add 'MAIL_USERNAME' and 'MAIL_PASSWORD' to .env or configure another mailer)

* Run from project root

```bash
  composer install
```

```bash
  php artisan migrate:seed
```

* Configure cronjob in your local environment with period (* * * * *) for command, or run manually from project root

```bash
  php artisan dispatch:post-emails
```

* Configure supervisor in your local machine for commands below, or run manually from project root 

```bash
   php artisan queue:listen --queue=post-created
```

```bash
   php artisan queue:listen --queue=send-emails
```
* (current queue connection is
  database but if you want to use different connection configure it on .env and set 'QUEUE_CONNECTION' match to
  connection name)

## API Reference

#### Create post

```http
  POST /api/post
```

| Parameter    | Type     | Description                |
|:-------------|:---------|:---------------------------|
| `title`      | `string` | **Required**. Post title   |
| `content`    | `string` | **Required**. Post content | 
| `website_id` | `int`    | **Required**. Website id   | 

#### Subscribe

```http
  POST /api/subscribe
```

| Parameter    | Type     | Description                    |
|:-------------|:---------|:-------------------------------|
| `email`      | `string` | **Required**. Subscriber email |
| `website_id` | `int`    | **Required**. Website id       |

* In project root you can find file Subscription-platform.postman_collection.json which is postman collection with existing endpoints (if your configured domain is different from 'http://subscription-platform.local' please replace it on postman collection before making api calls)


