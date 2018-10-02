<?php

namespace App\Http\Controllers;

use App\suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Suppliercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user()->role_id;
        $suppliers = suppliers::all();
        if($user == 1){
            return view('.inventory.supplier.supplier')->with('suppliers', $suppliers);
        }
        else{
            return redirect('/index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//        $users = DB::table('suppliers')
//            ->select(DB::raw('select type'))
//            ->where('supplierID', '<', 2000)
//            ->get();
        $user = Auth::user()->role_id;
        if ($user == 1) {
            return view('inventory.supplier.addsupplier');
        }
        else{
            return back()->with('error','You do not have rights to perform this action');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = Auth::user()->role_id;
        $supplier = new suppliers();
        $supplier->supplierID = $request->input('supplierid');
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->contact_details = $request->input('contact');
        $supplier->type = $request->input('type');

        if ($supplier->type == 'S' && $supplier->supplierID > 1000 && $supplier->supplierID < 2000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was added successfully');
        } elseif ($supplier->type == 'L' && $supplier->supplierID > 2000 && $supplier->supplierID < 3000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was added successfully');
        } elseif ($supplier->type == 'R' && $supplier->supplierID>3000 && $supplier->supplierID < 4000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was added successfully');
        } elseif ($supplier->type == 'SP' && $supplier->supplierID >4000 && $supplier->supplierID < 5000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was added successfully');
        } else {
            return back()->with('error', 'Enter the correct supplierID to match the supplier type');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->role_id;
        if ($user == 1) {
            $supplier = suppliers::find($id);
            return view('inventory.supplier.supplieredit')->with('supplier', $supplier);
        } else {
            return redirect('/supplier')->with('error', 'You do not have admin rigts to perform the action');
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
        $supplier = suppliers::find($id);
        $supplier->supplierID = $request->input('supplierid');
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->contact_details = $request->input('contact');
        $supplier->type = $request->input('type');

        if ($supplier->type == 'S' && $supplier->supplierID > 1000 && $supplier->supplierID < 2000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was updated successfully');
        } elseif ($supplier->type == 'L' && $supplier->supplierID > 2000 && $supplier->supplierID < 3000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was updated successfully');
        } elseif ($supplier->type == 'SP' && $supplier->supplierID && $supplier->supplierID < 4000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was updated successfully');
        } elseif ($supplier->type == 'R' && $supplier->supplierID && $supplier->supplierID < 5000) {
            $supplier->save();
            return redirect('/supplier')->with('success', 'Record was updated successfully');
        } else {
            return redirect()->back()->with('error', 'Record was not added successfully');
        }
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
        $suppliers = suppliers::find($id);
        if ($user == '1') {
            DB::table('suppliers')->where('supplierID','=',$id)->delete();
            return redirect()->back()->with('success', 'Record was deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You have no admin rights to perform the action');
        }

    }

    public function search(Request $request){
        $search = $request->input('search');
        return view('orders.viewOrders')->with('search',$search);
    }
}
