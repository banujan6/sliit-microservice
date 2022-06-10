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
        <h2>{{ isset($member) ? 'Update Member' : 'Create Member' }}</h2>
    </div>
    <div class="col-4 text-end">
        <a href="/" class="btn btn-secondary">Back</a>
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
    <div class="w-100">
        <form method="post" action="{{ isset($member) ? route('showUpdateView', $member['id']) : route('showCreateView') }}">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name of the member" value="{{ isset($member) ? $member['name'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="nic" class="form-label fw-bold">NIC Number</label>
                        <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC number of the member" value="{{ isset($member) ? $member['nic'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address of the member" value="{{ isset($member) ? $member['email'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address of the member" value="{{ isset($member) ? $member['address'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="expire_on" class="form-label fw-bold">Expiration Date</label>
                        <input type="date" class="form-control" id="expire_on" name="expire_on" placeholder="Membership expiration date" value="{{ isset($member) ? $member['expire_on'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3 pt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
