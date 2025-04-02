<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrganisasiOtonom;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrtomController extends Controller
{
    public function ortom($slug)
    {

        $ortom = OrganisasiOtonom::where('slug', $slug)->firstOrFail();
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => $ortom->name . " | " . $setting_web->name,
            'breadcrumbs' => [
                [
                    'name' => 'Home',
                    'link' => route('home'),
                ],
                [
                    'name' => 'Ortom',
                    'link' => null,
                ],
                [
                    'name' => $ortom->name,
                    'link' => route('ortom.detail', $ortom->slug),
                ],
            ],
            'meta_description' => Str::limit(strip_tags($ortom->content), 300),
            'meta_keywords' => $ortom->name . ', Muhammadiyah, Bukittinggi, Aisyiyah, Ortom',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'ortom' => $ortom
        ];

        return view('front.pages.ortom.index', $data);
    }
}
