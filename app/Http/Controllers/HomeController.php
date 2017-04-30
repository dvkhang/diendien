<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\User;
use App\Http\Helpers\BladeHelper;
use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\State;
use App\District;
class HomeController extends Controller
{
    use BladeHelper;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $count_category = Category::count();
        $count_product  = Product::count();
        $count_user     = \App\User::count();
        $count_order     = \App\Order::count();
        $orders  = Order::all();
        return view('admin.index', compact('count_category', 'count_product', 'count_user', 'count_order', 'orders'));
    }

    public function index()
    {
        $categories = Category::where('featured', 1)->where('status', 1)->get();
        return view('frontend.pages.index', compact('categories'));
    }

    public function category($category_id){
        $categories = Category::where('status', 1)->where('parent_id', 0)->get();
        
        $id       = $this->get_id($category_id);
        $products =  Product::where('category_id', $id)->paginate(15);
        $category = Category::findOrFail($id);
        $url      = str_slug($id . ' ' . $category->name);
        if ($category_id != $url) {
            return redirect('/category/' . $url);
        }
        return view('frontend.pages.category', compact('products', 'categories', 'category'));
    }

    public function productDetail($item_id)
    {
        $categories = Category::where('status', 1)->get();
        $id       = $this->get_id($item_id);
        $product  = Product::findOrFail($id);
        $url      = str_slug($id . ' ' . $product->name);
        if ($item_id != $url) {
            return redirect('/product/' . $url);
        }
        return view('frontend.pages.product', compact('categories', 'product'));
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $content = Cart::content();
        if ($content->isEmpty()){
            Cart::add($product->id, $product->name, 1, $product->price, ['image' => $product->getMedia()[0]->getUrl(), 'weight'=>$product->weight]);
        }else{
            foreach ($content as $item) {
                if ($product->id == $item->id) {
                    Cart::update($item->rowId,1);
                    break;
                }
            }
            Cart::add($product->id, $product->name, 1, $product->price, ['image' => $product->getMedia()[0]->getUrl(),'weight'=>$product->weight]);
        }
        return redirect()->back();
    }
    public function cart()
    {
        $categories = Category::where('status', 1)->get();
        $content = Cart::content();
        $total = Cart::total();
        return view('frontend.pages.cart', compact('content', 'total','categories'));
    }
    public function updateItemCart(Request $request)
    {
       $rowId = $request->rowId;
       $pId = $request->pId;
       $quantity = $request->quantity;
       $curent_quantity = Product::find($pId);
            if ($curent_quantity->quantity >= $quantity) {
                Cart::update($rowId, $quantity);
                $total = Cart::total();
                return $data = array($total, 'ok');
            }else{
                Cart::update($rowId, $curent_quantity->quantity);
                $total = Cart::total();
                return $data = array($total, 'mac');
            }
       

    }

    public function removeItemCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function continueShopping()
    {
        return redirect()->guard();
    }

    public function checkOut()
    {

        if (Cart::content()->isEmpty() == true) {
            return redirect('/');
        }
        $states = State::all();
        return view('frontend.pages.checkout', compact('states'));
    }

    public function getCity(Request $request)
    {
        $state = $request->selectedState;
        $district =  District::where('state_id', State::where('value', $state)->first()->id)->get();
    // $stateArr = array(
    //                 "thainguyen" => array("-- Vui lòng chọn thành phố --", "Thành Phố Thái Nguyên", "
    //                 Thị xã Sông Công","Huyện Đồng Hỷ", "Huyện Võ Nhai", "Huyện Phổ Yên", "Huyện Phú Lương","Huyện Phú Bình", "HUyện Định Hóa", "Huyện Đại Từ"),
    //                 "hanoi" => array("-- Vui lòng chọn thành phố --", "Quận Ba Đình", "Quận Bắc Từ Liêm", "Quận Cầu Giấy", "   Quận Đống Đa", "Quận Hà Đông", "Quận Hai Bà Trưng", "Quận Hoàn Kiếm", "Quận Hoang Mai", "Quận Long Biên", "Quận Nam Từ Liêm", "Quận Tây Hồ", "Quận Thanh Xuân", "Thị xã Tây Sơn", "Huyện Ba Vì", "Huyên Chương Mỹ", "Huyện Đan Phượng", "Huyện Đông Anh", "Huyện Gia Lâm", "Huyện Hoài Đức", "Huyên Mê Linh", "Huyện Mỹ Đức", "Huyện Phú Xuyên", "Huyện Phúc Thọ", "Huyện Quốc Oai", "Huyện Sóc Sơn", "Huyện Thạch Thất", "Huyện Thanh Oai", "Huyện Thanh Trì", "Huyện Thường Tín", "Huyện Ứng Hòa"),
    //                 "bacgiang" => array("-- Vui lòng chọn thành phố --", "Thành phố Bắc Giang", "Huyện Hiệp Hòa", "Huyện Yên Dũng", "Huyện Lục Nam", "Huyện Sơn Động", "Huyện Lạng Giang", "Huyện Việt Yên", "Huyện Lục Ngạn", "Huyện Tân Yên", "Huyện Yên Thế"),
    //                 "bacninh" => array("-- Vui lòng chọn thành phố --", "Thành phố Bắc Ninh", "Huyện Yên Phong", "Huyện Quế Võ", "Huyện Tiên Du", "Huyện Từ Sơn", "Huyện Thuận Thành", "Huyện Gia Bình", "Huyện Lương Tài"),
    //                 "baccan" => array("-- Vui lòng chọn thành phố --", "Thị xã Bắc Kạn", "Huyện Chợ Đồn", "Huyện Bạch Thông", "Huyện Na Rì", "Huyện Ngân Sơn", "Huyện Ba Bể", "Huyện Chợ Mới", "Huyện Pác Nặm"),
    //                 "langson" =>array("-- Vui lòng chọn thành phố --", "Thành phố Lạng Sơn", "Huyện Tràng Định", "Huyện Bình Gia", "Huyện Văn Lãng", "Huyện Bắc Sơn", "Huyện Văn Quan", "Huyện Cao Lộc", "Huyện Lộc Bình", "Huyện Chi Lăng", "Huyện Đình Lập", "Huyện Hữu Lũng")
    //             );
        $district->toArray();
    return  $district;

    }


    public function checkOutSuccess()
    {
        return view("frontend.pages.checkout-success");
    }


    public function search(Request $request)
    {

        $category = $request->category_search;
        $key =  $request->key;
        if ($category != "" && $key != "" ) {
        $result=   Product::where(function($query) use ($category, $key){
                $query->where(function($query) use($category){
                    $query->where('category_id', $category);
                });
                $query->where(function($query) use($key){
                    $query->where("name", "LIKE","%$key%")
                        ->orWhere("description", "LIKE", "%$key%");
                });
            })->paginate(15);
        return  view('frontend.pages.result-search', compact('result'));
        }elseif ($key != "" && $category == "") {
        $result=    Product::where(function($query) use ($key){
                $query->where(function($query) use($key){
                    $query->where("name", "LIKE","%$key%")
                        ->orWhere("description", "LIKE", "%$key%");
                });
            })->paginate(15);
        return  view('frontend.pages.result-search', compact('result'));
        }else{
            return redirect()->back();
        }

        
        
    }


    public function getContactUs()
    {
        return view('frontend.pages.contact-us');
    }

    public function postContactUs(Request $request)
    {
        dd($request);
    }


    public function getAbouttUs()
    {
        return view('frontend.pages.about-us');
    }

    // public function checkOrder(Request $request)
    // {
    //     if (Auth::guest()) {
    //         return 0;
    //     } else {
    //         $order = Order::where('user_id', Auth::user()->id)->where('model_type', 'App\Addon')->where('model_id', $request->addon)->first();
    //         if (!empty($order) && $order->status == 1) {
    //             return 1;
    //         }
    //     }
    //     return 2;

    // }
}
