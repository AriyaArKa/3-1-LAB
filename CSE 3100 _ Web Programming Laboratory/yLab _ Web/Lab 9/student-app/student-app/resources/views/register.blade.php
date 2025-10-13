<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Using same Bootstrap as other pages -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Register</h2>

        <!-- Success Message -->
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('registerSave') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name"
                       value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email"
                       value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password"
                       class="form-control"
                       id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
            <a href="{{ route('login') }}" class="btn btn-secondary">Back to Login</a>
        </form>
    </div>
</body>
</html>
