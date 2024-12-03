<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        toastr()->timeOut(5000)->closeButton()->success('Category Added Successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->timeOut(5000)->closeButton()->success('Category Deleted Successfully');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Category has been Updated');

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Product has been Added');

        return redirect()->back();
    }

    public function view_product()
    {
        $data = Product::paginate(4);
        return view('admin.view_product', compact('data'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $data->delete();

        $image_path = public_path('products/' . $data->image);

        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        toastr()->timeOut(5000)->closeButton()->success('Product has been Deleted');

        return redirect()->back();
    }

    public function edit_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        return view('admin.edit_product', compact('data', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $old_image = $data->image;
            $image_path = public_path('products/' . $data->image);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(5000)->closeButton()->success('Product has been Updated');

        return redirect('/view_product');
    }

    public function search_product(Request $request)
    {
        $search_text = $request->search;
        if ($request->has('all') || empty($search_text)) {
            $data = Product::paginate(4);
        } else {
            $data = Product::where('title', 'like', '%' . $search_text . '%')
                ->orWhere('category', 'like', '%' . $search_text . '%')
                ->paginate(4);

            if (count($data) == 0) {
                toastr()->timeOut(5000)->closeButton()->warning('No Result Found');
                return redirect()->back();
            }
        }

        return view('admin.view_product', compact('data'));
    }

    public function view_order()
    {
        $data = Order::all();

        return view('admin.order', compact('data'));
    }
}
