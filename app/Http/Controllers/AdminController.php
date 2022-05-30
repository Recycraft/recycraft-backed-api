<?php

namespace App\Http\Controllers;

use App\Models\Handicraft;
use App\Models\ScrapCategory;
use App\Models\User;
use App\Models\UserFeedback;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'classes_count' => ScrapCategory::all()->count(),
            'crafts_count' => Handicraft::all()->count(),
            'users_count' => User::all()->count(),
            'rating' => UserFeedback::all()->count() > 0 ? round(UserFeedback::all()->sum('rating') / UserFeedback::all()->count(), 1) : 0,
        ]);
    }

    public function setting() {
            return "Ini halaman setting nantinya";
    }
}
