<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Therapist Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/lux/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Therapist Dashboard</h1>
        <div class="mt-5">
            <h2>Therapists</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Specialization</th>
                        <!-- Add other fields as necessary -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($therapists as $therapist)
                        <tr>
                            <td>{{ $therapist->name }}</td>
                            <td>{{ $therapist->email }}</td>
                            <td>{{ $therapist->specialization }}</td>
                            <!-- Add other fields as necessary -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>