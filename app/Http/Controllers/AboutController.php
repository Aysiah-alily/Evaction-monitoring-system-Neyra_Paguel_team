<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the About Us page.
     */
    public function index()
    {
        // You can add about page specific data here if needed
        $aboutData = [
            'mission' => 'To build a resilient community capable of withstanding natural and man-made disasters through proactive planning, education, and community engagement.',
            'vision' => 'A safe and disaster-resilient Camalaniugan.',
            'teamSize' => 25,
            'established' => '2010',
        ];

        return view('UserPages.about', compact('aboutData'));
    }
}