<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## API Reference

#### Register

```http
  POST /api/auth/register
```

| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required** |
| `password` | `string` | **Required** |

#### Login

```http
  POST /api/auth/login
```

| Body | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required** |
| `password`      | `string` | **Required** |

#### Logout

```http
  GET /api/auth/logout
```

#### Get Current Login User

```http
  GET /api/auth/user
```


## Authors

- [Ahmad Muhajir](https://www.github.com/JeremyJFN71)
- [Luthfi](https://www.github.com/Kaizen1410)
- [Vickry Kamaludin](https://www.github.com/Vickry19)

