@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Update Book Area</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Book Area</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">

    <form action="{{route('book.area.update')}}" method="POST" enctype="multipart/form-data">
     @csrf
     <input type="hidden" name="id" value="{{$book->id}}">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">short title</h6>
            </div>
            <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" name="short_title" value="{{$book->short_title}}"/>

            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Main title</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" name="main_title" value="{{$book->main_title}}" />

            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Short Description</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <textarea class="form-control" rows="3" required="" name="short_description" >{{$book->short_description}}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">link url</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" name="link_url"  value="{{$book->link_url}}" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Image</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="file" class="form-control" name="image" id="image"  value="{{$book->image}}"/>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0"></h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <img id="showImage"
                src="{{ asset('upload/book_images/'.$book->image) }}"
                alt="Admin" class="rounded-circle p-1 bg-primary" width="80">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 text-secondary">
                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
            </div>
        </div>
    </div>
</form>

                        </div>
                    </div>
@include('admin.components.image-upload')
@endsection
