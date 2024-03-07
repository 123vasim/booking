<?php

namespace App\Http\Controllers;
use App\Models\Condition;
use App\Models\Product;
use Illuminate\Http\Request;


class ConditionController extends Controller
{
    public function create(){
        $data = Product::get();
        return view('condition.create',compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'product_id'=> 'required',
            'condition'=> 'required',

        ]);
            $condition= new Condition();
            $condition->product_id= $request->product_id;
            $condition->condition= $request->condition;
            $condition->save();
        return redirect('/condition/index')->with('success',"condition data created successfully");
    }
    public function index(){
        $data = Condition::paginate(3);
        return view('condition.index',compact('data'));
    } 
    public function edit($id){
        $data = condition::where('id',$id)->first();
        $product = Product::get();
        return view('condition.edit',compact('data','product'));  
    }
    public function delete($id){
        Condition::where('id', $id)->delete();
        return redirect('/condition/index  ')->with('success',"customer data deleted successfully");
    } 
    public function update(Request $request,$id)
    {
        $request->validate([
            'product_id'  => 'required',
            'condition'  => 'required',              
        ]);
        $update_condition = condition::find($id);
        $update_condition->product_id= $request->product_id;
        $update_condition->condition= $request->condition;
        $update_condition->update();
        return redirect('/condition/index')->with('success',"condition data Updated successfully");
    }   
}