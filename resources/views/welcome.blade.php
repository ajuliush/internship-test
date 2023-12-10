<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/jquery.min.js') }}"></script>
    <title>Posts</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <h5 class="card-title text-center">Time - 7.00 PM To 8:4PM</h5>
            </div>
        </div>

        <div class="row">
            <!-- Left Section -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Obcaecati odit omnis sit reprehenderit tenetur. Blanditiis, assumenda, vero magnam labore
                            quidem distinctio corporis aperiam dolorem incidunt voluptatibus dicta doloremque, natus
                            exercitationem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati odit
                            omnis sit reprehenderit tenetur. Blanditiis, assumenda, vero magnam labore quidem distinctio
                            corporis aperiam dolorem incidunt voluptatibus dicta doloremque, natus exercitationem.</p>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-md-9">
                <div class="row row-cols-spacing">
                    @if ($posts->isEmpty())
                        <p>No posts found.</p>
                    @else
                        @foreach ($posts as $post)
                            <div class="col-md-4 mb-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset($post->image) }}" class="card-img-top" alt="..."
                                        height="160px" width="150px">
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="height: 2.5em; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $post->title }}
                                        </h5>
                                        <p class="card-text">{{ Str::of($post->description)->limit(50) }}
                                            <a href="javascript:void(0)" class="btn show" data-id="{{ $post->id }}"
                                                data-toggle="tooltip" title="" data-original-title="Show"
                                                style="color: #81e711"> More </a>
                                        </p>
                                        <span>Created by</span> <span
                                            class="btn btn-primary">{{ $post->user->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12" style="padding:0 443px; margin-top:-2.5rem!important">
                            {!! $posts->links() !!}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <!-- Bottom Section -->
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center"> <a style="color: white;" target="_blank" 
                                    href="https://github.com/ajuliush/internship-test">Github Link</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- edit boostrap model -->
        <div class="modal fade" id="edit-modal" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ajaxModelTitle"></h4>
                        {{-- <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><i
                                class="dripicons-cross"></i></button> --}}

                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 mb-12">
                            <div class="card">
                                <img src="" id="image" class="card-img-top" alt="..." height="160px"
                                    width="150px">
                                <div class="card-body">
                                    <h5 class="card-title" id="title"
                                        style="height: 2.5em; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        
                                    </h5>
                                    <p class="card-text" id="description">
                                    </p>
                                    <span>Created by</span> <span
                                        class="btn btn-primary" id="creator"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->

        <!-- Bootstrap JavaScript and dependencies -->
        {{-- <script src="{{ asset('assets/jquery-3.5.1.slim.min.js') }}"></script> --}}
        <script src="{{ asset('assets/popper.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap.min.js') }}"></script>
        <script>
            //value retriving and opening the show modal starts

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.show').on('click', function() {
                    var id = $(this).data('id');
                    $.ajax({
                        type: "POST",
                        url: 'post-by-id',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res.post);
                            $('#ajaxModelTitle').html("Show");
                            $('#edit-modal').modal('show');
                            $('#image').attr('src', res.post.image);
                            $('#title').html( res.post.title);
                            $('#description').html( res.post.description);
                            $('#creator').html( res.post.user.name);
                        }
                    });
                });
            });
        </script>
</body>

</html>
