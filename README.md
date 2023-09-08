<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Run Locally

Clone the project

```bash
  git clone https://github.com/Kaizen1410/62App-BE-Laravel.git
```

Go to the project directory

```bash
  cd 62App-BE-Laravel
```

Install dependencies

```bash
  composer install
```

Create `.env` and copy all the content from `.env.example` to `.env`

Start the server

```bash
  php artisan serve
```



## API Reference

#### Login

```
  POST /api/auth/login
```

| Body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required** |
| `password`      | `string` | **Required** |

#### Logout

```
  GET /api/auth/logout
```

#### Get Current Login User

```
  GET /api/auth/user
```


## Authors

- [Ahmad Muhajir](https://www.github.com/JeremyJFN71)
- [Luthfi](https://www.github.com/Kaizen1410)
- [Vickry Kamaludin](https://www.github.com/Vickry19)

