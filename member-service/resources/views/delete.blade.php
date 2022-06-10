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
<div class="py-4 text-center">
    <h3>Are you sure, Do you want to delete the book?</h3>
    <p>
        You cannot restore the book once you deleted it. Click <strong>"Yes"</strong> to proceed (or) <strong>"Cancel"</strong> to abort.
    </p>
    <div>
        <form method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Yes, I'm sure</button>
            <a href="{{ route('listView') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
