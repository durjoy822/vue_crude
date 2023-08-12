<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\name;
use function Symfony\Component\Console\Helper\render;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function index(){
        return inertia::render('index',[
            'customers'=> Customer::all()->map(function ($customer){
                return[
                    'id'=>$customer->id,
                    'name'=>$customer->name,
                    'email'=>$customer->email,
                    'phone'=>$customer->phone,
                ];
            }),
        ]);
    }

    public function create(){
        return inertia::render('create');
    }
    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:customers',
            'phone'=>'required|unique:customers|max:14|min:10',
        ]);
        Customer::create($validated);
        return Redirect::route('customer.index')->with('message','Customer Created Successfully!');
    }

    public function edit(Customer $customer){
        return Inertia::render('edit',[
            'customer'=>$customer
        ]);
    }
    public function  update(Request $request ,Customer $customer){
        $validated=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone'=>'required|max:14|min:10',
        ]);
        $customer->update($validated);
        return Redirect::route('customer.index')->with('message', 'Customer Updated successfully!');
    }

    public function show($id){
//        return $id;
        return Inertia::render('show',[
           'customer'=>Customer::findOrFail($id)
        ]);
    }
    public function destroy(Customer $customer){
//        $customer=Customer::findOrFail($id);
        $customer->delete();
        return redirect(route('customer.index'))->with('message','Customer Deleted Successfully!');
    }

}
