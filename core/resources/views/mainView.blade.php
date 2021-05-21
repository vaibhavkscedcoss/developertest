<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content={{{ csrf_token() }}} />
    <title>Developer Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
</head>
<body>
    <h3>Discover Your Favourite Movies</h3>
    <div id="div1" class="container text-center">
        <input type="text" id="movie"  placeholder="i.e red, green">
        <button  id="search1" class='btn btn-secondary' >Search</button>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Movie No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">Type</th>
                    <th scope="col">Poster</th>
                </tr>
            </thead>
            <tbody id="movieData">
            </tbody>
        </table>
    </div>
    <footer>
        <script src="{{asset('assets/js/script.js')}}"></script>
    </footer>
</body>
</html>
