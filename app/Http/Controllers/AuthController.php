<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthMail;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index() {
        return view('auth/login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $infoLogin['email'])->first();
    

        if ($user && Hash::check($infoLogin['password'], $user->password)) {
            Auth::login($user);
            if (Auth::user()->email_verified_at != null) {
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin')->with('success', 'Hello Admin, Login by Admin');
                } else if (Auth::user()->role === 'user') {
                    return redirect()->route('home')->with('success', 'Hello User, Login by User');
                }
            } else {
                Auth::logout();
                return redirect()->route('auth')->withErrors('User not found!');
            }
            return "Login successful !!";

        } else {
            return redirect()->route('auth')->withErrors('Email or password not correct !!');
        }
    }
    
    public function create() {
        return view('auth/register');
    }
    
    public function register(Request $request) {
        $str = Str::random(100);
        
        $request->validate([
            'fullname' => 'required | min:5',
            'email' => 'required | unique:users|email',
            'password' => 'required | min:6',
            'file' => 'file | mimes:jpg,png,pdf,doc,docx'
        ], [
            'fullname.required' => 'Full name is required',
            'fullname.min' => 'Full Name cannot be less than 5 characters',
            'email.required' => 'Email is required',
            'email.unique' => 'Email cannot be duplicated',
            'password.required' => 'Password is required',
            'file.file' => 'File must be right format',
        ]);

        $img_file = $request->file('image');
        $img_name = time().'.'.$img_file->getClientOriginalExtension();
        $img_file->move('picture/accounts', $img_name);

        $infoRegister = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $img_name,
            'verify_key' => $str
        ];

        User::create($infoRegister);

        $details = [
            'fullname' => $infoRegister['fullname'],
            'role'=> 'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'Admin Management Project Laravel',
            'url' => 'http://' . request()->getHttpHost() . '/' . 'verify/' . $infoRegister['verify_key'],
        ];

        Mail::to($infoRegister['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success', 'A verification link has been sent to your email. Check email for confirmation!');
    }

    public function verify($verify_key) {
        $keyCheck = User::select('verify_key')->where('verify_key', $verify_key)->exists();
        
        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        
            return redirect()->route('auth')->with('success', 'Verified successfully. Your account has been activated!');
        } else {
            return redirect()->route('auth')->withErrors('Invalid key. Make sure you are registered!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
    
}
