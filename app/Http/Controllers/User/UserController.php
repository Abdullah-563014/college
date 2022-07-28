<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FeedbackComment;
use App\Models\ProductModel;
use App\Models\ProductFeedback;
use App\Models\ProductReward;
use App\Models\RewardProof;
use App\Models\TestingProduct;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home()
    {
        $data = array();
        $data['title'] = 'Home - ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());
        return view('dashboard', $data);
    }

    public function getUserInfo()
    {
        $result = [];
        $result["status"] = "failed";
        $result["msg"] = "failed to load user info";
        $result["data"] = [];

        $userInfo = DB::table("users")->where([["id", "=", Auth::user()->id]])->orderBy("id", "DESC")->first();
        $result["status"] = "success";
        $result["msg"] = "product founded successfully";
        $result["data"] = $userInfo;

        return $result;
    }

    


    
}
