<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting_web = SettingWebsite::first();
        $data = [
            'title' => "Kontak Kami | " . $setting_web->name,
            'breadcrumbs' => [
                [
                    'name' => 'Home',
                    'link' => route('home'),
                ],
                [
                    'name' => 'Kontak',
                    'link' => route('contact'),
                ],
            ],
            'meta_description' => "Kontak Kami pada alamat " . $setting_web->address . " dan nomor telepon " . $setting_web->phone . " atau email " . $setting_web->email,
            'meta_keywords' => 'Contact Us, Aisyiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,
        ];
        return view('front.pages.contact.index', $data);
    }
}
