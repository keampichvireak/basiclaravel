<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\orderItem;
use App\Models\OrderItem as ModelsOrderItem;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\OrderProductItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('all_page.cart.order');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request)
    {
        $order = OrderModel::create([
            'model' => $request->model,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'phone' => $request->phone,
            'address' => $request->address,
            'user_order' => Auth::user()->id,
            'cardname' => $request->cardname,
            'cardnumber' => $request->cardnumber,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userRequestOrder()
    {
        return view('all_page.cart.userRequestOrder');
    }

    public function update_cart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove_cart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function view_user_order(){
        
        $product_order = OrderModel::all();
        return view('all_page.cart.viewUserOrder',compact('product_order'));
    }

    public function view_pay_order(){
        $product_order = OrderModel::all();
        return view('all_page.cart.payOrder',compact('product_order'));
    }

    public function EditSubject($id){

        $subject = OrderModel::find($id);
        if($subject)
        {
            return response()->json([
                'status' => 200,
                'data' => $subject,
            ]);
        }
    }

    public function UpdateSubject(Request $request,$id){

        $subject = OrderModel::find($id);
        $subject->status = $request->input('sub_status');

        $subject->update();
        return response()->json([
            'status' => 200,
        ]);
    }
}
