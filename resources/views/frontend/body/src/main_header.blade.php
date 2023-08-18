<div class="header-middle header-middle-ptb-1 d-none d-lg-block">
    <div class="container">
        <div class="header-wrap">
            <div class="logo logo-width-1">
                <a href="{{asset('/')}}"><img src="{{asset('public/uploads/theme/logo-2.svg')}}" alt="logo" /></a>
            </div>
            <div class="header-right">
                <div class="search-style-2">
                    <form action="#">
                        <select class="select-active">
                            <option>All Categories</option>
                            <option>Milks and Dairies</option>
                            <option>Wines & Alcohol</option>
                            <option>Clothing & Beauty</option>
                            <option>Pet Foods & Toy</option>
                            <option>Fast food</option>
                            <option>Baking material</option>
                            <option>Vegetables</option>
                            <option>Fresh Seafood</option>
                            <option>Noodles & Rice</option>
                            <option>Ice cream</option>
                        </select>
                        <input type="text" placeholder="Search for items..." />
                    </form>
                </div>
                <div class="header-action-right">
                    <div class="header-action-2">
                        <div class="search-location">
                            <form action="#">
                                <select class="select-active">
                                    <option>Your Location</option>
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>Arizona</option>
                                    <option>Delaware</option>
                                    <option>Florida</option>
                                    <option>Georgia</option>
                                    <option>Hawaii</option>
                                    <option>Indiana</option>
                                    <option>Maryland</option>
                                    <option>Nevada</option>
                                    <option>New Jersey</option>
                                    <option>New Mexico</option>
                                    <option>New York</option>
                                </select>
                            </form>
                        </div>
                       



                        <div class="header-action-icon-2">
                            <a href="{{route('compare')}}">
                                <i class="fi-rs-shuffle"></i>
                                {{-- <img class="svgInject" alt="Nest" src="{{asset('public/uploads/theme/icons/icon-heart.svg')}}" /> --}}
                                <span class="pro-count blue" id="totalcompare">0</span>
                            </a>
                            <a href="{{route('compare')}}"><span class="lable">Compare</span></a>
                        </div>


                        <div class="header-action-icon-2">
                            <a href="{{route('wishlist')}}">
                                <img class="svgInject" alt="Nest" src="{{asset('public/uploads/theme/icons/icon-heart.svg')}}" />
                                <span class="pro-count blue" id="totalwishlisth">0</span>
                            </a>
                            <a href="{{route('wishlist')}}"><span class="lable">Wishlist</span></a>
                        </div>

                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{route('cart')}}" >
                                <img alt="Nest" src="{{asset('public/uploads/theme/icons/icon-cart.svg')}}" />
                                <span class="pro-count blue" id="totalCartItem">0</span>
                            </a>
                            <a   href="{{route('cart')}}" ><span class="lable">Cart</span></a>

                        </div>



                        <div class="header-action-icon-2">
                            <a href="page-account.html">
                                <img class="svgInject" alt="Nest" src="{{asset('public/uploads/theme/icons/icon-user.svg')}}" />
                            </a>
                            <a href="{{route('user.dashboard')}}"><span class="lable ml-0">Account</span></a>
                            @if (Auth::user())
                                
                            <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{route('user.dashboard')}}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                    </li>
                                    <li>
                                        <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                    </li>
                                    <li>
                                        <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                    </li>
                                    <li>
                                        <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.logout.2')}}"><i class="fi fi-rs-sign-out mr-10"></i>Log out</a>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{route('user.login')}}"><i class="fi fi-rs-user mr-10"></i>Login</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.register')}}"><i class="fi fi-rs-location-alt mr-10"></i>Register</a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>