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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form class="container" class="mx-5">
                        @foreach ($data as $item)
                        <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter username"
                                    name="username"
                                    value="{{$item->username}}"
                                    readonly
                                />
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter email"
                                    name="email"
                                    value="{{$item->email}}"
                                    readonly
                                />
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Description</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    name="description"
                                    value="{{$item->description}}"
                                    readonly
                                />
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputeEmail">Tanggal Pembuatan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    name="description"
                                    value="{{$item->tanggal}}"
                                    readonly
                                />
                            </div>
                            @endforeach
                            <a href="{{url('homepage')}}" class="btn btn-primary mt-4">Back</a> 
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

