

<div class="service-side-bar">


    <div class="services-bar-widget">
        <h3 class="title">Others Services</h3>
        <div class="side-bar-categories">
<img src="{{(!empty($profileData->photo)) ?
    url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}" class="rounded mx-auto d-block" alt="Image" style="width:100px; height:100px;"> <br><br>
@php
$id=auth()->user()->id;
$profileData=App\models\User::find($id);
@endphp
<center>
<p>{{$profileData->name}}</p>
<p>{{$profileData->email}}</p>
</center>
<ul>

<li>
<a href="#">User Dashboard</a>
</li>
<li>
<a href="{{route('user.profile')}}">User Profile </a>
</li>
<li>
<a href="#">Change Password</a>
</li>
<li>
<a href="#">Booking Details </a>
</li>
<li>
<a href="#">Logout </a>
</li>
</ul>
        </div>
    </div>


</div>

