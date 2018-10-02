<?php

namespace App\Http\Controllers;

use App\Inventory_expense;
use App\Resources;
use App\suppliers;
use App\InventorySports;
use App\stationary;
use App\labs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Inventoryexpenses extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->role_id;
        if ($user == 1) {
            $expenses = Inventory_expense::all();
            return view('inventory.expenses.expenses')->with('expenses', $expenses);
        } else {
            return back()->with('error', 'you have to login as the administritor');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = Auth::user()->id;
        if ($user == 1) {
            $suppliers = suppliers::all();
            $data = array(
                'st' => DB::table('stationaries')->pluck('productID'),
                'sp' => DB::table('inventory_sports')->pluck('productID'),
                'res' => DB::table('resources')->pluck('productID'),
                'lab' => DB::table('labs')->pluck('productID')
            );

            return view('inventory.expenses.addexpenses')->with('suppliers', $suppliers)
                ->with($data);

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
        $expenses = new Inventory_expense;
        $expenses->invoiceID = $request->input('invoiceID');
        $expenses->productID = $request->input('productID');
        $expenses->supplierID = $request->input('supplier');
        $expenses->quantity = $request->input('quantity');
        $expenses->price = $request->input('price');

        $pid = $request->input('productID');
        $sid = $request->input('supplier');

        $name= $request->input('invoiceID');

        if(DB::table('inventoryexpenses')->where('invoiceID','=',$name)->exists()){
            return redirect()->back()->with('error','Record already exists in the database');
        }

        if ($request->input('quantity') > 0) {

            if ($request->input('productID') > 100 && $request->input('productID') < 200) {

                $st = DB::table('stationaries')->pluck('supplierID');

                foreach ($st as $s) {
                    if ($s == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct stationary items supplierID');
                    }
                }

            } elseif ($request->input('productID') > 200 && $request->input('productID') < 400) {

                $labs = DB::table('labs')->pluck('supplierID');
                foreach ($labs as $l) {
                    if ($l == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct laboratary item supplierID');
                    }
                }

            } elseif ($request->input('productID') > 500 && $request->input('productID') < 600) {

                $sp = DB::table('inventory_sports')->pluck('supplierID');
                foreach ($sp as $s) {
                    if ($s == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct sports items supplierID');
                    }
                }


            } elseif ($request->input('productID') > 600 && $request->input('productID') < 700) {

                $res = DB::table('resources')->pluck('supplierID');
                foreach ($res as $r) {
                    if ($r == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct resources supplierID');
                    }
                }

            }

        } else {
            return redirect()->back()->with('error', 'Enter the correct amount');

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
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $expenses = Inventory_expense::find($id);
        $suppliers = suppliers::all();
        $data = array(
            'st' => DB::table('stationaries')->pluck('productID'),
            'sp' => DB::table('inventory_sports')->pluck('productID'),
            'res' => DB::table('resources')->pluck('productID'),
            'lab' => DB::table('labs')->pluck('productID')
        );

        return view('inventory.expenses.editexpenses')->with('suppliers', $suppliers)
            ->with($data)->with('inventoryexpenses',$expenses);



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
        $expenses = Inventory_expense::find($id);
        $expenses->invoiceID = $request->input('invoiceID');
        $expenses->productID = $request->input('productID');
        $expenses->supplierID = $request->input('supplier');
        $expenses->quantity = $request->input('quantity');
        $expenses->price = $request->input('price');

        $pid = $request->input('productID');
        $sid = $request->input('supplier');
        $name= $request->input('invoiceID');

        if(DB::table('inventoryexpenses')->where('invoiceID','=',$name)->exists()){
            return redirect()->back()->with('error','Record already exists in the database');
        }
        if ($request->input('quantity') > 0) {

            if ($request->input('productID') > 100 && $request->input('productID') < 200) {

                $st = DB::table('stationaries')->pluck('supplierID');

                foreach ($st as $s) {
                    if ($s == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct stationary items supplierID');
                    }
                }

            } elseif ($request->input('productID') > 200 && $request->input('productID') < 400) {

                $labs = DB::table('labs')->pluck('supplierID');
                foreach ($labs as $l) {
                    if ($l == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct laboratary item supplierID');
                    }
                }

            } elseif ($request->input('productID') > 500 && $request->input('productID') < 600) {

                $sp = DB::table('inventory_sports')->pluck('supplierID');
                foreach ($sp as $s) {
                    if ($s == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct sports items supplierID');
                    }
                }


            } elseif ($request->input('productID') > 600 && $request->input('productID') < 700) {

                $res = DB::table('resources')->pluck('supplierID');
                foreach ($res as $r) {
                    if ($r == $sid) {
                        $expenses->save();
                        return redirect('/inventoryexpenses')->with('success', 'Invoice details were added successfully');
                    } else {
                        return redirect()->back()->with('error', 'Enter the correct resources supplierID');
                    }
                }

            }

        } else {
            return redirect()->back()->with('error', 'Enter the correct amount');

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
        $expenses = Inventory_expense::find($id);
        if ($user == '1') {
            $expenses->delete();
            return back()->with('success', 'Record was deleted successfully');
        } else {
            return back()->with('error', 'REcord was not deleted');
        }
    }
}
