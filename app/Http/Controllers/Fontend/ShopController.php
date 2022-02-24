<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //shopPage
    public function shopPage(){
        $products = Product::query();
        //category filter
        if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds);
        }

        //brand filter
        if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds);
        }

         //price range product
         if (!empty($_GET['price'])) {
            $price = explode('-',$_GET['price']);
            $products = $products->whereBetween('selling_price',$price);
        }

        //sortByProduct
        if (!empty($_GET['sortBy'])) {

            if ($_GET['sortBy'] == 'priceLowtoHigh') {
                $products = $products->where(['status' => 1])->orderBy('selling_price','ASC')->paginate(3);

            }elseif ($_GET['sortBy'] == 'priceHightoLow') {

                $products = $products->where(['status' => 1])->orderBy('selling_price','DESC')->paginate(3);

            }elseif ($_GET['sortBy'] == 'nameAtoZ') {
                $products = $products->where(['status' => 1])->orderBy('product_name_en','ASC')->paginate(3);

            }elseif ($_GET['sortBy'] == 'nameZtoA') {

                $products = $products->where(['status' => 1])->orderBy('product_name_en','DESC')->paginate(3);

            }else {
                $products = $products->where('status',1)->orderBy('id','DESC')->paginate(3);
            }
        }else {
            $products =$products->where('status',1)->orderBy('id','DESC')->paginate(3);
        }

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        return view('fontend.shop',compact('products','categories','brands'));
    }

    //shopFilter
    public function shopFilter(Request $request){
        // dd($request->all());
        $data = $request->all();

        //filter category
        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category='.$category;
                }else {
                    $catUrl .= ','.$category;
                }
            }
        }

        //filter brand
        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .= '&brand='.$brand;
                }else {
                    $brandUrl .= ','.$brand;
                }
            }
        }

        //filter sortBy
        $sortByUrl = "";
        if (!empty($data['sortBy'])) {
            $sortByUrl .= '&sortBy='.$data['sortBy'];
        }

          //filter sortBy
          $priceRangeUrl = "";
          if (!empty($data['price_range'])) {
              $priceRangeUrl .= '&price='.$data['price_range'];
          }

        return redirect()->route('shop',$catUrl.$brandUrl.$sortByUrl.$priceRangeUrl);
    }
}
