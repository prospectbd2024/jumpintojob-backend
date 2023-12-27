<?php

use App\Models\BusinessSetting;
use App\Utility\SendSMSUtility;


//sensSMS function for OTP
if (!function_exists('sendSMS')) {
    function sendSMS($to, $from, $text, $template_id): bool|string
    {
        return SendSMSUtility::sendSMS($to, $from, $text, $template_id);
    }
}

if (!function_exists('getAppName')) {
    function getAppName(): string
    {
        return get_setting('site_name', config('app.name'));
    }
}
function translate($key, $lang = null, $addslashes = false)
{
    return $key;
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null, $lang = false)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::get();
        });

        if (!$lang) {
            $setting = $settings->where('type', $key)->first();
        } else {
            $setting = $settings->where('type', $key)->where('lang', $lang)->first();
            $setting = !$setting ? $settings->where('type', $key)->first() : $setting;
        }
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return $asset->external_link == null ? my_asset($asset->file_name) : $asset->external_link;
        }
        return static_asset('assets/img/logo.png');
    }
}


if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null): string
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}


if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $secure = null): string
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            return app('url')->asset('public/' . $path, $secure);
        }
    }
}

// In a helpers.php file or a dedicated Helpers class

function errorResponse($errorCode, $message, $statusCode = 404): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'error' => [
            'code' => $errorCode,
            'message' => $message
        ]
    ], $statusCode);
}

function successResponse($result = true, $data = null, $statusCode = 200): \Illuminate\Http\JsonResponse
{
    $response = ['success' => true, 'result' => $result];

    if ($data !== null) {
        $response['data'] = $data;
    }

    return response()->json($response, $statusCode);
}

//function translate($key, $lang = null, $addslashes = false)
//{
//    if ($lang == null) {
//        $lang = App::getLocale();
//    }
//
//    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($key)));
//
//    $translations_en = Cache::rememberForever('translations-en', function () {
//        return Translation::where('lang', 'en')->pluck('lang_value', 'lang_key')->toArray();
//    });
//
//    if (!isset($translations_en[$lang_key])) {
//        $translation_def = new Translation;
//        $translation_def->lang = 'en';
//        $translation_def->lang_key = $lang_key;
//        $translation_def->lang_value = str_replace(array("\r", "\n", "\r\n"), "", $key);
//        $translation_def->save();
//        Cache::forget('translations-en');
//    }
//
//    // return user session lang
//    $translation_locale = Cache::rememberForever("translations-{$lang}", function () use ($lang) {
//        return Translation::where('lang', $lang)->pluck('lang_value', 'lang_key')->toArray();
//    });
//    if (isset($translation_locale[$lang_key])) {
//        return $addslashes ? addslashes(trim($translation_locale[$lang_key])) : trim($translation_locale[$lang_key]);
//    }
//
//    // return default lang if session lang not found
//    $translations_default = Cache::rememberForever('translations-' . env('DEFAULT_LANGUAGE', 'en'), function () {
//        return Translation::where('lang', env('DEFAULT_LANGUAGE', 'en'))->pluck('lang_value', 'lang_key')->toArray();
//    });
//    if (isset($translations_default[$lang_key])) {
//        return $addslashes ? addslashes(trim($translations_default[$lang_key])) : trim($translations_default[$lang_key]);
//    }
//
//    // fallback to en lang
//    if (!isset($translations_en[$lang_key])) {
//        return trim($key);
//    }
//    return $addslashes ? addslashes(trim($translations_en[$lang_key])) : trim($translations_en[$lang_key]);
//}


