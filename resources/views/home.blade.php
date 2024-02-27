<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allodoc</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            /* Replace 'background.jpg' with the path to your actual background image */
            background-image: url('images/background.jpg');
            background-size: cover;
        }
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .hero .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="container">
            <h1 class="display-4">Welcome to Allodoc</h1>
            <p class="lead">Your one-stop solution for all your medical needs. Connect with doctors, therapists, and manage your health records all in one place.</p>
            <div class="mt-5">
                <a href="/patient/login" class="btn btn-primary btn-lg mr-2"><i class="bi bi-person-fill"></i> Patient Area</a>
                <a href="/doctor/login" class="btn btn-primary btn-lg mr-2"><i class="bi bi-people-fill"></i> Doctor Dashboard</a>
                <a href="/therapist/login" class="btn btn-primary btn-lg"><i class="bi bi-hand-index-thumb"></i> Therapist Dashboard</a>
            </div>
            <div class="mt-5">
                <a href="/admin/login" class="btn btn-secondary btn-lg"><i class="bi bi-lock-fill"></i> Admin Login</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>