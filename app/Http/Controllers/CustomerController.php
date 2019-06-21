<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('layouts.customer.viewcustomer')->with(compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layouts.customer.createcustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'cname'=> ['required','min:3'],
            'cnumber'=>'required',
            'product'=>'required',
            'snumber'=>'required',
            'mnumber'=>'required',
            'placeofpurchase'=>'required',
            'warranty' => 'required',
            'warrantycard' => 'required',
            'rnumber'=> 'required',
            'datep'=>'required'
        ]);
        
        //Customer::create($attributes);
        
        $customers = new Customer();
        
        $customers->customername = request('cname');
        $customers->customernumber = request('cnumber');
        $customers->product = request('product');
        $customers->serialnumber = request('snumber');
        $customers->modelnumber = request('mnumber');
        $customers->warranty = request('warranty');
        $customers->warrantycard = request('warrantycard');
        $customers->receiptnumber = request('rnumber');
        $customers->placeofpurchase = request('placeofpurchase');
        $customers->date = request('datep');

        $customers->save();
        
        $status="Customer Created Successfully";
        return redirect('/home')->with(['status'=>$status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        
        //the view tha creates the brief
        return view('layouts.customer.editcustomer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customers = Customer::find($id);
        $customers->customername = request('cname');
        $customers->customernumber = request('cnumber');
        $customers->product = request('product');
        $customers->serialnumber = request('snumber');
        $customers->modelnumber = request('mnumber');
        $customers->warranty = request('warranty');
        $customers->warrantycard = request('warrantycard');
        $customers->placeofpurchase = request('placeofpurchase');
        $customers->receiptnumber = request('rnumber');
        
        $customers->date = request('datep');
        $customers->save();
        $status = "Customer updated successfully!!";
        // return dd($request->all());
        //return redirect('/brief/show/' . $id)->with(['status'=>$status]);
        return redirect('/customer/customers/')->with(['status'=>$status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customer::find($id);
        $customers->delete();
        $status = "Customer Deleted successfully!!";
        return redirect('customer/customers')->with(['status'=>$status]);
    }

    
}
