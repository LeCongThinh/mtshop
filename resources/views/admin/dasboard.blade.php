<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
</head>

<body>
    @auth
        @if(Auth::user()->role === "admin")
            xin chao admin
        @elseif(Auth::user()->role === "staff")
            xin chao nhan vien
        @endif
    @endauth
</body>

</html>