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
        <h2>{{ isset($lentRecord) ? 'Update Lent Record' : 'Create Lent Record' }}</h2>
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
        <form method="post" action="{{ isset($lentRecord) ? route('showUpdateView', $lentRecord['id']) : route('showCreateView') }}">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="book" class="form-label fw-bold">Book</label>
                        <select type="text" class="form-control" id="book" name="book" required>
                            @foreach($books as $bookId => $bookName)
                                <option value="{{ $bookId }}" {{ (isset($lentRecord) && $lentRecord['book_id'] == $bookId) ? 'selected' : '' }}>{{ $bookName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="member" class="form-label fw-bold">Member</label>
                        <select type="text" class="form-control" id="member" name="member" required>
                            @foreach($members as $memberId => $memberName)
                                <option value="{{ $memberId }}" {{ (isset($lentRecord) && $lentRecord['member_id'] == $memberId) ? 'selected' : '' }}>{{ $memberName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="lent_on" class="form-label fw-bold">Lent On</label>
                        <input type="date" class="form-control" id="lent_on" name="lent_on" value="{{ isset($lentRecord) ? $lentRecord['lent_date'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="return_on" class="form-label fw-bold">Return On</label>
                        <input type="date" class="form-control" id="return_on" name="return_on" value="{{ isset($lentRecord) ? $lentRecord['return_date'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="is_returned" class="form-label fw-bold">Is Returned?</label>
                        <select type="text" class="form-control" id="is_returned" name="is_returned" required>
                            <option value="0" {{ (isset($lentRecord) && $lentRecord['is_returned']) ? 'selected' : '' }}>No</option>
                            <option value="1" {{ (isset($lentRecord) && $lentRecord['is_returned']) ? 'selected' : '' }}>Yes</option>
                        </select>
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
