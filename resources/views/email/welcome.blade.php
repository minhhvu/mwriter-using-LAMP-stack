<html>
    <head></head>
    <body>
        <h4>Hi {{$user->name}}</h4>
        <p>Welcome to be a part of our team. We hope you will have the wonderful time with Mwriter.</p>
        <p>To start, log in and experience all features.</p>
        <a href="{{route('homepage').'/login'}}">Login</a>
    </body>
</html>