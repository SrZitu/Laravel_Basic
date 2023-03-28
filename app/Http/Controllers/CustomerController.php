<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create()
    {
        $url = url('/customer');
        $title = "Customer Registartion";
        $data = compact('url', 'title');
        return view('customer')->with($data);
    }
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->name = $request['name'];
        $customer->password = md5($request['password']);
        $customer->save();

        return redirect("/customer");
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != '') {
            $customers = Customer::where('name', 'LIKE',"%$search%")->orWhere('email', 'LIKE',"%$search%")->get();
        } else {
            $customers = Customer::all();
        }
        $data = compact('customers', 'search');
        return view('customer-view')->with($data);
    }

    public function trash()
    {
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }

    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->restore();
        }
        return redirect('customer');
    }

    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect()->back();
    }


    public function delete($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect('customer');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);

        if (is_null($customer)) {
            return view('customer');
        } else {
            $url = url('customer/update') . "/" . $id;
            $title = "Update Customer";
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        }
    }
    public function update($id, Request $request)
    {

        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->name = $request['name'];
            $customer->email = $request['email'];
            $customer->gender = $request['gender'];
            $customer->address = $request['address'];
            $customer->state = $request['state'];
            $customer->country = $request['country'];
            $customer->dob = $request['dob'];
            $customer->name = $request['name'];
            $customer->save();
        }


        return redirect("customer");
    }
}
