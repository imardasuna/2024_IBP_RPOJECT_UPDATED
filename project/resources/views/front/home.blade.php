@extends('front.layout.app')

@section('main_content')
<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach($slide_all as $item)
        <div class="item img-fluid" style="background-image:url({{ asset('uploads/'.$item->photo) }}); background-size: cover; background-position: center;">
            <div class="bg"></div>
            <div class="text">
                <h2>{{ $item->heading }}</h2>
                <p>
                    {!! $item->text !!}
                </p>
                @if($item->button_text != '')
                <div class="button">
                    <a href="{{ $item->button_url }}">{{ $item->button_text }}</a>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
     

<div class="search-section">
    <div class="container">
        <form action="{{ route('cart_submit') }}" method="post">
        @csrf
        <div class="inner">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <select name="room_id" class="form-select">
                            <option value="">Select Room</option>
                            @foreach($room_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                    </div>
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>



<div class="home-feature">
    <div class="container">
        <div class="row">

            @foreach($feature_all as $item)

            
            <div class="col-md-3">
                <div class="inner">
                    <div class="icon"><i class="{{ $item->icon }}"></i></div>
                    <div class="text">
                        <h2>{{ $item->heading }}</h2>
                        <p>
                            {!! $item->text !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>



<div class="home-rooms">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Rooms and Suites</h2>
            </div>
        </div>
        <div class="row">
            @php $count = DB::table('rooms')->count(); @endphp
            @foreach($room_all as $item)
            @if($loop->iteration>$count)
            @break
            @endif
            <div class="col-md-3">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="">{{ $item->name }}</a></h2>
                        <div class="price">
                            ₺{{ $item->price }}/night
                        </div>
                        <div class="button">
                            <a href="" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="big-button">
                    <a href="" class="btn btn-primary">See All Rooms</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="testimonial" style="background-image: url(uploads/slide2.jpg)">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Our Happy Clients</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    <div class="item">
                        <div class="photo">
                            <img src="uploads/t1.jpg" alt="">
                        </div>
                        <div class="text">
                            <h4>Robert Krol</h4>
                            <p>CEO, ABC Company</p>
                        </div>
                        <div class="description">
                            <p>
                                Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens. Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens. 
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <img src="uploads/t2.jpg" alt="">
                        </div>
                        <div class="text">
                            <h4>Sal Harvey</h4>
                            <p>Director, DEF Company</p>
                        </div>
                        <div class="description">
                            <p>
                                Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens. Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="blog-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Latest Posts</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="inner">
                    <div class="photo">
                        <img src="uploads/1.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="post.html">This is a sample blog post title</a></h2>
                        <div class="short-des">
                            <p>
                                If you want to get some good contents from the people of your country then just contribute into the main community of your people and I am sure you will be benfitted from that. 
                            </p>
                        </div>
                        <div class="button">
                            <a href="post.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="photo">
                        <img src="uploads/2.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="post.html">This is a sample blog post title</a></h2>
                        <div class="short-des">
                            <p>
                                If you want to get some good contents from the people of your country then just contribute into the main community of your people and I am sure you will be benfitted from that. 
                            </p>
                        </div>
                        <div class="button">
                            <a href="post.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="photo">
                        <img src="uploads/3.jpg" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="post.html">This is a sample blog post title</a></h2>
                        <div class="short-des">
                            <p>
                                If you want to get some good contents from the people of your country then just contribute into the main community of your people and I am sure you will be benfitted from that. 
                            </p>
                        </div>
                        <div class="button">
                            <a href="post.html" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($errors->any())
    @foreach($errors->all() as $error)
    <script>
        izi.Toast.error({
            title: 'error',
            message: '{{ $error }}',
        });
    </script>
    @endforeach
@endif
@endsection