@props(['recent_products' => []])

<div class="single-widget recent-post">
    <h3 class="title">Recent post</h3>
    @foreach ($recent_products as $product)
        @php
            $photo = explode(',', $product->photo);
        @endphp
        <div class="single-post first">
            <div class="image">
                <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
            </div>
            <div class="content">
                <h5><a
                        href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                </h5>
                @php
                    $org =
                        $product->price -
                        ($product->price * $product->discount) / 100;
                @endphp
                <p class="price"><del
                        class="text-muted">${{ number_format($product->price, 2) }}</del>
                    ${{ number_format($org, 2) }}</p>
            </div>
        </div>
    @endforeach
</div>
