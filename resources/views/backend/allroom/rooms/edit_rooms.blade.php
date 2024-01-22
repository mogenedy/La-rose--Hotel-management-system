@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

				<div class="container">
					<div class="main-body">
						<div class="row">




<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs nav-primary" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                        </div>
                        <div class="tab-title">Manage Room </div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                        </div>
                        <div class="tab-title">Room Number</div>
                    </div>
                </a>
            </li>

        </ul>
        <div class="tab-content py-3">
            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">

                <div class="col-xl-12 mx-auto">

                    <div class="card">
                        <div class="card-body p-4">

                            <h5 class="mb-4">Update Room</h5>
                            <form class="row g-3">
                                <div class="col-md-4">
                                    <label for="input1" class="form-label">Room type name</label>
                                    <input type="text" name="roomtype_id" class="form-control" id="input1" value="{{$editData->type->name}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="input2" class="form-label">Total Adult</label>
                                    <input type="text" class="form-control" name="total_adult" id="input2" value="{{$editData->total_adult}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="input2" class="form-label">Total Child</label>
                                    <input type="text" class="form-control" name="total_child" id="input2" value="{{$editData->total_child}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="input3" class="form-label">Main Image</label>
                                    <input type="file" class="form-control" id="image" name="image">

                                            <img id="showImage"
                                                src="{{(!empty($editData->image))?url('upload/rooms/'.$editData->image):url('upload/no_image.jpg')}}"
                                                alt="Admin" class="bg-primary" width="80">
                                        </div>



                                <div class="col-md-6">
                                    <label for="input4" class="form-label">Gallery Image</label>
                                    <input type="file" class="form-control" id="input4" name="multi_Image[]" multiple  id="multImage" accept="image/jpg, image/gif,image/jpeg,image/png" multiple>
                                </div>

                                <div class="col-md-4">
                                    <label for="input1" class="form-label">Room price</label>
                                    <input type="text" name="price" class="form-control" id="input1" value="{{$editData->price}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="input2" class="form-label">Discount (%)</label>
                                    <input type="text" class="form-control" name="discount" id="input2" value="{{$editData->discount}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="input2" class="form-label">Room Capacity</label>
                                    <input type="text" class="form-control" name="room_capacity" id="input2" value="{{$editData->room_capacity}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="input7" class="form-label">Room View</label>
                                    <select id="input7"  name="view" class="form-select">
                                        <option selected="">Choose...</option>
                                        <option value="sea view">sea view</option>
                                        <option value="Hill view">Hill view</option>
                                        <option value="Garen view">Garden view</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="input7" class="form-label">Bed style</label>
                                    <select id="input7" name="bed_style" class="form-select">
                                        <option selected="">Choose...</option>
                                        <option value="Queen bed">Queen bed</option>
                                        <option value="Twin bed">Twin bed</option>
                                        <option value="king bed">king bed</option>
                                    </select>
                                </div>


                                <div class="col-md-12">
                                    <label for="input11" class="form-label">short Description</label>
                                    <textarea class="form-control" name="short_desc" id="input11" placeholder="Address ..." rows="3">
                                      {{$editData->short_desc}}
                                    </textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="input11" class="form-label"> Description</label>
                                    <textarea class="form-control" name="description" id="myeditorinstance" placeholder="Address ..." rows="3">
                                      {!!$editData->short_desc!!}
                                    </textarea>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="input12">
                                        <label class="form-check-label" for="input12">Check me out</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="button" class="btn btn-primary px-4">Submit</button>
                                        <button type="button" class="btn btn-light px-4">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>





            </div>
             {{-- // End primaryhome --}}




            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
            </div>




        </div>
    </div>
</div>







						</div>
					</div>
				</div>
 </div>
@include('admin.components.image-upload')




@endsection
