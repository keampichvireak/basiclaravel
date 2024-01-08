<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest('id')->paginate(5);
        return view('all_page.prduct_page.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('all_page.prduct_page.create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {

        $image_parh = '';

        if ($request->hasFile('image')) {
            $image_parh = $request->file('image')->store('products');
        }

        $product = Product::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storange_capcity' => $request->storange_capcity,
            'display_size' => $request->display_size,
            'graphic_card' => $request->graphic_card,
            'color' => $request->color,
            'warranty_period' => $request->warranty_period,
            'image' => $image_parh,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        if (!$product) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating product.');
        }
        return redirect()->route('product')->with('success', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('all_page.prduct_page.edit_product')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->processor = $request->processor;
        $product->ram = $request->ram;
        $product->storange_capcity = $request->storange_capcity;
        $product->display_size = $request->display_size;
        $product->graphic_card = $request->graphic_card;
        $product->warranty_period = $request->warranty_period;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            //delete old image
            if ($product->image) {
                Storage::delete($product->image);
            }
            //store new image
            $image_parh = $request->file('image')->store('products');
            //save to database
            $product->image = $image_parh;
        }

        if (!$product->save()) {
            return redirect()->back()->with('error', 'Sorry, there a problem while updating product.');
        }
        return redirect()->route('products.index')->with('success', 'success, your product has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        return response()->json([
            'success' => true,
        ]);
    }

    public function add_product_to_cart($id)
    {

        $product = Product::findOrfail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'model' => $product->model,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image
            ];
        }
        session()->put('cart', $cart);
        return Redirect()->back()->with('success', 'Product has added to cart');
    }

    // public function updateCart(Request $request)
    // {
    //     if ($request->id && $request->quantity) {
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Book added to cart.');
    //     }
    // }

    // public function deleteProduct(Request $request)
    // {
    //     if ($request->id) {
    //         $cart = session()->get('cart');
    //         if (isset($cart[$request->id])) {
    //             unset($cart[$request->id]);
    //             session()->put('cart', $cart);
    //         }
    //         session()->flash('success', 'Book successfully deleted.');
    //     }
    // }

    public function update_cart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove_cart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
    
}
