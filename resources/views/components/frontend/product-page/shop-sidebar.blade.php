@props([
    'recent_products' => [],
    'menu' => [],
    'max_price' => 0,
    'brands' => [],
    'current_price_range' => '',
    'viewType' => 'list',
])

<div class="shop-sidebar">
    <x-frontend.general.sidebar-categories :viewType="$viewType"
        :menu="$menu" />
    <x-frontend.general.sidebar-price-filter :max_price="$max_price"
        :current_price_range="$current_price_range" />
    <x-frontend.general.sidebar-recent-posts :recent_products="$recent_products" />
    <x-frontend.general.sidebar-brands :brands="$brands" :viewType="$viewType" />
</div>
