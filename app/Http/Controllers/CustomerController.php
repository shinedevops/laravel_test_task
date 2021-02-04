<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
	/*
	Method Name:    getList
    Developer:      Shine Dezign
    Created Date:   2021-02-01 (yyyy-mm-dd)
    Purpose:        To get list of all customers
    Params:         
     */
    public function getList(Request $request)
    {
        $sort = $request->sortby != '' ? $request->sortby : '';
        $search_keyword = $request->search_keyword ? $request->search_keyword : '';
        $data = Customer::when($request->search_keyword, function($q) use($request){
            $q->where('name', 'like', '%'.$request->search_keyword.'%')
            ->orWhere('mobile', 'like', '%'.$request->search_keyword.'%')
            ->orWhere('contact_person', 'like', '%'.$request->search_keyword.'%')
            ->orWhere('number_of_sites', 'like', '%'.$request->search_keyword.'%')
            ->orWhere('email', 'like', '%'.$request->search_keyword.'%');
        })->when($request->sortby != '', function($q) use($request){
            $q->where('status', $request->sortby);
        })->sortable(['id' => 'desc'])->paginate(5);
        return view('pages.customers.list', compact('data', 'sort', 'search_keyword'));
    }
    /* End method getList */
	/*
	Method Name:    getDetail
    Developer:      Shine Dezign
    Created Date:   2021-02-01 (yyyy-mm-dd)
    Purpose:        To get detail of customer
    Params:         
     */
    public function getDetail(Request $request, $id)
    {
        $record = Customer::find($id);
        if(!$record)        
        return redirect()->route('customer.list')->with('status', 'error')->with('message', 'Oops! Something went wrong');
        return view('pages.customers.view', compact('record'));
    }
    /* End method getDetail */

	/*
	Method Name:    addCustomer
    Developer:      Shine Dezign
    Created Date:   2021-02-01 (yyyy-mm-dd)
    Purpose:        To save customer detail into database
    Params:         
     */
    public function addCustomer(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('pages.customers.add');
        }
        else
        {
            $validatedData = $request->validate(Customer::$createRules);

            try{
                $toy = Customer::create([
                    'name' => $request->name,
                    'contact_person' => $request->contact_person,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'number_of_sites' => $request->number_of_sites,
                    'status' => $request->status
                ]);
                return redirect()->route('customer.list')->with('status', 'success')->with('message', 'Customer has been created successfully');
            } catch (\Exception $e) {
                return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
            }
        }
    }
    /* End method addCustomer */

	/*
	Method Name:    addCustomer
    Developer:      Shine Dezign
    Created Date:   2021-02-01 (yyyy-mm-dd)
    Purpose:        To save customer detail into database
    Params:         
     */    
    public function deleteRecord($id){
        try {
            $record = Customer::find($id);
            if(!$record)        
            return redirect()->route('customer.list')->with('status', 'error')->with('message', 'Oops! Something went wrong');
            Customer::where('id',$id)->delete();
        	return redirect()->back()->with('status', 'success')->with('message', 'Customer has been deleted successfully');        	
        }catch(Exception $ex){
            return redirect()->back()->with('status', 'error')->with('message', $ex->getMessage());
        }
    }
    /* End method addCustomer */
}
