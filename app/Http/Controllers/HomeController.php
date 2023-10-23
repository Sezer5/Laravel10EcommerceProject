<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Sliders;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function maincategorylist(){
        return Category::where('parent_id','=','0')->with('children')->get();
    }

    protected $appends = [
        'getParentsTree'
    ];

    public static  function  getParentsTree($category,$title){
        if($category->parent_Id == 0){
            return $title;
        }
        $parent = Category::find($category->parent_Id);
        $title = $parent->title . ' > ' .$title;
        return  HomeController::getParentsTree($parent,$title);
    }

    public function index()
    {
        return view('home.index', [
            'user' => User::find(1),
            'products' => Product::all(),
            'slider_active' => Sliders::where('id','=','1')->get(),
            'slider_other' => Sliders::where('id','>','1')->get(),
        ]);
    }

    public function  test(){
        return view('home.test', [
            'user' => User::find(1)
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function productdetails(string $id)
    {
        return view('home.productdetails', [
            'user' => User::find(1),
            'products' => Product::find($id),
            'product_gallery' => ProductGallery::where('product_id','=',$id)->get(),
            'slider_active' => Sliders::where('id','=','1')->get(),
            'slider_other' => Sliders::where('id','>','1')->get(),

        ]);
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

    public function login_user(){
        return view('home.login_user');
    }
    public function login_user_check(Request $request): RedirectResponse
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout_user(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login_user'))->with('loggedout', 'user logged out');
    }
}
