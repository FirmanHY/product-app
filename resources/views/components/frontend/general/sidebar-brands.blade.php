@props(['brands' => [], 'viewType' => 'lists'])

<div class="single-widget category">
    <h3 class="title">Brands</h3>
    <ul class="categor-list">
        @foreach ($brands as $brand)
            <li>
                <a
                    href="{{ route('shop.filter', array_merge(request()->query(), ['brand' => [$brand->slug], 'view' => request('view', $viewType)])) }}">{{ $brand->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
