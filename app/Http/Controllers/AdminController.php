<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryRequest;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function category(){
        $view_category = Category::paginate(3);
        return view('admin.category',compact('view_category'));
    }
    public function add_category(CategoryRequest $request){
        $validated = $request->validated();
        $add_category = Category::create([
            'category_name' => $validated['category']
        ]);
        toastr()->success('Category Added Successfully');
        return redirect()->back();
    }
    public function edit_category($id){
        $edit_category = Category::find($id);
        return view('admin.edit_category',compact('edit_category'));
    }
    public function update_category(CategoryRequest $request ,$id){
        $validated = $request->validated();
        $add_category = Category::find($id)->update([
            'category_name' => $validated['category']
        ]);
        toastr()->success('Category Updated Successfully');
        return redirect()->route('admin.category');
    }
    public function delete_category($id){
        $edit_category = Category::find($id)->delete();
        toastr()->warning('Category Deleted Successfully');
        return redirect()->back();
    }
    // product related
    public function add_product(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }


    public function store_product(ProductRequest $request){
        $validate_date = $request->validated();

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/products');
            $image->move($destinationPath, $imageName);
            $validate_date['image'] = $imageName;
        }

        $product = Product::create([
            'pro_title' => $validate_date['title'],
            'pro_description' => $validate_date['description'],
            'pro_image' => $validate_date['image'],
            'pro_price' => $validate_date['price'],
            'category' => $validate_date['category'],
            'pro_quantity' => $validate_date['quantity'],
        ]);
        toastr()->success('Product Added Successfully');
        return redirect()->back();
    }

    // public function all_product(){
    //     $view_product = Product::with('category')->get();
    //     return view('admin.all_product',compact('view_product'));
    // }
    public function all_product(){
        $view_product = Product::all();
        // dd($view_product);
        return view('admin.all_product', compact('view_product'));
        //return $view_product;
    }
    
  


























































}
