## CodeIgniter 4 REST API Integration with JWT
This toolkit is for people who like to build web REST API's with token based structure like JWT using PHP. Its goal is to enable you to develop api much faster than you could if you were writing code from scratch, by providing a template for your workings with the REST API with JWT based tokens.

*********************
**Release Information**
*********************
This repo contains in-development code for future releases.

*********
**Features**
*********

1. Complete REST API control
2. JWT based access tokens
3. CRUD operations
4. Register/Login/Regenerate Token Mechanism
5. Proper Authentication
6. Validation control
7. DB migration given
8. Routing handled
9. Postman collection added

***********
**Setup Instruction**
***********

- Rename `env` to `.env` and tailor for your app.
- Change `JWT_SECRET_KEY` & `JWT_TIME_TO_LIVE` according to your need.
- Change `app.baseURL` in .env
- Change DB credentials accordingly in .env
- Create a database with the same name in MySQL.
- Run command `php spark migrate` to create database tables from CI Migration. 
- Open postman and import `RESTAPI_JWT_CI.postman_collection.json`.
- Register a User.
- Login with that user to get the `access_token`.
- To perform crud operations you have to supply the `access_token` in `Authorization->Type->Bearer Token` for authorization with other data in body section.
- If `access_token` expired, you can also regenerate `access_token` by providing `email`.

> [!IMPORTANT]
> Initially `access_token` has been set for 60 minute.

> [!WARNING]
> `JWT_SECRET_KEY` must be changed for your own protection in production environment.
***********************
**Postman Calls & Methods**
***********************

#### Register & Login

POST : [http://localhost/api_jwt_ci4/public/register](http://localhost/api_jwt_ci4/public/register)

|Body     |
|---------|
|name     |
|email    |
|password |

POST : [http://localhost/api_jwt_ci4/public/login](http://localhost/api_jwt_ci4/public/login)

|Body     |
|---------|
|email    |
|password |

![https://imgur.com/a/dhGd7MW](https://i.imgur.com/QgZyscb.png "Postman Login API Check")

### CRUD

GET : [http://localhost/api_jwt_ci4/public/client](http://localhost/api_jwt_ci4/public/client)

|Headers      |Body     |
|-------------|---------|
|Authorization|         |

![https://imgur.com/oA4iScY](https://i.imgur.com/oA4iScY.png "Bearer Token Submission")

POST : [http://localhost/api_jwt_ci4/public/client](http://localhost/api_jwt_ci4/public/client)

|Headers      |Body        |
|-------------|------------|
|Authorization|name        |
|             |email       |
|             |retainer_fee|

PUT : [http://localhost/api_jwt_ci4/public/client/:id](http://localhost/api_jwt_ci4/public/client/:id)

|Headers      |Body        |
|-------------|------------|
|Authorization|name        |
|             |retainer_fee|

DELETE : [http://localhost/api_jwt_ci4/public/client/:id](http://localhost/api_jwt_ci4/public/client/:id)

|Headers      |Body     |
|-------------|---------|
|Authorization|         |

### Token Regeneration

POST : [http://localhost/api_jwt_ci4/public/reGenToken](http://localhost/api_jwt_ci4/public/reGenToken)

|Body     |
|---------|
|email    |

![https://imgur.com/eztIRpq](https://i.imgur.com/eztIRpq.png "Regeneration of Token after expires")

*******************
Server Requirements
*******************

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

*******************
References
*******************

- [twilio](https://www.twilio.com/blog/create-secured-restful-api-codeigniter-php)
