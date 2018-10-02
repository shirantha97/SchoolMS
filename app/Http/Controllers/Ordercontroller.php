<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\labs;
use App\Resources;
use App\InventorySports;
use App\stationary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ordercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $order = Orders::all();
        return view('inventory.orders.viewOrders')->with('orders', $order);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $id = Auth::user()->role_id;
        $labs = DB::table('labs')->where('amount', '>', 10)->pluck('name');
        $st = DB::table('stationaries')->where('amount', '>', 10)->pluck('name');
        $sports = DB::table('inventory_sports')->where('amount', '>', 10)->pluck('name');
        $res = DB::table('resources')->where('amount', '>', 10)->pluck('name');

        return view('inventory.orders.addorder')->with('id', $id)
            ->with('labs', $labs)
            ->with('st', $st)
            ->with('sports', $sports)
            ->with('res', $res);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $orders = new Orders;
        $orders->empid = $request->input('empID');
        $orders->items = $request->input('items');
        $orders->quantity = $request->input('qty');
        $orders->type = $request->input('type');

        $type = $request->input('type');
        $name = $request->input('items');
        $qty = $request->input('qty');

        $st = DB::table('stationaries')->pluck('name');
        $res = DB::table('resources')->pluck('name');
        $sp = DB::table('inventory_sports')->pluck('name');
        $lab = DB::table('labs')->pluck('name');


        if ($qty > 0) {
            $orders->save();
            return redirect()->back()->with('success', 'Order was placed successfully');
        } else {
            return redirect()->back()->with('error', 'Enter the correct quantity');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = Auth::user()->role_id;
        $order = Orders::find($id);
        if ($user == $id) {
            return view('inventory.orders.edit')->with('orders', $order, 'id', $user);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->role_id;
        $empid = Orders::find($id);
        if ($user == $empid->empid) {
            DB::table('orders')->where('id', '=', $id)->delete();
            return redirect('/orders')->with('error', 'Record was deleted successfully');
        } else {
            return redirect()->back()->with('error', 'The order was not placed by you');
        }

    }

    public function truncate()
    {
//        $orders = DB::table('orders')->truncate();
//        $o = stationary::query()->delete();
        $or = stationary::where('id', 'LIKE', '%%')->delete();
        return back()->with('success', 'Table was successfully reset');
    }
}
