@props(['featured'])

<section class="midium-banner">
    <div class="container">
        <div class="row">
            @foreach ($featured as $data)
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        @php $photo = explode(',', $data->photo); @endphp
                        <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                        <div class="content">
                            <p>{{ $data->cat_info['title'] }}</p>
                            <h3>{{ $data->title }} <br>Up to<span>
                                    {{ $data->discount }}%</span></h3>
                            <a href="{{ route('product-detail', $data->slug) }}">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
