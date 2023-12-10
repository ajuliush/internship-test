<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Your Page Title</title>
    <style>
        /* Add custom styles here if needed */
        .card {
            margin-bottom: 20px;
            background-color: blue;
            color: white;
        }

        .row-cols-spacing {
            --bs-gutter-x: 4.5rem;
            /* Adjust this value to control the spacing */
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <!-- Top Section -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Share Here Start To End Time</h5>
            </div>
        </div>

        <div class="row">
            <!-- Left Section -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text text-center">Some content for the left card.</p>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-md-9">
                <div class="row row-cols-spacing">
                    @foreach ($posts as $post)
                        <div class="col-md-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset($post->image) }}" class="card-img-top" alt="..." height="160px"
                                    width="150px">
                                <div class="card-body">
                                    <h5 class="card-title"
                                        style="height: 2.5em; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ $post->title }}</h5>
                                    <p class="card-text">{{ Str::of($post->description)->limit(50) }} </p>
                                    <span>create by</span> <span class="btn btn-primary">{{ $post->user->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12" style="padding:0 443px; margin-top:-2.5rem!important">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Bottom Section -->
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Bottom Section Card</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap JavaScript and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

</body>

</html>
