<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

use Spatie\Permission\Models\Role;


class BackendController extends Controller
{
	// Order
	public function order(){
		$orders = Order::all();

		return view('backend.order.list',compact('orders'));
	}

	// Customer
    public function customer(){

    	$role = Role::findByName('customer');
    	$customers = $role->users;

        return view('backend.customer.list',compact('customers'));
    }

    public function customerdelete($id){
    	$customer = User::find($id);
    	$customer->roles()->detach();
        $customer->delete();

        return redirect('customer');

    }
}
