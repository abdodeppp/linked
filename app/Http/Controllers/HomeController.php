<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Custmer;
use App\Models\Product;
use App\Models\JobAccept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public $data = array();
    public function __construct(Request $request)
    {

        $this->data['categories'] = Category::get();
    }
    public function index()
    {
        $this->data['jobs'] = Product::get();

        return view('fornt.index', $this->data);
    }
    public function contact()
    {
        return view('fornt.contact',$this->data);
    }
    public function about()
    {
        return view('fornt.about',$this->data);
    }
    public function jobAll(Request $request)
    {
        $query = Product::with('product')->when($request->category, function ($q) use ($request) {
            $q->where('category_id', $request->category);
        })
        ->when($request->title, function ($q) use ($request) {
            $q->whereHas('product',function($query)use($request){
                $query->where('name', 'like', '%' . $request->title . '%');
            });
        })
        ->when($request->location, function ($q) use ($request) {
            $q->where('location', 'like', '%' . $request->location . '%');
        });

        $this->data['jobs'] = $query->get();

        return view('fornt.job-list',$this->data);
    }

    public function jobDetails($id)
    {
        $this->data['job'] = Product::where('id',$id)->first();
        return view('fornt.job-detail',$this->data);
    }

    // Display the login form
    public function login()
    {
        return view('fornt.login'); // Ensure this view path is correct
    }

    // Process the login form submission
    public function login_post(Request $request)
    {


        // Attempt to log the customer in
        if (Auth::guard('custmer')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            // Authentication passed...
            return redirect()->route('index'); // Change 'index' to your intended route
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    // Display the registration form
    public function register()
    {
        return view('fornt.register'); // Ensure this view path is correct
    }

    public function addJob()
    {
        return view('fornt.add_job',$this->data); // Ensure this view path is correct
    }

    public function storeJob(Request $request)
    {
        $product = Product::create([
            //'name' => $request->name,
            'location' => $request->location,
            'type' => $request->type,
            'price_from' => $request->price_from,
            'price_to' => $request->price_to,
            'category_id' => $request->category,
            'user_id' => Auth::guard('custmer')->user()->id,
        ]);

        if ($request->image) {

            if ($product->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/product_images/' . $product->image);

            }//end of if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();

        }//end of if

        $product->update($request_data);

          $product->name = $request->name;
          $product->description = $request->description;

            $product->save();

            return redirect()->route('index');
    }
    public function jobAccept()
    {
        $this->data['jobs'] = JobAccept::where('company_id',Auth::guard('custmer')->user()->id)->get();

        return view('fornt.accept_job',$this->data); // Ensure this view path is correct
    }
    public function jobAcceptPost(Request $request,$id)
    {
        $Product = Product::where('id',$id)->first();
         JobAccept::create([
            'user_name' => Auth::guard('custmer')->user()->name,
            'phone' => $request->phone,
            'email'=> Auth::guard('custmer')->user()->email,
            'job_name'=> $Product->name,
            'experience'=> $request->experience,
            'notice_period'=> $request->notice_period,
            'user_id'=> Auth::guard('custmer')->user()->id,
            'product_id'=> $id,
            'company_id'=>$Product->user_id
        ]);
        return redirect()->route('index');
    }


    // Process the registration form submission
    public function register_post(Request $request)
    {
        // Validate the request


        // Create the customer
        Custmer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);

        return redirect()->route('login_custmer');
    }

    public function logout(Request $request)
    {
        Auth::guard('custmer')->logout();

        // Invalidate the session and regenerate CSRF token to prevent CSRF attacks
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login_custmer');    }

}
