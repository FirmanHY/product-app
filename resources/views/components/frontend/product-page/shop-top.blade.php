@props(['active' => 'grid'])
<div class="shop-top">
    <div class="shop-shorter">
        <div class="single-shorter">
            <label>Show :</label>
            <select class="show" name="show" onchange="this.form.submit();">
                <option value="">Default</option>
                <option value="9"
                    @if (!empty($_GET['show']) && $_GET['show'] == '9') selected @endif>09
                </option>
                <option value="15"
                    @if (!empty($_GET['show']) && $_GET['show'] == '15') selected @endif>15
                </option>
                <option value="21"
                    @if (!empty($_GET['show']) && $_GET['show'] == '21') selected @endif>21
                </option>
                <option value="30"
                    @if (!empty($_GET['show']) && $_GET['show'] == '30') selected @endif>30
                </option>
            </select>
        </div>
        <div class="single-shorter">
            <label>Sort By :</label>
            <select class='sortBy' name='sortBy'
                onchange="this.form.submit();">
                <option value="">Default</option>
                <option value="title"
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'title') selected @endif>Name
                </option>
                <option value="price"
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'price') selected @endif>Price
                </option>
                <option value="category"
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'category') selected @endif>Category
                </option>
                <option value="brand"
                    @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'brand') selected @endif>Brand
                </option>
            </select>
        </div>
    </div>
    <ul class="view-mode">
        <li @if ($active == 'grid') class="active" @endif><a
                href="@if ($active == 'grid') javascript:void(0) @else {{ route('product-grids') }} @endif"><i
                    class="fa fa-th-large"></i></a></li>
        <li @if ($active == 'list') class="active" @endif><a
                href="@if ($active == 'list') javascript:void(0) @else {{ route('product-lists') }} @endif"><i
                    class="fa fa-th-list"></i></a></li>
    </ul>
</div>
