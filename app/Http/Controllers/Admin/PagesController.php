<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('admin_layout.dashboard.index');
    }

    public function allPages(Request $request)
    {
        $pages = Page::paginate(20);
        return view("admin.page.index",compact("pages"));
    }

    public function modifyPage(String $slug = null)
    {
        if($slug == null) return view("admin.page.modify");

        return view("admin.page.modify");
    }
}
