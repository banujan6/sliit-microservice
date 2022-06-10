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
        <h2>Members</h2>
    </div>
    <div class="col-4 text-end">
        <a href="/create" class="btn btn-primary"> + Add New Member</a>
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
        <th>Name</th>
        <th>NIC</th>
        <th>Email</th>
        <th>Address</th>
        <th>Expire On</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($members as $count => $member)
        <tr>
            <td>{{ $count + 1 }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->nic }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->address }}</td>
            <td>{{ $member->expire_on }}</td>
            @if(Carbon\Carbon::parse($member->expire_on)->gt(now()))
                <td class="text-success">Active</td>
            @else
                <td class="text-danger">Expired</td>
            @endif
            <td>
                <a href="/update/{{$member->id}}" class="btn btn-warning btn-sm">Update</a>
                <a href="/delete/{{$member->id}}" class="btn btn-danger btn-sm">Remove</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
