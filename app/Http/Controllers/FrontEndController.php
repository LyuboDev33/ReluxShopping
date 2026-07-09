<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontEndController extends Controller
{
    /** Return the welcome view */
    public function welcome()
    {
        return view('Frontend.welcome');
    }

    /** Return the contact view */
    public function contact()
    {
        return view('Frontend.contact');
    }

    /** Return the about view */
    public function about()
    {
        return view('Frontend.about');
    }

    /** Return the conditions */
    public function conditions () {
        return view('Frontend.legal.conditions');
    }

    /** Return the privacy */
    public function privacy () {
        return view('Frontend.legal.privacy');
    }

    /** Return the view of a specific service
     *
     * @param string $service
     * @return View
     */
    public function serviceShow(string $service)
    {
        $view = 'Frontend.services.' . $service;

        if (! View::exists($view)) {
            return view('errors.NotFound');
        }

        return view($view);
    }
}
