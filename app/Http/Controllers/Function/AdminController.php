<?php

namespace App\Http\Controllers\Function;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add_item_handle(Request $request)
    {
        $products = new Product();

        $this->validate($request, [
            'item_id' => 'required|unique:products',
            'name' => 'required|unique:products|max:20',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|max:200',
            'image' => 'required',
            'category' => 'required',
        ]);

        $products->item_id = $request->item_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        if ($request->hasFile('image')) {
            $request->file('image')->move('img/image_product', $request->file('image')->getClientOriginalName());
            $products->image = $request->file('image')->getClientOriginalName();
        }
        $products->category = $request->category;

        $products->save();

        return redirect()->route('view_item')->with('success', 'Item added successfully!');
    }

    public function delete_item_handle($id)
    {
        $id_product = Product::find($id);
        $id_product->delete();
        return redirect()->back()->with('warning', 'One product data has been deleted!');
    }

    public function edit_item($id)
    {
        $data = [
            'title' => 'Edit Item',
            'id_page' => null,
            'product' => Product::find($id)
        ];
        return view('pages.admin.edit_item', $data);
    }

    public function update_item_handle(Request $request, $id)
    {
        $products = Product::find($id);
        $this->validate($request, [
            'item_id' => 'required',
            'name' => 'required|max:20',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|max:200',
            'category' => 'required'
        ]);
        $products->item_id = $request->item_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        if ($request->hasFile('image')) {
            $request->file('image')->move('img/image_product', $request->file('image')->getClientOriginalName());
            $products->image = $request->file('image')->getClientOriginalName();
        }
        $products->category = $request->category;

        $products->save();

        return redirect()->route('view_item')->with('info', 'Item updated successfully!');
    }
}
