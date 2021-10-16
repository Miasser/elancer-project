<?php

namespace App\Http\Controllers;
use App\Models\links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\loginController;
class linksController extends Controller
{

    public function links()
    {
        return view('links');
    }

    public function generateNewLink(Request $request)
    {
        if ($request['long_link']) {
            $request['new_link'] = Str::random(10);
            $old = $request['long_link'];
            $new = $request['new_link'];
            links::create($request->all());
            return view('links', compact('new', 'old'));
        }}

    public function showUrl($showUrl)
    {
        $shorturl = links:: where('new_link', '=', $showUrl);
        if ($shorturl->exists()) {
            return redirect($shorturl->value('long_link'));
        } else {
            return redirect('links');


            /* if (Session::has('userId')) {
                 Session::pull('userId');
                 return redirect('auth.login');

            */
            return 'not found';
            // return view('login');

                // return redirect($shorturl->value('user_name'));
            }



    }}
