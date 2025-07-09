<?php

use App\Models\Cart;
use App\Models\Category;

// use Auth;
class Helper
{
    public static function getAllCategory()
    {
        $category = new Category;
        $menu = $category->getAllParentWithChild();

        return $menu;
    }

    public static function getHeaderCategory()
    {
        $category = new Category;
        $menu = $category->getAllParentWithChild();

        if ($menu) {
            ?>
            <li>
                <a href="javascript:void(0);">Category<i class="ti-angle-down"></i></a>
                <ul class="dropdown border-0 shadow">
                    <?php
                    foreach ($menu as $cat_info) {
                        if ($cat_info->child_cat->count() > 0) {
                            ?>
                            <li>
                                <a href="<?php echo route('shop.filter', array_merge(request()->query(), ['category' => [$cat_info->slug], 'view' => request('view', 'grid')])); ?>">
                                    <?php echo $cat_info->title; ?>
                                </a>
                                <ul class="dropdown sub-dropdown border-0 shadow">
                                    <?php
                                    foreach ($cat_info->child_cat as $sub_menu) {
                                        ?>
                                        <li>
                                            <a href="<?php echo route('shop.filter', array_merge(request()->query(), ['category' => [$cat_info->slug, $sub_menu->slug], 'view' => request('view', 'grid')])); ?>">
                                                <?php echo $sub_menu->title; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                            ?>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="<?php echo route('shop.filter', array_merge(request()->query(), ['category' => [$cat_info->slug], 'view' => request('view', 'grid')])); ?>">
                                    <?php echo $cat_info->title; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
            ?>
                </ul>
            </li>
            <?php
        }
    }

    public static function productCategoryList($option = 'all')
    {
        if ($option = 'all') {
            return Category::orderBy('id', 'DESC')->get();
        }

        return Category::has('products')->orderBy('id', 'DESC')->get();
    }

    public static function totalCartPrice($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('amount');
        } else {
            return 0;
        }
    }

    public static function cartCount($user_id = '')
    {

        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('quantity');
        } else {
            return 0;
        }
    }

    public static function getAllProductFromCart($user_id = '')
    {
        if (Auth::check()) {
            if ($user_id == '') {
                $user_id = auth()->user()->id;
            }

            return Cart::with('product')->where('user_id', $user_id)->where('order_id', null)->get();
        } else {
            return 0;
        }
    }
}

?>