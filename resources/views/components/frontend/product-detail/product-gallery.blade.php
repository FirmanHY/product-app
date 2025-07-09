@props(['photos' => ''])
<div class="product-gallery">

    <div class="flexslider-thumbnails">
        <ul class="slides">
            @foreach ($photos as $data)
                <li data-thumb="{{ $data }}" rel="adjustX:10, adjustY:">
                    <img src="{{ $data }}" alt="{{ $data }}">
                </li>
            @endforeach
        </ul>
    </div>

</div>
