<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessoryStoreRequest;
use App\Http\Requests\AccessoryUpdateRequest;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessorys = Accessory::latest('id')->paginate(5);
        return view('all_page.accessory_page.accessory',compact('accessorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('all_page.accessory_page.create_accessory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccessoryStoreRequest $request)
    {
        $image_parh = '';

        if ($request->hasFile('image')) {
            $image_parh = $request->file('image')->store('accessorys');
        }

        $accessory = Accessory::create([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'image' => $image_parh,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        if (!$accessory) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating accessory.');
        }
        return redirect()->route('accessory.index')->with('success', 'success');

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
    public function edit(Accessory $accessory)
    {
        return view('all_page.accessory_page.edit_accessory')->with('accessory', $accessory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccessoryUpdateRequest $request,Accessory $accessory)
    {
        $accessory->category = $request->category;
        $accessory->brand = $request->brand;
        $accessory->model = $request->model;
        $accessory->color = $request->color;
        $accessory->price = $request->price;
        $accessory->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            //delete old image
            if ($accessory->image) {
                Storage::delete($accessory->image);
            }
            //store new image
            $image_parh = $request->file('image')->store('accessorys');
            //save to database
            $accessory->image = $image_parh;
        }

        if (!$accessory->save()) {
            return redirect()->back()->with('error', 'Sorry, there a problem while updating accessory.');
        }
        return redirect()->route('accessory.index')->with('success', 'success, your accessory has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessory $accessory)
    {
        if ($accessory->image) {
            Storage::delete($accessory->image);
        }
        $accessory->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
