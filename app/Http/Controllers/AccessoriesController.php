<?php

namespace App\Http\Controllers;
use App\Models\Accessories;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class AccessoriesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function create(){
        $data =Product::get();
        return view('accessories.create',compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required|unique:accessories',
            'price'  => 'required',
            'images'  =>  'required',               
            'product_id'  => 'required',
            'description'  => 'required',              
        ]);
        if ($request->hasFile('images')) {
        $files = $request->file('images');
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $file->move('accessories', 
                $image_full_name);
                $images[] = $image_full_name;
            }
        }
        $explode = implode(',',$images);
    
        $accessories = new accessories();
        $accessories->tittle= $request->tittle;
        $accessories->price= $request->price;
        $accessories->image= $explode;
        $accessories->product_id= $request->product_id;
        $accessories->description= $request->description;
        $accessories->save();
        return redirect('/accessories/index')->with('success',"accessories data created successfully");
    }
    public function index(){
        $data = accessories::paginate(3);
        $product = Product::get();
        return view('accessories.index',compact('data','product'));
    }
    public function delete($id){
        accessories::where('id', $id)->delete();
        return redirect('/accessories/index')->with('success',"accessories data deleted successfully");
    }
    public function edit($id){
        $data = accessories::where('id',$id)->first();
        $product = Product::get();
        return view('accessories.edit',compact('data','product'));  
    }
    
    public function update(Request $request,$id){
        $request->validate([
            'tittle' => 'required|unique:accessories,tittle,'.$id,
            'price'  => 'required',
            'images'  => 'required',              
            'product_id'  => 'required',
            'description'  => 'required',              
        ]);
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $file->move('accessories', 
                $image_full_name);
                $images[] = $image_full_name;
            }
        }
        $explode = implode(',',$images);
        
        $update_accessories = accessories::find($id);
        $update_accessories->tittle= $request->tittle;
        $update_accessories->price= $request->price;
        $update_accessories->image= $explode;
        $update_accessories->product_id= $request->product_id;
        $update_accessories->description= $request->description;
        $update_accessories->update();
        return redirect('/accessories/index')->with('success',"accessories data Updated successfully");
    }    
}