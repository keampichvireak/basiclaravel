<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $products = Product::all();
        $accessorys = Accessory::all();
        if (!empty(Auth::check())) {
            return view('all_page.home',compact('products','accessorys'));
        } else {
            return redirect()->route('welcome');
        }
    }
    public function homer(){
        $products = Product::all();
        $accessorys = Accessory::all();
        if (!empty(Auth::check())) {
            return view('all_page.Product',compact('products','accessorys'));
        } 
    }
    public function homered(){
        $products = Product::all();
        $accessorys = Accessory::all();
        if (!empty(Auth::check())) {
            return view('all_page.Accessory',compact('products','accessorys'));    
        } 
        
    }

    public function welcome(){

        $products = Product::all();
        $accessorys = Accessory::all();

        return view('all_page.welcome',compact('products','accessorys'));
    }
}
