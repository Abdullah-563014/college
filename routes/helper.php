<?php

/*
|--------------------------------------------------------------------------
| Helpers functions
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */



if (!function_exists('siteUrl')) {
    function siteUrl($path = "")
    {
        return "http://127.0.0.1:8000" . $path;
    }
}
if (!function_exists('dbHost')) {
    function dbHost()
    {
        return "localhost";
    }
}
if (!function_exists('dbPort')) {
    function dbPort()
    {
        return 8200;
        // return "dbPort()";
        // return "localhost";
    }
}

if (!function_exists('Elastic_Cloud_DB')) {
    function Elastic_Cloud_DB()
    {
        return env('Elastic_Cloud_DB');
    }
}

if (!function_exists('pp')) {
    function pp($arr = [])
    {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        exit();
    }
}

if (!function_exists('tablePrefix')) {
    function tablePrefix()
    {
        return null;
    }
}

if (!function_exists('siteName')) {
    function siteName()
    {
        return 'CollegeApp';
    }
}

if (!function_exists('siteTitle')) {
    function siteTitle()
    {
        return siteName();
    }
}


if (!function_exists('siteTagline')) {
    function siteTagline()
    {
        return siteName() . ' ';
    }
}




if (!function_exists('siteKeywords')) {
    function siteKeywords()
    {
        return '';
    }
}


if (!function_exists('siteLogo')) {
    function siteLogo()
    {
        return siteUrl() . '/images/logo.png';
    }
}

if (!function_exists('imageType')) {
    function imageType()
    {
        return '';
    }
}

if (!function_exists('siteFavicon')) {
    function siteFavicon()
    {
        return siteUrl() . '/images/logo.png';
    }
}

if (!function_exists('ogdescription')) {
    function ogdescription()
    {
        return '';
    }
}


if (!function_exists('userIp')) {
    function userIp()
    {
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
    }
}



if (!function_exists('randomString')) {
    function randomString($length = 4)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('randomCharacter')) {
    function randomCharacter($length = 4)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('randomNumber')) {
    function randomNumber($length = 4)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomNumber = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumber .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomNumber;
    }
}


if (!function_exists('getIp')) {
    function getIp()
    {
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
    }
}



if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        if ($date == 'N/A') {
            return 'N/A';
        } else {
            $date = date('m/d/y', strtotime($date));
            // if (strpos($date, '-') !== false) {
            //     $dateEx = explode('-',$date);
            //     $date = $dateEx[1].'/'.$dateEx[2].'/'.substr($dateEx[0], -2);
            // }
            return $date;
        }
    }
}


if (!function_exists('makeError')) {
    function makeError($msg)
    {
        $res = [];
        $res['status'] = 'error';
        $res['message'] = $msg;
        header('Content-type: application/json');
        echo json_encode($res);
        die();
    }
}


