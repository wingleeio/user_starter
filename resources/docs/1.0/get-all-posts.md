# Get All Posts

`/api/v1/posts/`

<hr>
<larecipe-badge type="success" rounded>GET</larecipe-badge>
<hr>
This returns all posts in queried page.
<hr>

## Query

| Property | Value  |
| :------- | :----- |
| Page     | Number |

## Response Object

| Property                         | Value                               |
| :------------------------------- | :---------------------------------- |
| id                               | Number                              |
| created_at                       | Date                                |
| updated_at                       | Date                                |
| content                          | Text                                |
| reposts_count                    | Number                              |
| likes_count                      | Number                              |
| liked_by_user (authenticated)    | Boolean                             |
| reposted_by_user (authenticated) | Boolean                             |
| author                           | [User](/{{route}}/{{version}}/user) |

<hr>

## Example Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "created_at": "2019-09-22 22:14:10",
            "updated_at": "2019-09-22 22:14:10",
            "content": "testing",
            "user_id": 1,
            "reposts_count": 4,
            "likes_count": 1,
            "liked_by_user": false,
            "reposted_by_user": true,
            "author": {
                "id": 1,
                "name": "wing",
                "email": "wing_13@live.com",
                "email_verified_at": null,
                "created_at": "2019-09-16 05:07:59",
                "updated_at": "2019-09-16 05:07:59"
            }
        },
        {
            "id": 2,
            "created_at": "2019-09-22 22:15:05",
            "updated_at": "2019-09-22 22:15:05",
            "content": "lorem ipsum",
            "user_id": 1,
            "reposts_count": 0,
            "likes_count": 0,
            "liked_by_user": false,
            "reposted_by_user": false,
            "author": {
                "id": 1,
                "name": "wing",
                "email": "wing_13@live.com",
                "email_verified_at": null,
                "created_at": "2019-09-16 05:07:59",
                "updated_at": "2019-09-16 05:07:59"
            }
        },
        {
            "id": 3,
            "created_at": "2019-09-22 22:15:54",
            "updated_at": "2019-09-22 22:15:54",
            "content": "lorem ipsum",
            "user_id": 1,
            "reposts_count": 0,
            "likes_count": 0,
            "liked_by_user": false,
            "reposted_by_user": false,
            "author": {
                "id": 1,
                "name": "wing",
                "email": "wing_13@live.com",
                "email_verified_at": null,
                "created_at": "2019-09-16 05:07:59",
                "updated_at": "2019-09-16 05:07:59"
            }
        },
        {
            "id": 4,
            "created_at": "2019-09-22 22:17:13",
            "updated_at": "2019-09-22 22:17:13",
            "content": "im julia",
            "user_id": 3,
            "reposts_count": 0,
            "likes_count": 0,
            "liked_by_user": false,
            "reposted_by_user": false,
            "author": {
                "id": 3,
                "name": "julia",
                "email": "julia@live.com",
                "email_verified_at": null,
                "created_at": "2019-09-22 22:16:44",
                "updated_at": "2019-09-22 22:16:44"
            }
        },
        {
            "id": 5,
            "created_at": "2019-09-22 22:17:19",
            "updated_at": "2019-09-22 22:17:19",
            "content": "wing is cooler than me",
            "user_id": 3,
            "reposts_count": 1,
            "likes_count": 0,
            "liked_by_user": false,
            "reposted_by_user": true,
            "author": {
                "id": 3,
                "name": "julia",
                "email": "julia@live.com",
                "email_verified_at": null,
                "created_at": "2019-09-22 22:16:44",
                "updated_at": "2019-09-22 22:16:44"
            }
        }
    ],
    "first_page_url": "http://user.bootstrap/api/v1/posts?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://user.bootstrap/api/v1/posts?page=1",
    "next_page_url": null,
    "path": "http://user.bootstrap/api/v1/posts",
    "per_page": 15,
    "prev_page_url": null,
    "to": 5,
    "total": 5
}
```
