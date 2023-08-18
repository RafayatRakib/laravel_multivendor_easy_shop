
@php
    $route =  Route::current()->getName();
@endphp

<div class="col-md-3">
    <div class="dashboard-menu">

        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{$route == 'user.dashboard' ? 'active' : '' }}  " href="{{route('user.dashboard')}}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$route == 'user.orders' ? 'active' : '' }}"href="{{route('user.orders')}}" ><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$route == 'track.orders' ? 'active' : '' }}" href="{{route('track.orders')}}"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$route == 'return.orders' ? 'active' : '' }}" href="{{route('return.orders')}}"><i class="fi-rs-shopping-cart-check mr-10"></i>My Returns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$route == 'user.address' ? 'active' : '' }}" href="{{route('user.address')}}"><i class="fi-rs-marker mr-10"></i>My Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{$route == 'user.account.details' ? 'active' : '' }}" href="{{route('user.account.details')}}"><i class="fi-rs-user mr-10"></i>Account details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$route == 'user.password.change' ? 'active' : '' }}" href="{{route('user.password.change')}}"></i>Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$route == 'user.logout.2' ? 'active' : '' }}" href="{{route('user.logout.2')}}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
            </li>
        </ul>
    </div>
</div>