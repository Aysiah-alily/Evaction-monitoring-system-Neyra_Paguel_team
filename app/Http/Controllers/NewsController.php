<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Example static data (replace with DB or API later)
        $news = [
            [
                'title' => 'Flood Warning Issued',
                'description' => 'Flood warnings for western coastal regions.',
                'datetime' => '4/6/2025, 12:37:19 PM',
            ],
            [
                'title' => 'Emergency Services in Chennai',
                'description' => 'NDRF teams deployed.',
                'datetime' => '4/6/2025, 9:37:19 AM',
            ],
        ];

        return view('UserPages.news', compact('news'));
    }
}
