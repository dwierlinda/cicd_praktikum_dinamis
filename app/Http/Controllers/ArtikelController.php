<?php

namespace App\Http\Controllers;

use App\Models\Kategori;;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $title = "Artikel";
        $slug  = "artikel";

        $selectedKategori = trim($request->query('kategori', ''));
        $q = trim($request->query('q', ''));

        $query = Artikel::query();

        if ($selectedKategori !== '') {
            $query->where('kategori', 'LIKE', '%' . $selectedKategori . '%');
        }

        if ($q !== '') {
            $query->where(function ($sub) use ($q) {
                $sub->where('judul', 'LIKE', "%{$q}%")
                    ->orWhere('isi', 'LIKE', "%{$q}%");
            });
        }

        if ($selectedKategori !== '') {
            $featured = null;
        } else {
            $featured = Artikel::where('is_featured', true)->latest()->first()
                ?? Artikel::latest()->first();
        }

        $artikels = $query->latest()->get();

        $kategoriList = Artikel::select('kategori')
            ->whereNotNull('kategori')
            ->distinct()
            ->pluck('kategori');

        return view('pages.artikel', compact(
            'title',
            'slug',
            'artikels',
            'featured',
            'kategoriList',
            'selectedKategori',
            'q'
        ));
    }

    public function show($slug)
    {
        $title = "Detail Artikel";
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        $artikel->increment('dibaca');

        $artikels = Artikel::latest()->take(4)->get();

        return view('pages.artikel-detail', compact('artikel', 'artikels', 'title'));
    }
}
