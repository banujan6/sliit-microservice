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
        <h2>{{ isset($magazine) ? 'Update Magazine' : 'Create Magazine' }}</h2>
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
        <form method="post" action="{{ isset($magazine) ? route('showUpdateView', $magazine['id']) : route('showCreateView') }}">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name Of The Magazine" value="{{ isset($magazine) ? $magazine['name'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="language" class="form-label fw-bold">Language</label>
                        <input type="text" class="form-control" id="language" name="language" placeholder="The Language Of The Magazine" value="{{ isset($magazine) ? $magazine['language'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="Daily Magazine" {{ isset($magazine) && $magazine['type'] === 'Daily Magazine' ? 'selected' : ''  }}>Daily Magazine</option>
                            <option value="Weekly Magazine" {{ isset($magazine) && $magazine['type'] === 'Weekly Magazine'  ? 'selected' : ''  }}>Weekly Magazine</option>
                            <option value="Monthly Magazine" {{ isset($magazine) && $magazine['type'] === 'Monthly Magazine'  ? 'selected' : ''  }}>Monthly Magazine</option>
                            <option value="Annual Magazine" {{ isset($magazine) && $magazine['type']  === 'Annual Magazine' ? 'selected' : ''  }}>Annual Magazine</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="availability" class="form-label fw-bold">Availability</label>
                        <select type="text" class="form-control" id="availability" name="availability" required>
                            <option value="1" {{ isset($magazine) && $magazine['availability'] ? 'selected' : ''  }}>Available</option>
                            <option value="0" {{ isset($magazine) && !$magazine['availability'] ? 'selected' : ''  }}>Not Available</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="published" class="form-label fw-bold">Published On</label>
                        <input type="date" class="form-control" id="published" name="published" placeholder="The Year Of The First Publish Year" value="{{ isset($magazine) ? $magazine['published_on'] : '' }}" required>
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
