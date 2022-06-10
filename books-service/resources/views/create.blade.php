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
        <h2>{{ isset($book) ? 'Update Book' : 'Create Book' }}</h2>
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
        <form method="post" action="{{ isset($book) ? route('showUpdateView', $book['isbn']) : route('showCreateView') }}">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="isbn" class="form-label fw-bold">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Internation Standard Book Number" value="{{ isset($book) ? $book['isbn'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name Of The Book" value="{{ isset($book) ? $book['name'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="language" class="form-label fw-bold">Language</label>
                        <input type="text" class="form-control" id="language" name="language" placeholder="The Language Of The Book" value="{{ isset($book) ? $book['language'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="genre" class="form-label fw-bold">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre" placeholder="The Genre/Category Of The Book" value="{{ isset($book) ? $book['genre'] : '' }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="authors" class="form-label fw-bold">Author(s)</label>
                        <input type="text" class="form-control" id="authors" name="authors" placeholder="The Author(s) Of The Book" value="{{ isset($book) ? $book['authors'] : '' }}" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="availability" class="form-label fw-bold">Availability</label>
                        <select type="text" class="form-control" id="availability" name="availability" required>
                            <option value="1" {{ isset($book) && $book['availability'] ? 'selected' : ''  }}>Available</option>
                            <option value="0" {{ isset($book) && !$book['availability'] ? 'selected' : ''  }}>Not Available</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="published" class="form-label fw-bold">Published Year</label>
                        <input type="number" class="form-control" id="published" name="published" placeholder="The Year Of The First Publish Year" value="{{ isset($book) ? $book['published_on'] : '' }}" required>
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
