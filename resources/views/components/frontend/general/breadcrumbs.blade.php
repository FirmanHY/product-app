@props(['active' => ''])

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('homepage') }}">Home<i
                                    class="ti-arrow-right"></i></a></li>
                        <li class="active"><a
                                href="javascript:void(0);">{{ $active }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
