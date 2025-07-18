@props(['limitedCategories'])

<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            @foreach ($limitedCategories as $cat)
                @if ($cat->is_parent == 1)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-banner">
                            @if ($cat->photo)
                                <img src="{{ $cat->photo }}"
                                    alt="{{ $cat->photo }}">
                            @else
                                <img src="https://via.placeholder.com/600x370"
                                    alt="#">
                            @endif
                            <div class="content">
                                <h3 class="text-white">{{ $cat->title }}
                                </h3>
                                <a class="text-white"
                                    href="{{ route('shop.filter', array_merge(request()->query(), ['category' => [$cat->slug], 'view' => request('view', 'grid')])) }}">
                                    Discover
                                    Now</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
