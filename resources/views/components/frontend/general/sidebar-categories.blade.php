@props(['menu' => [], 'viewType' => 'lists'])

<div class="single-widget category">
    <h3 class="title">Categories</h3>
    <ul class="categor-list">
        @if ($menu)
            @foreach ($menu as $cat_info)
                <li>
                    <a
                        href="{{ route('shop.filter', array_merge(request()->query(), ['category' => [$cat_info->slug], 'view' => request('view', $viewType)])) }}">{{ $cat_info->title }}</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
