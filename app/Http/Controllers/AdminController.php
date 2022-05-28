<?php

namespace App\Http\Controllers;

use App\Models\Handicraft;
use App\Models\ScrapCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'classes_count' => ScrapCategory::all()->count(),
            'crafts_count' => Handicraft::all()->count(),
        ]);
    }
}
