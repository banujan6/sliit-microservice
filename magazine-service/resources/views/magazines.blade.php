<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Magazine Service</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="row py-2">
            <div class="col-8">
                <h2>Magazines</h2>
            </div>
            <div class="col-4 text-end">
                <a href="/create" class="btn btn-primary"> + Add New Magazine</a>
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
                    <th>Date</th>
                    <th>Name</th>
                    <th>Language</th>
                    <th>Type</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($magazines as $count => $magazines)
                    <tr>
                        <td>{{ $count + 1 }}</td>
                        <td>{{ Illuminate\Support\Carbon::parse($magazines->published_on)->format('D, d M Y') }}</td>
                        <td>{{ $magazines->name }}</td>
                        <td>{{ $magazines->language }}</td>
                        <td>{{ $magazines->type }}</td>
                        @if($magazines->availability)
                            <td class="text-success">Available</td>
                        @else
                            <td class="text-danger">Not Available</td>
                        @endif
                        <td>
                            <a href="/update/{{$magazines->id}}" class="btn btn-warning btn-sm">Update</a>
                            <a href="/delete/{{$magazines->id}}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
