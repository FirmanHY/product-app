@props(['description' => ''])

<div class="product-info">
    <div class="nav-main">
        <!-- Tab Nav -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                    href="#description" role="tab">Description</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab"
                    href="#reviews" role="tab">Reviews</a></li>
        </ul>
        <!--/ End Tab Nav -->
    </div>
    <div class="tab-content" id="myTabContent">
        <!-- Description Tab -->
        <div class="tab-pane fade show active" id="description" role="tabpanel">
            <div class="tab-single">
                <div class="row">
                    <div class="col-12">
                        <div class="single-des">
                            <p>{!! $description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Description Tab -->
    </div>
</div>
