# Register

`/api/v1/register/`

<hr>
<larecipe-badge type="success" rounded>POST</larecipe-badge>
<hr>
This registers a user using given credentials.
<hr>

## Response Object

| Property | Value                               |
| :------- | :---------------------------------- |
| token    | String                              |
| user     | [User](/{{route}}/{{version}}/user) |

<hr>

## Post Data Example

```json
{
    "name": "julia",
    "email": "julia@3live.com",
    "password": "password",
    "password_confirmation": "password"
}
```

## Example Response

```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg1NDNmMDdlZmFhZmRiY2FiMjU4ZjliOWI5YWE5NDcyYmY3MDMwOGU0YTY4YTVkNWU0NGU0MTMxYzI0ZDRkZjM4NjY4MjNkYWUxMWQ3YmE4In0.eyJhdWQiOiIxIiwianRpIjoiODU0M2YwN2VmYWFmZGJjYWIyNThmOWI5YjlhYTk0NzJiZjcwMzA4ZTRhNjhhNWQ1ZTQ0ZTQxMzFjMjRkNGRmMzg2NjgyM2RhZTExZDdiYTgiLCJpYXQiOjE1NjkzODUzNjIsIm5iZiI6MTU2OTM4NTM2MiwiZXhwIjoxNjAxMDA3NzYyLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.eBiVa3sJedjIUMB47MhE-jR_ibgk33wDTJx0YMGSZuznahwB2Zxg2PJ5YSMr8kRHXPz6iV5HE6n6FL8dbK9hjvDX-FKgMPhRHUM0c2b9aFGv8ycWrK6ukzCBBsCdc7mtazVCLpf7dTJDsW7vLJiNAHHIlKOlk569I2NHvNM9OviMrkrRZj1OqF6ff22JB916ybuhyuJV6LuflCNV1xH5RTKCZQy5O2hnN8qMuvlf0Gt8kXoXynysvFdoEu6qUk9yF6lMUgc3ES8JCoT26GrrDnRZcbxXVjh8Y7orAahM841wcXmTw48seGEsnbT657GrrZnwSOf5Z70SCVEcQ6iHJe83zD65tfAaB6Uo3KRXVNRmLQi_p-4GNxHAdHoar1zpnhgOdLQ1w1mwJyHMkMDyDVX4RDXLVihpBLOecA9CpByoczpvYcjv4Y8El2GcRA-L0TkIu6LyfDlwk4mK0qlUcUV-qrp3BPG1O0VFUoAE4UVXC3LQfhXomR9MKI-qGBQAZllwxS7AT2Mjziu4juTxBh8bbp66bMCvfKfnaSGXTa5Mxx3Qf6O_k8p_WKA-BFUpbNbIPsS3i01BUM8uiYbWJh7b62G8ix54KZpTahcVWnS6TlZ1UX-tumyF2Bl3QuWbB9j7LBtmGnSxKQswIHPX-f-vAXrv7sfQJxS54aC_9vU",
    "user": {
        "name": "julia",
        "email": "julia@3live.com",
        "updated_at": "2019-09-25 04:22:42",
        "created_at": "2019-09-25 04:22:42",
        "id": 5
    }
}
```
