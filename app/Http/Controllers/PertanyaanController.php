<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan/index', [
            'title' => "Pertanyaan",
            'pertanyaan'    => $pertanyaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan/create', [
            'title' => "Create Pertanyaan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.'            
        ];

        //rules validasi inputan user
        Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required'
        ], $messages)->validate();

        // jika lolos verifikasi insert ke database
        $pertanyaan = Pertanyaan::create([
            'judul'             => $request->judul,
            'isi_pertanyaan'    => $request->isi,
        ]);
        if($pertanyaan){
            return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil ditambahkan');
        }
        return redirect('/pertanyaan')->with('error', 'Pertanyaan gagal ditambahkan');
    }

}
