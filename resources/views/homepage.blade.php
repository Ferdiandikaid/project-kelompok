<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ferdiandikaid</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <link href="css/style.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent mt-2">
            <div class="container">
                <div class="row" justify-content-center>
                    <div class="col-10">
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link ps-5" href="{{url('homepage')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('homepage')}}">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link justify-content-end" href="{{('login')}}">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @foreach ($data as $data)
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>{{$data->username}}</td>
                <td>{{$data->email}}</td>
                <td>
                <button type="button" class="btn btn-primary">View</button>
                <button type="button" class="btn btn-warning">Update</button>
                <button type="button" class="btn btn-danger">Reject</button>
                </td>
              </tr>
            </tbody>
            @endforeach 
          </table>

            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

