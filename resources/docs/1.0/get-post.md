# Get Post

`/api/v1/posts/{id}/`

<hr>
<larecipe-badge type="success" rounded>GET</larecipe-badge>
<hr>
This returns the post of `{id}`
<hr>

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
```
