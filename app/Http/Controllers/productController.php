<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

       $search = $request->input('search');

        // Query data produk
        $products = produk::when($search, function ($query, $search) {
            return $query->where('nama_produk', 'LIKE', "%{$search}%")
                         ->orWhere('kategori_produk', 'LIKE', "%{$search}%");
        })
        ->latest()
        ->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
             'kategori_produk' => 'required',
              'harga' => 'required|integer',
               'stok' => 'required|integer',
                'deskripsi_singkat' => 'required',
             'gambar'=> 'nullable|image|mimes: jpg,jpeg,png|max:2048',




        ]);
        $imagePath = null;
        if($request->hasFile('gambar')){
                $imagePath = $request->file('gambar')->store('products', 'public');
            }

            produk::create([
                'nama_produk'=>$request->nama_produk,
                'kategori_produk'=>$request->kategori_produk,
                'harga'=>$request->harga,
                'stok'=>$request->stok,
                'deskripsi_singkat'=>$request->deskripsi_singkat,
                'gambar'=>$imagePath



            ]);

                return redirect()->route('products.index')->with('success','produk sukses terupload');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {$product = produk::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = produk::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $product = produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'kategori_produk' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi_singkat' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $product->gambar; // Sesuai kolom database 'gambar'

        if ($request->hasFile('gambar')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('gambar')->store('products', 'public');
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'kategori_produk' => $request->kategori_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           $product = produk::findOrFail($id);

        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

}
