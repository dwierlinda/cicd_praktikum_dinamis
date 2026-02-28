<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function showUser()
    {
        $title = "Menu";
        $menus = Menu::latest()->get();
        return view('pages.menu', compact('menus', 'title'));
    }


    public function showDetail($id)
    {
        $title = "Detail Menu";
        $menu = Menu::findOrFail($id);

        $menu->increment('dibaca');
        return view('pages.menu-detail', compact('menu', 'title'));
    }
}
