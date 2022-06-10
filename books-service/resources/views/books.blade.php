<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books Service</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="row py-2">
            <div class="col-8">
                <h2>Books</h2>
            </div>
            <div class="col-4 text-end">
                <a href="/create" class="btn btn-primary"> + Add New Book</a>
            </div>
        </div>
        @if(Session::has('status'))
            <div class="py-4">
                @if(Session::get('status'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ISBN</th>
                    <th>Name</th>
                    <th>Language</th>
                    <th>Category</th>
                    <th>Authors</th>
                    <th>Availability</th>
                    <th>Published On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $count => $book)
                    <tr>
                        <td>{{ $count + 1 }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->language }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->authors }}</td>
                        @if($book->availability)
                            <td class="text-success">Available</td>
                        @else
                            <td class="text-danger">Not Available</td>
                        @endif
                        <td>{{ $book->published_on }}</td>
                        <td>
                            <a href="/update/{{$book->isbn}}" class="btn btn-warning btn-sm">Update</a>
                            <a href="/delete/{{$book->isbn}}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
