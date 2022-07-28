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
        $result["msg"] = "user info founded successfully";
        $result["data"] = $userInfo;

        return $result;
    }

    public function resultListPage()
    {
        $data = array();
        $data['title'] = 'Result List - ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());
        return view('result', $data);
    }


    public function getResultList()
    {
        $result = [];
        $result["status"] = "failed";
        $result["msg"] = "failed to load result list.";
        $result["data"] = [];

        $resultList = DB::table("results")->orderBy("id", "DESC")->get();
        $result["status"] = "success";
        $result["msg"] = "result list founded successfully";
        $result["data"] = $resultList;

        return $result;
    }


    public function profilePage()
    {
        $data = array();
        $data['title'] = 'Profile - ' . siteTitle();
        $data['description'] = $data['ogdescription'] = siteTagline();
        $data['keywords'] = siteKeywords();
        $data['image'] = siteLogo();
        $data['imageType'] = 'image/png';
        $data['url'] = siteUrl();
        $data['updated_time'] = strtotime('- 1 day', time());
        return view('profile', $data);
    }

    public function updateUserProfilePictureInfo(Request $request)
    {
        $result = [];
        $result["status"] = "failed";
        $result["msg"] = "Failed to update info";
        $result["profile_picture"] = "";

        $userId = Auth::user()->id;
        if ($request->has("user_id") && !empty($request->get("user_id"))) {
            $userId = $request->get("user_id");
        }

        try {
            $userDetails = DB::table("users")->where([["id", "=", $userId]])->first();
            if (!empty($userDetails)) {
                $user = User::find($userId);
                $pictureLink = "";

                if ($request->file("profile_picture") && $request->hasfile('profile_picture')) {
                    $profileFileExtension = $request->file("profile_picture")->getClientOriginalExtension();
                    $makeFileName = randomString(15);
                    $makeProfilePicFileNameWithExtension = $makeFileName . '.' . $profileFileExtension;
                    $savePath = public_path() . "/uploads/images/profile/";
                    $request->file("profile_picture")->move($savePath, $makeProfilePicFileNameWithExtension);

                    $user->profile_picture = $makeProfilePicFileNameWithExtension;

                    $pictureLink = siteUrl() . "/uploads/images/profile/" . $makeProfilePicFileNameWithExtension;
                }
                $user->save();

                $result["status"] = "success";
                $result["msg"] = "Info updated successfully";
                $result["profile_picture"] = $pictureLink;
            }
        } catch (Exception $e) {
        }
        return $result;
    }

    public function updateUserProfileInfo(Request $request)
    {
        $result = [];
        $result["status"] = "failed";
        $result["msg"] = "Failed to update info";
        try {
            $allInputtedData = $request->all();
            $userDetails = Auth::user();
            $user = User::find($userDetails->id);

            $user->name = $allInputtedData["name"];
            $user->email = $allInputtedData["email"];
            if (!empty($allInputtedData["newPassword"])) {
                if (Hash::check($allInputtedData["oldPassword"], Auth::user()->password)) {
                    $user->password = Hash::make($allInputtedData["newPassword"]);
                } else {
                    $result["msg"] = "Your old password is not correct.";
                    return $result;
                }
            }
            $user->save();

            $result["status"] = "success";
            $result["msg"] = "Info updated successfully";
        } catch (Exception $e) {
        }
        return $result;
    }


    


    
}
