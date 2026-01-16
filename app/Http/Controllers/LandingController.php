<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function sejarah()
    {
        return view('landing.sejarah');
    }

    public function gembala()
    {
        return view('landing.gembala');
    }

    public function doa()
    {
        return view('landing.doa');
    }

    public function sekraman()
    {
        return view('landing.sekraman');
    }

    public function tulisan()
    {
        $agendas = [
            [
                'title' => 'Natalan dan Pesta Tahun Baru Bersama OMK Bintaran',
                'date'  => '1 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
        ];

        return view('landing.tulisan', compact('agendas'));
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function ssd()
    {
        return view('landing.ssd');
    }

    public function donasi()
    {
        return view('landing.donasi');
    }
}
