<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/AcaTisM/views/stylesheets/login.css">
</head>
<body>
<div class="login_box">
    <h1><a href=""></a>Login</h1>
    <form action="/Acatism/login/run" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <select name="type">
            <option value="-1">User type</option>
            <option value="teachers">Teacher</option>
            <option value="students">Student</option>
        </select>
        <input type="submit" name="submit">
    </form>
</div>
<div class="about_box">
    <h1>About</h1>
    <p>
        This is the login page of the ACATISM project. This project is amazing.
    </p>
    <p>
        <a href="https://www.youtube.com/watch?v=DkS8HSb7c4g">VIDEO</a>
    </p>
    <p>
        <a href="https://github.com/Kropius/AcaTisM">GITHUB</a>
    </p>
    <p>
        <a href="/Architecture/Documentatie.html">DOCUMENTATION</a>
    </p>
</div>

</body>
</html>