if (!function_exists('getDomain')) {
    function getDomain($url = null)
    {
        $url4 = mb_substr($url, 0, 4);
        if ($url4 != 'http') {
            $url = 'http://' . $url;
        }
        $res = '';
        $parse = parse_url($url);
        $res = $parse['host'];

        return $res;
    }
}
if (!function_exists('formatDateTime')) {
    function formatDateTime($dataTime)
    {
        if (strpos($dataTime, 'T') !== false) {
        } else {
            $dataTime = strval($dataTime);
            $dataTime = (int)($dataTime) / 1000;
            $dataTime = date("Y-m-d\TH:i:s.000\Z", ($dataTime));
        }
        return date('Y-m-d H:i:s', strtotime($dataTime));
    }
}
if (!function_exists('timeZones')) {
    function timeZones()
    {
        $timeZones = [];
        $timeZones['GMT'] = ['id' => 'GMT', 'name' => 'Greenwich Mean Time', 'gmt' => '+0'];
        $timeZones['UTC'] = ['id' => 'UTC', 'name' => 'Universal Coordinated Time', 'gmt' => '+0'];
        $timeZones['ECT'] = ['id' => 'ECT', 'name' => 'European Central Time', 'gmt' => '+1'];
        $timeZones['EET'] = ['id' => 'EET', 'name' => 'Eastern European Time', 'gmt' => '+2'];
        $timeZones['ART'] = ['id' => 'ART', 'name' => '(Arabic) Egypt Standard Time', 'gmt' => '+2'];
        $timeZones['EAT'] = ['id' => 'EAT', 'name' => 'Eastern African Time', 'gmt' => '+3'];
        $timeZones['MET'] = ['id' => 'MET', 'name' => 'Middle East Time', 'gmt' => '+3:30'];
        $timeZones['NET'] = ['id' => 'NET', 'name' => 'Near East Time', 'gmt' => '+4'];
        $timeZones['PLT'] = ['id' => 'PLT', 'name' => 'Pakistan Lahore Time', 'gmt' => '+5'];
        $timeZones['IST'] = ['id' => 'IST', 'name' => 'India Standard Time', 'gmt' => '+5:30'];
        $timeZones['BST'] = ['id' => 'BST', 'name' => 'Bangladesh Standard Time', 'gmt' => '+6'];
        $timeZones['VST'] = ['id' => 'VST', 'name' => 'Vietnam Standard Time', 'gmt' => '+7'];
        $timeZones['CTT'] = ['id' => 'CTT', 'name' => 'China Taiwan Time', 'gmt' => '+8'];
        $timeZones['JST'] = ['id' => 'JST', 'name' => 'Japan Standard Time', 'gmt' => '+9'];
        $timeZones['ACT'] = ['id' => 'ACT', 'name' => 'Australia Central Time', 'gmt' => '+9:30'];
        $timeZones['AET'] = ['id' => 'AET', 'name' => 'Australia Eastern Time', 'gmt' => '+10'];
        $timeZones['SST'] = ['id' => 'SST', 'name' => 'Solomon Standard Time', 'gmt' => '+11'];
        $timeZones['NST'] = ['id' => 'NST', 'name' => 'New Zealand Standard Time', 'gmt' => '+12'];
        $timeZones['MIT'] = ['id' => 'MIT', 'name' => 'Midway Islands Time', 'gmt' => '-11'];
        $timeZones['HST'] = ['id' => 'HST', 'name' => 'Hawaii Standard Time', 'gmt' => '-10'];
        $timeZones['AST'] = ['id' => 'AST', 'name' => 'Alaska Standard Time', 'gmt' => '-9'];
        $timeZones['PST'] = ['id' => 'PST', 'name' => 'Pacific Standard Time', 'gmt' => '-8'];
        $timeZones['PNT'] = ['id' => 'PNT', 'name' => 'Phoenix Standard Time', 'gmt' => '-7'];
        $timeZones['MST'] = ['id' => 'MST', 'name' => 'Mountain Standard Time', 'gmt' => '-7'];
        $timeZones['CST'] = ['id' => 'CST', 'name' => 'Central Standard Time', 'gmt' => '-6'];
        $timeZones['EST'] = ['id' => 'EST', 'name' => 'Eastern Standard Time', 'gmt' => '-5'];
        $timeZones['IET'] = ['id' => 'IET', 'name' => 'Indiana Eastern Standard Time', 'gmt' => '-5'];
        $timeZones['PRT'] = ['id' => 'PRT', 'name' => 'Puerto Rico and US Virgin Islands Time', 'gmt' => '-4'];
        $timeZones['CNT'] = ['id' => 'CNT', 'name' => 'Canada Newfoundland Time', 'gmt' => '-3:30'];
        $timeZones['AGT'] = ['id' => 'AGT', 'name' => 'Argentina Standard Time', 'gmt' => '-3'];
        $timeZones['BET'] = ['id' => 'BET', 'name' => 'Brazil Eastern Time', 'gmt' => '-3'];
        $timeZones['CAT'] = ['id' => 'CAT', 'name' => 'Central African Time', 'gmt' => '-1'];
        return $timeZones;
    }
}

if (!function_exists('convertToGMT')) {
    function convertToGMT($startTime, $timeZone)
    {
        $resTime = '';
        $timeZones = timeZones();
        $timeZoneData = $timeZones[$timeZone]['gmt'];
        if ($timeZoneData == '+0') {
            $resTime = $startTime;
        } else {
            $plusMinus = '+';
            $minutes = 0;
            if (strpos($timeZoneData, '+') !== false) {
                $plusMinus = '-';
            }
            $timeZoneData = str_replace('+', '', $timeZoneData);
            $timeZoneData = str_replace('-', '', $timeZoneData);
            $timeZoneData = trim($timeZoneData);
            if (strpos($timeZoneData, ':') !== false) {
                $timeZoneDataEx = explode(':', $timeZoneData);
                $minutes = ((int)$timeZoneDataEx[0] * 60) + (int)$timeZoneDataEx[1];
            } else {
                $minutes = (int)$timeZoneData * 60;
            }
            $minutes = strval($minutes);

            $resTime = date("Y-m-d H:i:s", strtotime($plusMinus . $minutes . ' minutes', strtotime($startTime)));
        }
        return $resTime;
    }
}

if (!function_exists('convertToNative')) {
    function convertToNative($startTime, $timeZone)
    {
        $resTime = '';
        $timeZones = timeZones();
        $timeZoneData = $timeZones[$timeZone]['gmt'];
        if ($timeZoneData == '+0') {
            $resTime = $startTime;
        } else {
            $plusMinus = '+';
            $minutes = 0;
            if (strpos($timeZoneData, '-') !== false) {
                $plusMinus = '-';
            }
            $timeZoneData = str_replace('+', '', $timeZoneData);
            $timeZoneData = str_replace('-', '', $timeZoneData);
            $timeZoneData = trim($timeZoneData);
            if (strpos($timeZoneData, ':') !== false) {
                $timeZoneDataEx = explode(':', $timeZoneData);
                $minutes = ((int)$timeZoneDataEx[0] * 60) + (int)$timeZoneDataEx[1];
            } else {
                $minutes = (int)$timeZoneData * 60;
            }
            $minutes = strval($minutes);

            $resTime = date("Y-m-d H:i:s", strtotime($plusMinus . $minutes . ' minutes', strtotime($startTime)));
        }
        return $resTime;
    }
}

if (!function_exists('currentTime')) {
    function currentTime()
    {
        return time();
    }
}


if (!function_exists('makeIdFromString')) {
    function makeIdFromString($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('UTF-8', 'utf-8//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}

