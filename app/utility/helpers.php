<?php
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

function setting($key){

    cache()->forget('setting');

    $setting = Cache::rememberForever('setting', function (){
        return Setting::first();
    });

    return $setting->{$key};
}