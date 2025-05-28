<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SeleksiController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return redirect()->route('admin.panel'); // Changed from 'dashboard' to 'admin.panel'
        }
        
        return view('welcome');
    }

    public function cariHasil(Request $request)
    {
        $nama = $request->input('nama_lengkap');
        $peserta = Peserta::where('nama_lengkap', $nama)->first();
        
        \Log::info('Searching for name:', ['nama' => $nama]);
        
        $peserta = Peserta::where('nama_lengkap', $nama)->first();
        
        \Log::info('Query result:', ['peserta' => $peserta]);

        if ($peserta) {
            if ($peserta->isAdmin()) {
                return redirect()->route('admin.panel'); 
            }
            return redirect()->route('hasil.show', ['id' => $peserta->id]);
        }

        return back()->with('error', 'Data tidak ditemukan');
    }

    public function showHasil($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('hasil', compact('peserta'));
    }

    public function downloadHasil($id)
    {
        $peserta = Peserta::findOrFail($id);
        
        $pdf = Pdf::loadView('pdf.hasil', compact('peserta'));
        
        return $pdf->download('Hasil_Seleksi_' . str_replace(' ', '_', $peserta->nama_lengkap) . '.pdf');
    }

    public function leaderboard()
    {
        \Log::info('Fetching leaderboard data');
    
        $peserta = Peserta::leaderboard()->get();
        \Log::info('Leaderboard data:', ['count' => $peserta->count(), 'data' => $peserta->toArray()]);
    
        return view('leaderboard', compact('peserta'));
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function dokumentasi()
    {
        return view('dokumentasi');
    }

    public function adminPanel()
    {
    $peserta = Peserta::all();
    return view('dashboard', compact('peserta'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'wawancara' => 'required|numeric',
            'tes_tulis' => 'required|numeric',
            'cv' => 'required|numeric',
            'visimisi_proker' => 'required|numeric',
            'status_kelulusan' => 'required'
        ]);

        $validated['total_score'] = $validated['wawancara'] + $validated['tes_tulis'] + 
                                   $validated['cv'] + $validated['visimisi_proker'];
        
        Peserta::create($validated);
        return redirect()->route('admin.panel')->with('success', 'Peserta berhasil ditambahkan'); // Changed from 'dashboard'
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'wawancara' => 'required|numeric',
            'tes_tulis' => 'required|numeric',
            'cv' => 'required|numeric',
            'visimisi_proker' => 'required|numeric',
            'status_kelulusan' => 'required'
        ]);

        $validated['total_score'] = $validated['wawancara'] + $validated['tes_tulis'] + 
                                   $validated['cv'] + $validated['visimisi_proker'];
        
        $peserta->update($validated);
        return redirect()->route('admin.panel')->with('success', 'Data peserta berhasil diupdate'); // Changed from 'dashboard'
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();
        return response()->json(['message' => 'Peserta berhasil dihapus']);
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return response()->json($peserta);
    }
}