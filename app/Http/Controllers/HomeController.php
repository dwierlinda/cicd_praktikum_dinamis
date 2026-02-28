<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Home";
        $slug = "home";
        $konten = "Selamat Datang di FitLife!";

        $featuredMenus = Menu::latest()->take(6)->get();
        $latestArticles = Artikel::latest()->take(4)->get();
        $heroHighlight = $latestArticles->first();

        return view('pages.home', compact(
            'title',
            'slug',
            'konten',
            'featuredMenus',
            'latestArticles',
            'heroHighlight'
        ));
    }

    public function kalkulator(Request $request)
    {
        $title = "Kalkulator";
        $slug  = "kalkulator";
        $konten = "Kalkulator Ideal";

        if ($request->isMethod('post')) {
            $request->validate([
                'gender' => 'required|string',
                'tinggi' => 'required|numeric|min:1',
                'berat'  => 'required|numeric|min:1',
            ]);

            $gender = $request->gender;
            $tinggi = (float) $request->tinggi;
            $berat  = (float) $request->berat;

            $bmi = $berat / pow(($tinggi / 100), 2);
            $bmiFormatted = number_format($bmi, 1);

            if ($bmi < 18.5) {
                $label = "Kurus";
                $kategori = "Berat Badan Rendah";
                $color = "#00B5D8";        // biru
                $bg = "#00B5D815";         // biru soft
            } elseif ($bmi <= 24.9) {
                $label = "Normal";
                $kategori = "Normal";
                $color = "#26C281";        // hijau
                $bg = "#26C28115";         // hijau soft
            } elseif ($bmi <= 29.9) {
                $label = "Berlebih";
                $kategori = "Berat Badan Berlebih";
                $color = "#F4C542";        // kuning
                $bg = "#F4C54215";         // kuning soft
            } else {
                $label = "Obesitas";
                $kategori = "Obesitas";
                $color = "#E74C3C";        // merah
                $bg = "#E74C3C15";         // merah soft
            }

            // Hasil HTML lengkap dengan card background
            $hasil = '
<div class="p-4 rounded mt-4" style="background:' . $bg . '; border-radius:16px;">
    <div class="text-center">

        <div style="font-size:22px;font-weight:700;color:' . $color . ';">
            BMI Anda: ' . $bmiFormatted . '
        </div>

        <div class="mt-2">
            <span style="
                display:inline-block;
                padding:6px 16px;
                border-radius:40px;
                background:' . $color . ';
                color:white;
                font-weight:700;
            ">
                ' . $label . '
            </span>
        </div>

        <div class="mt-3" style="font-size:16px;color:#333;">
            <div>Gender: ' . e($gender) . '</div>
            <div>Tinggi: ' . e($tinggi) . ' cm</div>
            <div>Berat: ' . e($berat) . ' kg</div>
        </div>

        <div class="mt-3" style="font-size:20px;color:#444;">
            <small>Kategori detail: ' . $kategori . '</small>
        </div>

    </div>
</div>';

            return redirect()->back()->with('hasil', $hasil);
        }


        return view('pages.kalkulator', compact('title', 'slug', 'konten'));
    }

    public function HalamanProfile()
    {
        return view('profile');
    }
}
