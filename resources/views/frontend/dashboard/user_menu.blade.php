
<div class="service-side-bar">
    <div class="services-bar-widget">
        <h3 class="title">Others Services</h3>
        <div class="side-bar-categories">
<img src="{{(!empty($profileData->photo)) ?
    url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}" class="rounded mx-auto d-block" alt="Image" style="width:100px; height:100px;"> <br><br>

<center>
<p>{{Auth::user()->name}}</p>
<p>{{Auth::user()->email}}</p>
</center>
<ul>

<li>
<a href="{{route('dashboard')}}">User Dashboard</a>
</li>
<li>
<a href="{{route('user.profile')}}">User Profile </a>
</li>
<li>
<a href="{{route('user.change.password')}}">Change Password</a>
</li>
<li>
<a href="#">Booking Details </a>
</li>
<li>
<a href="{{route('user.logout')}}">Logout </a>
</li>
</ul>
        </div>
    </div>


</div>

