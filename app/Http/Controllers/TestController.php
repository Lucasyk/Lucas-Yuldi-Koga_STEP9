<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UpdateAccountRequest;

class TestController extends Controller
{
    public function login()
{
    return view('login');
}

public function loginSubmit(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('mypage');
    }

    return back();
}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
    public function register(){
        return view("register");
    }
    public function index()
{
    $products = Product::with('company')->get();

    return view('index', compact('products'));
}
public function show($id)
{
    $product = Product::findOrFail($id);

    return view("show", compact("product"));
}
public function buy($id)
{
    $product = Product::findOrFail($id);

    return view('buy', compact('product'));
}
public function create()
{
    return view('products.create');
}   
public function mypage()
{
    if(!Auth::check()){
        return redirect()->route("login");
    }       

    $user = Auth::user();

    $myProducts = Product::where('user_id', $user->id)->get();

    $purchasedProducts = Sale::where('user_id', $user->id)
        ->with('product')
        ->get();

    $likedProducts = Like::where('user_id', $user->id)
        ->with('product')
        ->get();

    return view('mypage', compact(
        'user',
        'myProducts',
        'purchasedProducts',
        'likedProducts'
    ));
}
public function edit()
{
    $user = Auth::user();

    return view('account.edit', compact('user'));
}
public function myProducts()
{
    $products = Product::where('user_id', Auth::id())->get();

    return view('mypage-products', compact('products'));
}
public function inquiry()
{
    return view('inquiry');
}

public function inquirySubmit(Request $request)
{
    // for now just test
    return redirect()->route('inquiry')->with('success', '送信しました！');
}
public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $imgPath = null;

    if ($request->hasFile('img_path')) {
        $imgPath = $request->file('img_path')->store('products', 'public');
    }

    Product::create([
        'user_id' => Auth::id(),
        'company_id' => Auth::user()->company_id,
        'product_name' => $request->product_name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'img_path' => $imgPath,
    ]);

    return redirect()->route('mypage');
}
public function editProduct($id)
{
    $product = Product::findOrFail($id);

    return view('products.edit', compact('product'));
}

public function updateProduct(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = [
        'product_name' => $request->product_name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ];

    if ($request->hasFile('img_path')) {
        $data['img_path'] = $request->file('img_path')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('products.sale.show', $product->id);
}
public function purchase(Request $request, $id)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $product = Product::findOrFail($id);
    
    if ($product->stock < $request->quantity) {
    return back()->with('error', '在庫が足りません');
}

$product->decrement('stock', $request->quantity);

    Sale::create([
        'user_id' => Auth::id(),
        'product_id' => $product->id,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('mypage');
}
public function like($id)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $product = Product::findOrFail($id);

    Like::firstOrCreate([
        'user_id' => Auth::id(),
        'product_id' => $product->id,
    ]);

    return redirect()->route('products.show', $product->id);
}
public function registerSubmit(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'company_id' => 1,
    ]);

    Auth::login($user);

    return redirect()->route('mypage');
}
public function updateAccount(UpdateAccountRequest $request)
{
    $user = Auth::user();

    $user->update($request->validated());

    return redirect()->route('mypage');
}
public function deleteProduct($id)
{
    $product = Product::where('user_id', Auth::id())
        ->where('id', $id)
        ->firstOrFail();

    $product->delete();

    return redirect()->route('mypage');
}
public function saleShow($id)
{
    $product = Product::where('user_id', Auth::id())
        ->where('id', $id)
        ->firstOrFail();

    return view('products.sale-show', compact('product'));
}
}
