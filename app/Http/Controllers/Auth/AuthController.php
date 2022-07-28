<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    // ================================================login functionality starting from here=====================
    // ================================================login functionality starting from here=====================
    // ================================================login functionality starting from here=====================
    public function login()
    {
        $data = array();
        $data['title'] = 'Login - ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login', $data);
    }

    public function loginValidation(Request $request)
    {
        $dataIn = $request->all();
        $res = [];
        $res["status"] = "error";
        $res["msg"] = "error";

        if (isset($dataIn["email"]) && !empty(isset($dataIn["email"])) && isset($dataIn["password"]) && !empty(isset($dataIn["password"]))) {
            $givenEmail = strtolower(trim($dataIn["email"]));
            $ifExist = DB::table("users")->where("email", $givenEmail)->first();
            if (isset($ifExist) && !empty(isset($ifExist))) {
                $remember = false;
                if (Auth::attempt(['email' => $dataIn["email"], 'password' => $dataIn["password"]], $dataIn["remember_password"])) {
                    $res["status"] = "success";
                    $res["msg"] = "Login successfully";
                } else {
                    $res["msg"] = "Email or password is incorrect.";
                }
            } else {
                $res["msg"] = "No account exist with this email address";
            }
        } else {
            $res["msg"] = "Please input email and password properly.";
        }
        return $res;
    }



    // ================================================registration functionality starting from here=====================
    // ================================================registration functionality starting from here=====================
    // ================================================registration functionality starting from here=====================

    public function registration()
    {
        $data = array();
        $data['title'] = 'Signup - ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());

        return view('auth.registration', $data);
    }

    public function registrationValidation(Request $request)
    {
        $dataIn = $request->all();
        $res = [];
        $res["status"] = "error";
        $res["msg"] = "error";

        if (isset($dataIn["name"]) && !empty(isset($dataIn["name"])) && isset($dataIn["email"]) && !empty(isset($dataIn["email"])) && isset($dataIn["password"]) && !empty(isset($dataIn["password"]))) {
            $givenEmail = strtolower(trim($dataIn["email"]));
            $ifExist = DB::table("users")->where("email", $givenEmail)->first();
            if (isset($ifExist) && !empty(isset($ifExist))) {
                $res["msg"] = "This email is already used to create another account.";
            } else {
                $userTable = new \App\Models\User;
                $userTable->name = $dataIn["name"];
                $userTable->email = $dataIn["email"];
                $userTable->password = Hash::make($dataIn["password"]);
                $userTable->save();

                if (Auth::attempt(['email' => $dataIn["email"], 'password' => $dataIn["password"]], false)) {
                    $res["status"] = "success";
                    $res["msg"] = "Account created successfully.";
                } else {
                    $res["msg"] = "Failed to create account.";
                }
            }
        } else {
            $res["status"] = "error";
            $res["msg"] = "Please input name, email, password fields properly.";
        }
        return $res;
    }

    private function makeRandomString($length = 4)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    // ================================================logout functionality starting from here=====================
    public function signOut()
    {
        Auth::logout();
        return Redirect('/login');
    }




    // ================================================reset password functionality starting from here=====================
    // ================================================reset password functionality starting from here=====================
    // ================================================reset password functionality starting from here=====================

    public function showForgetPasswordForm()
    {
        $data = array();
        $data['title'] = 'Reset Password - ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());

        return view('auth.forgot', $data);
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $dataIn = $request->all();

        $res = [];
        $res["status"] = "error";
        $res["msg"] = "Failed to send password reset mail";

        if (!empty($dataIn["email"])) {
            $token = $this->makeRandomString(10);

            DB::table('users')->where([["email", "=", $dataIn["email"]]])->update(["remember_token" => $token]);
            $userInfo = DB::table('users')->where([["email", "=", $dataIn["email"]]])->first();
            if (!empty($userInfo)) {
                $to_name = $userInfo->name;
                $to_email = $userInfo->email;
                $data = array('name' => $userInfo->name, 'token' => $userInfo->remember_token, 'site_name' => siteName());
                Mail::send("auth.password_reset_template", $data, function ($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject('Reset Your Password - ' . siteName());
                    $message->from(env("MAIL_USERNAME", "team@" . siteName() . ".com"), siteTitle());
                });

                $res["status"] = "success";
                $res["msg"] = "Password reset mail sent successfully";
            }
        }

        return $res;
    }

    public function showPasswordResetNewPasswordPage($token)
    {
        $data = array();
        $data['title'] = 'Reset Password - ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());
        $data['token'] = $token;

        return view('auth.password_reset', $data);
    }

    public function resetUserPassword(Request $request)
    {
        $dataIn = $request->all();

        $res = [];
        $res["status"] = "error";
        $res["msg"] = "Failed to reset password";

        if (!empty($dataIn["password"]) && !empty($dataIn["reset_token"])) {
            $status = DB::table('users')->where([["remember_token", "=", $dataIn["reset_token"]]])->update(["password" => Hash::make($dataIn['password'])]);

            if ($status) {
                $res["status"] = "success";
                $res["msg"] = "Password reset successfully";
            }
        }

        return $res;
    }

    public function showPasswordResetCongratulationPage()
    {
        $data = array();
        $data['title'] = 'Password Reset Successful- ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());

        return view('auth.password_reset_congra', $data);
    }
}
