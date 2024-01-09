<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Dog</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- En el head de tu archivo Blade -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-verde {
            background-color: #e9f5ec;
            /* Un tono claro de verde */
        }

        .header-verde {
            background-color: #4caf50;
            /* Un tono más intenso de verde */
            color: white;
        }
    </style>
</head>

<body class="bg-verde">
    <header class="header-verde p-3 text-center">
        <h1>Register New Dog</h1>
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" id="createDogForm">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Dog's Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>

                            <div class="mb-3" id="dateOfBirthContainer">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
                            </div>

                            <div class="mb-3" id="estimatedAgeContainer" style="display: none;">
                                <label for="estimated_age">Estimated Age</label>
                                <input type="number" id="estimated_age" name="estimated_age" class="form-control">
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" id="unknown_date_of_birth" name="unknown_date_of_birth" class="form-check-input">
                                <label for="unknownDateOfBirth" class="form-check-label">I don't know</label>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="button" id="submitForm" class="btn btn-primary">Register</button>
                            </div>
                        </form>

                        <div id="messagesContainer"><ul><li></li></ul></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
</body>

</html>