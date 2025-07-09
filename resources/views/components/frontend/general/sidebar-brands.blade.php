@props(['brands' => []])

<div class="single-widget category">
    <h3 class="title">Brands</h3>
    <ul class="categor-list">
        @foreach ($brands as $brand)
            <li><a
                    href="{{ route('product-brand', $brand->slug) }}">{{ $brand->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
