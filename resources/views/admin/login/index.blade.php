<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Login</title>
</head>
<body>
@if($errors->any())
    <h3>{{ $errors->first() }}</h3>
@endif
<form action="{{ route('admin.login.store') }}" method="post">
    @csrf
    <div>
        <input type="email" name="email" placeholder="Email">
    </div>
    <div>
        <input type="password" name="password" placeholder="password">
    </div>
    <div>
        <button type="submit">Войти</button>
    </div>
</form>
</body>
</html>
