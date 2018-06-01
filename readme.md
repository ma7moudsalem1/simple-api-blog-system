<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## About Api Blog System

Api Blog System is a simple laravel RESTFul api system that contain authentication system (Login & Registration), Articles, Comments. The system handle all different requests. You can use the system online by this route http://ma7moudsalem.com/websites/blog .  

## Online Route System

1. http://ma7moudsalem.com/websites/blog/api/register
Method: POST
Auth: NO
This route recieve 
    Name     => String 
    E-mail   => Email 
    Password => String 
If the process success return (User Token)

2. http://ma7moudsalem.com/websites/blog/api/login
Method: POST
Auth: NO
This route recieve :
    E-mail   => Email 
    Password => String
If the process success return (User Token)

3. http://ma7moudsalem.com/websites/blog/api/articles
Method: GET
Auth: No
This route recieve no data : 
Return paginate articles data (10 per page)

4. http://ma7moudsalem.com/websites/blog/articles/{id}
Method: GET
Auth: No
This route recieve no data : 
Return single active ( status = 1 ) article

5. http://ma7moudsalem.com/websites/blog/api/articles
Method: POST
Auth: Yes
This route recieve : 
Title => String 
Content => Text 
* User Id will set by user login 
If the process success return this added data article

6. http://ma7moudsalem.com/websites/blog/articles/{id}
Method: PUT
Auth: Yes
This route recieve : 
Title => String 
Content => Text 
* Non of this data is required 
* Only creator this article can update this article 
If the process success return this data article

7. http://ma7moudsalem.com/websites/blog/articles/{id}
Method: DELETE
Auth: Yes
This route recieve no data : 
* Only creator this article can delete this article 
If the process success return null response

8. http://ma7moudsalem.com/websites/blog/article-id/comments
Method: GET
Auth: No
This route recieve no data : 
Return paginate data (10 per page)

9. http://ma7moudsalem.com/websites/blog/article-id/comments/{id}
Method: GET
Auth: No
This route recieve no data :
* Article must be active (status = 1)
Return single comment 

10. http://ma7moudsalem.com/websites/blog/article-id/comments
Method: POST
Auth: Yes
This route recieve : 
Comment => Text 
* Article must be active (status = 1)
Return new single comment data

11. http://ma7moudsalem.com/websites/blog/article-id/comments/{id}
Mehod: PUT
Auth: Yes
This route recieve :
Comment => Text
* Article must be active (status = 1)
* Only comment creator can be update the comment
Return updated single comment data

12. http://ma7moudsalem.com/websites/blog/article-id/comments/{id}
Method: DELETE
Auth: Yes
This route recieve no data :
* Article must be active (status = 1)
* Only comment creator can be delete the comment
Return null

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.
