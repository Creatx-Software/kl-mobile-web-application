<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Models\Blog;
use App\Models\Client;
use App\Models\OfficeLocation;
use App\Models\Settings;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $eventTypes = EventType::where('status', true)->orderBy('order')->get();

        // Get latest 3 published blogs for home page
        $latestBlogs = Blog::with(['user', 'category'])
            ->published()
            ->where(function ($query) {
                $query->featured()
                    ->orWhere('is_featured', false);
            })
            ->latest('created_at')
            ->limit(3)
            ->get();

        // Get clients separated by odd and even order
        $oddClients = Client::oddOrder()->ordered()->get();
        $evenClients = Client::evenOrder()->ordered()->get();
        $officeLocations = OfficeLocation::active()->ordered()->select('name', 'icon', 'slug', 'address', 'phone', 'email', 'open_time')->get();

        $settings = Settings::first();
        $homeData = [
            'hero_video' => $settings?->hero_video,
            'hero_featured_image' => $settings?->hero_featured_image,
            'company_profile_pdf' => $settings?->company_profile_pdf,
        ];

           $testimonials = Testimonial::where('status', true)->orderBy('order')->get();

        return view('home.index', compact('eventTypes', 'latestBlogs', 'oddClients', 'evenClients', 'officeLocations','testimonials','settings'));
    }
}
