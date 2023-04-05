<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\Service;
use App\User;
use App\Address;
use App\Order;

class managementController extends Controller
{
    public function manage()
    {
        $res1= sale::all();
        $res2= Order::all();
        if(!$res1 && !$res2)
        {
			return view('admin_panel.dashboard.orderManagement')->with('all',[])
	         ->with('products',[])
             ->with('sale',[])
             ->with('Order', []);
        }

        $cart=[];
        $product=[];
        $users=[];
        $usership = [];
        foreach($res1 as $r )
        {

           // echo "select * from users inner join addresses on users.address_id = addresses.id where users.id = $r->user_id" .'<br>';
            $users[] = DB::select( DB::raw("select users.id as id , users.full_name as full_name, users.phone as phone , addresses.area as area , addresses.city as city , addresses.zip as zip from users inner join addresses on users.address_id = addresses.id where users.id = $r->user_id" ) )[0];
            $usership[] = DB::select(DB::raw("select orders.id as id, orders.name as name, orders.phone as phone , orders.address as address from orders where orders.user_id = $r->user_id"))[0];
             //$users[]=User::find($r->user_id)->with('addresses')->get();
             $totalCart = explode(',',$r->product_id);
             foreach($totalCart as $c)
             {
                $cart[]=array_prepend(explode(':',$c), $r->id);
                $a=explode(':',$c);
                $res = Product::find($a[0]);
                $product[]=$res;
             }
        }

        //dd($users);
        //dd($users[0]->area);

         return view('admin_panel.orders.index')->with('all',$cart)
         ->with('products',$product)
         ->with('sale',$res1)
         ->with('order', $res2)
         ->with('users',$users)
         ->with('status',['Placed','On Process','Delivered','Cancel'])
         ->with('paystatus', ['Paid', 'Unpaid']);

    }
    public function update(Request $r)
    {
    	$n=sale::find($r->orderId);
        if ($r->has('ord'))
        {
    	    if($n)
    	    {
                $n->order_status=$r->stat;
    		    $n->save();
            }
        }
        if ($r->has('pay'))
        {
            if($n)
            {
                $n->payment_status = $r->paystat;
                $n->save();
            }
        }
    	$res1= sale::all();
        if(!$res1)
        {
			return view('admin_panel.dashboard.orderManagement')->with('all',[])
	         ->with('products',[])
	         ->with('sale',[]);
        }

        $cart=[];
        $product=[];
        foreach($res1 as $r )
        {
             $totalCart = explode(',',$r->product_id);
             foreach($totalCart as $c)
             {
                 $cart[]=array_prepend(explode(':',$c), $r->id);
                $a=explode(':',$c);
                $res = Product::find($a[0]);
                $product[]=$res;
             }
        }
         return redirect()->route('admin.orderManagement');

    }

    public function manageBooking()
    {
        $res1 = Service::all();
        if (!$res1) {
            return view('admin_panel.dashboard.orderManagement')->with('all', [])
            ->with('products', [])
            ->with('Service', []);
        }

        $cart = [];
        $product = [];
        $users = [];

        foreach ($res1 as $r) {

            // echo "select * from users inner join addresses on users.address_id = addresses.id where users.id = $r->user_id" .'<br>';
            $users[] = DB::select(DB::raw("select users.id as id , users.full_name as full_name , users.phone as phone , addresses.area as area , addresses.city as city , addresses.zip as zip from users inner join addresses on users.address_id = addresses.id where users.id = $r->user_id"))[0];
            //$users[]=User::find($r->user_id)->with('addresses')->get();
            $totalService = explode(',', $r->user_id);
            foreach ($totalService as $c) {
                $service[] = array_prepend(explode(':', $c), $r->id);
                // $a = explode(':', $c);
                // $res = Product::find($a[0]);
                // $product[] = $res;
            }
        }
        //dd($users);
        //dd($users[0]->area);

        return view('admin_panel.service.index')
            ->with('all', $service)
            ->with('products', $product)
            ->with('Service', $res1)
            ->with('users', $users)
            ->with('status', ['Placed', 'Scheduling', 'Booked', 'Cancel']);
    }
    public function updateBooking(Request $r)
    {
        $n = Service::find($r->bookId);

        if ($n) {
            $n->booking_status = $r->stat;
            $n->save();
        }

        $res1 = Service::all();
        if (!$res1) {
            return view('admin_panel.dashboard.orderManagement')->with('all', [])
            ->with('products', [])
            ->with('Service', []);
        }

        $cart = [];
        $product = [];
        foreach ($res1 as $r) {
            $totalService = explode(',', $r->user_id);
            foreach ($totalService as $c) {
                $service[] = array_prepend(explode(':', $c), $r->id);
                // $a = explode(':', $c);
                // $res = Product::find($a[0]);
                // $product[] = $res;
            }
        }
        return redirect()->route('admin.bookingManagement');
    }
}
