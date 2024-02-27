<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Patient Dashboard</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card mb-5">
            <div class="card-body">
                <h2 class="text-success mb-3">Find a Doctor or Therapist</h2>
                <form>
                    <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <select class="form-control" id="specialization">
                            <!-- Add options for different specializations here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="cabinet" value="cabinet">
                            <label class="form-check-label" for="cabinet">
                                <i class="fas fa-briefcase-medical"></i> Cabinet
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="home" value="home">
                            <label class="form-check-label" for="home">
                                <i class="fas fa-home"></i> At Home
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="clinic" value="clinic">
                            <label class="form-check-label" for="clinic">
                                <i class="fas fa-clinic-medical"></i> Clinic
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="mb-5">
            <h2 class="text-warning mb-3">Upcoming Appointments</h2>
        </div>

        <div class="mb-5">
            <h2 class="text-danger mb-3">Past Psychotherapy Sessions</h2>
            <!-- Display past psychotherapy sessions here -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>