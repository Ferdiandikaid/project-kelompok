<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Register Page</title>
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
        <h1 class="text-center mb-4">Welcome to register page</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('registers')}}" method="post" class="container" class="mx-5" enctype="multipart/form-data"
                            >
                            @csrf
                            <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter username"
                                    name="username"
                                />
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter email address"
                                    name="email"
                                />
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Description</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter description"
                                    name="description"
                                />
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Password</label>
                                <input
                                    type="password"
                                    class="form-control mb-2"
                                    placeholder="Password"
                                    name="password"
                                />
                            </div>
                            <a href="#" class="dika">Already have account? login here</a>
                            <br>
                            <button type="submit" class="btn btn-custom1 my-3">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
