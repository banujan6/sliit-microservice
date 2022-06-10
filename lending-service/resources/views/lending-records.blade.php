<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lending Service</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">

</head>
<body>
<div class="row py-2">
    <div class="col-8">
        <h2>Lent Records</h2>
    </div>
    <div class="col-4 text-end">
        <a href="/create" class="btn btn-primary"> + Lend A Book</a>
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
        <th>Member Name</th>
        <th>Book Name</th>
        <th>Lent On</th>
        <th>Return On</th>
        <th>Is Returned ?</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lentRecords as $count => $lentRecord)
        <tr>
            <td>{{ $count + 1 }}</td>
            <td>{{ $members[$lentRecord->member_id] }}</td>
            <td>{{ $books[$lentRecord->book_id] }}</td>
            <td>{{ $lentRecord->lent_date }}</td>
            <td>{{ $lentRecord->return_date }}</td>
            <td>{{ $lentRecord->is_returned ? 'Yes' : 'No' }}</td>
            @if( \Carbon\Carbon::parse($lentRecord->return_date)->lt(now()) && !$lentRecord->is_returned )
                <td class="text-danger">Over Due</td>
            @else
                <td>-</td>
            @endif
            <td>
                <a href="/update/{{$lentRecord->id}}" class="btn btn-warning btn-sm">Update</a>
                <a href="/delete/{{$lentRecord->id}}" class="btn btn-danger btn-sm">Remove</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
