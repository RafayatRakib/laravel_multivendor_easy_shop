
@extends('frontend.master')
@section('title', 'Easy Shop | Contact')
@section('content')

<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                 <span></span> Contact
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="mb-20 text-brand">How can help you ?</h4>
                    <h1 class="mb-30">{{$contact->contact_title}}</h1>
                    <p class="mb-20"> {!!$contact->contact_des!!} </p>
                </div>
                <div class="col-md-8 mb-10">
                    <h5 class="text-brand mb-10">Contact form</h5>
                    <h2 class="mb-10">Drop Us a Line</h2>
                    <p class="text-muted mb-30 font-sm">Your email address will not be published. Required fields are marked *</p>
                    <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="name" placeholder="First Name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="email" placeholder="Your Email" type="email" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="telephone" placeholder="Your Phone" type="tel" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="subject" placeholder="Subject" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="textarea-style mb-30">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                <button class="submit submit-auto-width" type="submit">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <section class="container my-50 d-none d-md-block">
            <div class="border-radius-15 overflow-hidden">
                {{-- <div id="map-panes" class="leaflet-map"></div> --}}
                <div class="img">
                {{-- image here if conditaion --}}
                @if ($contact->contact_image)
                    @if ($contact->photo_link)
                    <a href="{{$contact->photo_link	}}">
                        <img src="{{asset($contact->contact_image)}}" alt="" srcset="">
                    </a>    
                        
                    @else
                    <img src="{{asset($contact->contact_image)}}" alt="" srcset="">
                    @endif
                @endif
                </div>
            </div>
        </section>


        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row mb-60">
                            @foreach ($address as $item)
                                
                            <div class="col-md-4 mb-4 mb-md-0">
                                <h4 class="mb-15 text-brand">{{$item->office_type}}</h4>
                                {!! $item->office_address !!}
                                <a href="{{$item->office_map}}" class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                            </div>
                            @endforeach
                        
                        </div>
                        
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


