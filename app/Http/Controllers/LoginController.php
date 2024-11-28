<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
            // 'captcha' => 'required|captcha'
        ]);

        $email = $request['email'];
        $password = $request['password'];
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended('/mbdashboard')->with('success','Login Berhasil!');
        }

        return back()->with('error', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // public function reloadCaptcha()
    // {
    //     return response()->json(['captcha'=> captcha_img()]);
    // }

    public function changePassword(Request $request)
    {       
        $user = Auth::user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'password_lama' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->password_lama, $userPassword)) {
          return response()->json([
                    'status' => false,
                    'pesan' => "Password sebelumnya salah!"
                ]);
        }

        // Update password menggunakan static method
        $updated = User::where('id', $user->id)
            ->update(['password' => Hash::make($request->password)]);

        if($updated){
          return response()->json([
              'status' => true,
              'pesan' => "Password berhasil diubah"
            ]);
        }else{
            return response()->json([
                'status' => false,
                'pesan' => "Status gagal diubah"
            ]);
        }
    }
}
