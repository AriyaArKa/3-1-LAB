<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Use same Bootstrap as other views -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5 text-center">
        <!-- Big Welcome Sign -->
        <h1 class="display-4 text-primary mb-4">
            Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }}
        </h1>

        <!-- Buttons -->
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('student.index') }}" class="btn btn-success btn-lg mx-2">
                Manage Students
            </a>

            <a href="{{ route('logout') }}" class="btn btn-danger btn-lg mx-2">
                Logout
            </a>
        </div>
    </div>

</body>
</html>
