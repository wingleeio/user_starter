# Repost Post

`/api/v1/repost/`

<hr>
<larecipe-badge type="success" rounded>POST</larecipe-badge>
<hr>
This reposts a post with the given id.
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
    "post_id": 3
}
```

## Example Response

```json
{
    "post_id": 3,
    "user_id": 4,
    "updated_at": "2019-09-25 07:36:51",
    "created_at": "2019-09-25 07:36:51",
    "id": 2
}
```
