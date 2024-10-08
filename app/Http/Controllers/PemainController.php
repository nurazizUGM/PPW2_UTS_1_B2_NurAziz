<?php

namespace App\Http\Controllers;

use App\Models\Pemain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftar_pemain = Pemain::all();
        return view('pemain.index', compact('daftar_pemain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posisi = Pemain::$enumPosisi;
        return view('pemain.create', compact('posisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nama_pemain' => 'string|required',
                'no_punggung' => 'int|required',
                'posisi' => 'string|required'
            ]);
            Pemain::create($data);
            return redirect()->route('pemain.index')->with('success', 'Berhasil menambah pemain');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemain = Pemain::find($id);
        return view('pemain.show', compact('pemain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemain = Pemain::find($id);
        $posisi = Pemain::$enumPosisi;
        return view('pemain.edit', compact('pemain', 'posisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemain = Pemain::find($id);
        try {
            $data = $request->validate([
                'nama_pemain' => 'string|required',
                'no_punggung' => 'int|required',
                'posisi' => 'string|required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        $pemain->update($data);
        return redirect()->route('pemain.index')->with('success', 'Pemain Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Pemain::destroy($id);
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('pemain.index')->with('success', 'Pemain Berhasil dihapus');
    }
}
