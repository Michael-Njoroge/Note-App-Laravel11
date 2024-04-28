<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->orderBy('created_at','desc')->paginate(10);

        // return UserResource::collection($users);


        return view('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['required','string'],
            'lastname' => ['required','string'],
            'username' => ['required','string'],
            'email' => ['required','email','unique:users,email'],
        ]);

        $rawPassword = Str::random(8);
        // $rawPassword = 'password@123';
        $hashedPassword = Hash::make($rawPassword);
        $validated['password'] = $hashedPassword;
        $validated['email_verified_at'] = now();

        $user = User::create($validated);
        
        Mail::to($user)->send(new UserCreated($user,$rawPassword));

        return to_route('user.index')->with('message','User created successfully');
    }

      /**
     * login user.
     */
    public function login()
    {
        return view('user.login');
    }

    public function auth(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        
        $user = User::where('email',$validated['email'])->first();
        // dd($user);
        $password = Hash::check($validated['password'],$user->getAuthpassword());

        // dd($user && $password);
        if($user && $password){
            $user->createToken('access_token')->plainTextToken;
            dd(auth()->user());
            return to_route('note.index');
        }
        
        return back()->with('error','Invalid credentials');



        
    }

    public function logout(Request $request){
        $user = auth()->user();
        dd($user);
         
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'firstname' => ['required','string'],
            'lastname' => ['required','string'],
            'username' => ['required','string'],
            'email' => ['required','email']
        ]);

        $user->update($validated);

        return to_route('user.show',$user)->with('message','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('user.index')->with('message','User deleted successfully');

    }
}
