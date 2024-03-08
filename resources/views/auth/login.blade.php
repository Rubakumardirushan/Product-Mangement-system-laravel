<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>

<div class="login-container">
    <div class="login-form">
        <h2 class="login-header">Login Page</h2>
        <form action="{{ route('auth.login') }}" method="POST">
            <label for="email" class="login-label">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" class="login-input">
            <label for="password" class="login-label">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" class="login-input">
            <button type="submit" class="login-submit">Login</button>
            @csrf
        </form>
        @if($errors->any())
            <ul class="error-message">
                {!! implode('',$errors->all('<li>:message</li>')) !!}
            </ul>
        @endif
        <div class="register-link">
            Don't have an account? <a href="/register">Register here</a>
        </div>
    </div>
</div>

</body>
</html>
