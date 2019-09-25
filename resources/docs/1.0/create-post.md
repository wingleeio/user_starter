# Create Post

`/api/v1/posts/`

<hr>
<larecipe-badge type="success" rounded>POST</larecipe-badge>
<hr>
This creates a new post.
<hr>

## Response Object

| Property   | Value  |
| :--------- | :----- |
| id         | Number |
| created_at | Date   |
| updated_at | Date   |
| content    | Text   |
| user_id    | Number |

<hr>

## Post Data Example

```json
{
    "content": "wing is cooler than me"
}
```

## Example Response

```json
{
    "content": "wing is cooler than me",
    "user_id": 3,
    "updated_at": "2019-09-25 07:31:18",
    "created_at": "2019-09-25 07:31:18",
    "id": 5
}
```
