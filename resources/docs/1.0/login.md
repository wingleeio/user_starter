# Login

`/api/v1/login/`

<hr>
<larecipe-badge type="success" rounded>POST</larecipe-badge>
<hr>
This logins a user using given credentials.
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
    "email": "wing_132@live.com",
    "password": "password"
}
```

## Example Response

```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQ5ZmM0M2JmZTU4MmVjODVmOTIyOWFjODMzYjUyYzk3YWNiMDA5NGVmYzE4MDBhNzM4NWY0ZjQ4ZDE2MWRiMTI0ZWM5MzQ2NmUxMTRmYjkxIn0.eyJhdWQiOiIxIiwianRpIjoiNDlmYzQzYmZlNTgyZWM4NWY5MjI5YWM4MzNiNTJjOTdhY2IwMDk0ZWZjMTgwMGE3Mzg1ZjRmNDhkMTYxZGIxMjRlYzkzNDY2ZTExNGZiOTEiLCJpYXQiOjE1NjkxOTYxNjYsIm5iZiI6MTU2OTE5NjE2NiwiZXhwIjoxNjAwODE4NTY2LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.LZ9BixLFz3_Ts8wpMNbgvzNZ6w7c9sf4ZeXtT2cSZP53FRrT3pG_GOVI7mUMSzCvkIwhpSCDFuwWxrOqJu8-kzcmHR5HPpfF8bBJRj3wjq_A-0qbXXn7dR7izv-N-rD0TfXhVCo3bPU403QRe_CanDKiLAce6Fhpu5y51qFET7QT3y5gf5ch2R_2BjiAStmHFUXC4r9YP859oi7tbZNdb-q4Qki0LyLwUyvcJV9U-l0AgJtp5ANLnfP6Lxcqr2esGdEGZb40s-2HERCNMYqhwkMve0KuAu-E6oWcCesdJX3X6ppESk3FKt-TUNkTCo9CiqN3Cltf98oEAF4FDyJLR6VvopUwt_5IftFaQsZrH90NsMS6Si1saifJiND_pUdh3-_etSGTKbFrGV24YuTjj5OGYk3b4HnWMTUn8xJTW55tlgjLC3llD9TgNQRjhcbjRNjpahG9rT3AoaGUW5CiAXUP3hvYNd5M0Bxtw-FBc7WwJFFZXCaPZJIpWBKtQ-ceT3ATHLOXkTTvJlCC2cU9oaYinHVb_IAHuoZ4MnUfPbhQjNoBsNENgUoQp1dgOpKI9dvepXSZTsjV4H3R10N5GhIHPSXmgjFXdTGCXuHktGKhqMkvGqnfu60_EMd8H65vUkKVMiFAagMBOFuSx_lr1Du7qCHg5yEaYwZ2ZYijjCA",
    "user": {
        "id": 2,
        "name": "wing",
        "email": "wing_132@live.com",
        "email_verified_at": null,
        "created_at": "2019-09-21 17:23:36",
        "updated_at": "2019-09-21 17:23:36"
    }
}
```
