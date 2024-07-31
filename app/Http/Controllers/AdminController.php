<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductUpdateRequest;

class AdminController extends Controller
{
    public function dashboard(){
        $total_customer = User::where('user_type','normal')->count();
        $total_order = Order::count();
        $total_delivered_order = Order::where('status','Delivered')->count();
        $total_product = Product::all()->count();
        return view('admin.dashboard',compact('total_customer','total_order','total_delivered_order','total_product'));
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
            'category_id' => $validate_date['category'],
            'pro_quantity' => $validate_date['quantity'],
        ]);
        toastr()->success('Product Added Successfully');
        return redirect()->back();
    }

    public function all_product(){
        $view_product = Product::paginate(3);
        return view('admin.all_product', compact('view_product'));
    }

    public function edit_product($id){
        $category = Category::all();
        $edit_product = Product::find($id);
        return view('admin.edit_product',compact('category','edit_product'));
    }
    
   
    public function update_product(ProductUpdateRequest $request, $id){
        $updated_data = $request->validated();
    
        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/products');
            $image->move($destinationPath, $imageName);
            $updated_data['image'] = $imageName;
        }
    
        // Find the product
        $product = Product::findOrFail($id);
    
        // Update product data
        $product->update([
            'pro_title' => $updated_data['title'] ?? $product->pro_title,
            'pro_description' => $updated_data['description'] ?? $product->pro_description,
            'pro_price' => $updated_data['price'] ?? $product->pro_price,
            'category_id' => $updated_data['category'] ?? $product->pro_category_id,
            'pro_quantity' => $updated_data['quantity'] ?? $product->pro_quantity,
            // Update the image only if it's present in the request
            'pro_image' => $updated_data['image'] ?? $product->pro_image,
        ]);
    
        toastr()->success('Product Updated Successfully');
        return redirect()->route('all.product');
    }
    
    public function delete_product($id){
        $view_product = Product::find($id)->delete();
        toastr()->warning('Product updated Successfully');
        return redirect()->back();
    }

    public function all_order(){
        $views_order = Order::paginate(4);
        return view('admin.all_order',compact('views_order'));
    }

    public function delivered($id){
        $pro_delivered = Order::find($id)->update(['status' => 'Delivered']);
        return redirect()->back();
    }
    public function Onway($id){
        $On_the_way = Order::find($id)->update(['status' => 'On The Way']);
        return redirect()->back();
    }
    public function print_pdf($id){
        $print_pdf = Order::find($id);
        $pdf = Pdf::loadView('admin.print_pdf',compact('print_pdf'));
        return $pdf->download('invoice.pdf');

    }

























































}
