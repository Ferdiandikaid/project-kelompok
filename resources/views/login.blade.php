<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login Page</title>
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
        <form action="{{url('authenticate')}}" class="container" method="POST" class="mx-5">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    class="form-control mt-2"
                    id="exampleInputEmail1"
                    placeholder="Enter username"
                    name="username"
                />
            </div>  
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input
                    type="password"
                    class="form-control mt-2"
                    placeholder="Password"
                    name="password"
                />
            </div>
            <button type="submit" class="btn btn-custom1 my-3">Submit</button>
        </form>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
        ></script>
    </body>
</html>
