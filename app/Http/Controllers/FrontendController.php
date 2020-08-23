<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


use App\Category;
use App\Subcategory;
use App\Item;
use App\Brand;
use App\Order;

class FrontendController extends Controller
{
    public function index(){

    	$categories = Category::all();

        $topitems = Item::all()->random(3);
        $latestitems = Item::latest()->take(3)->get();
        
        $discountitems = Item::whereNotNull('discount')->take(3)->get();

        // $discountitems = Item::where('discount','>', '0')->take(3)->get();

    	return view('frontend.index',compact('categories','topitems','latestitems','discountitems'));

    }

    public function promotion(){
        $discountitems = Item::whereNotNull('discount')->paginate(3);

        $count_result = Item::whereNotNull('discount')->count();

    	return view('frontend.promotion',compact('discountitems','count_result'));

    }

    public function brand($id){
    	$brand = Brand::find($id);
    	$branditems = Item::where('brand_id',$id)->get();

    	return view('frontend.brand',compact('branditems','brand'));
    }

    public function subcategory($id){
    	$subcategory = Subcategory::find($id);


    	$category_id = $subcategory->category->id;
    	$subcategories = Subcategory::where('category_id',$category_id)->get();

    	$subcategoryitems = Item::where('subcategory_id',$id)->paginate(6);
        $latestitems = Item::latest()->take(3)->get();


        $count_result = Item::where('subcategory_id',$id)->count();

    	return view('frontend.subcategory',compact('subcategoryitems','subcategory','count_result','latestitems','subcategories'));
    }



    public function detail($id){
    	$item = Item::find($id);

    	return view('frontend.detail',compact('item'));
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function order(Request $request){

        $auth = Auth::user();

        $userid = $auth->id;
        $deliveryprice = $auth->township->price;


        $carts = json_decode($request->data);

        // dd($carts);
        $total = 0;

        foreach ($carts as $row) {
            $unitprice = $row->unitiprice;
            $discount = $row->discount;

            if ($discount) {
                $price = $discount;
            }else{
                $price = $unitprice;
            }

            $total+=$price*$row->qty;
        }

        $totality = $total + $deliveryprice;
        $orderdate = Carbon::now();
        $voucherno = uniqid();
        $note = $request->note;
        $status = 'Order';

        $order = new Order;
        $order->orderdate = $orderdate;
        $order->voucherno = $voucherno;
        $order->total = $totality;
        $order->note = $note;
        $order->status = $status;
        $order->user_id = $userid;
        $order->save();

        foreach ($carts as $value) {
            $order->items()->attach($value->id,['qty'=>$value->qty]);
        }

        return response()->json([
            'status' => 'Order Successfully created!'
        ]);
        
    }


    public function ordersuccess(){
        return view('frontend.ordersuccess');
    }













}
