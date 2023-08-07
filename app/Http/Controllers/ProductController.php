<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Produk',
            'product' => Product::all()
        ];
        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Produk',
            'category' => Category::all(),
            'supplier' => Supplier::all()
        ];
        return view('product.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:produk',
            //'foto' => 'required|mimes:png,jpg,jpeg,svg|max:2048',
        ]);
        //$file = $request->file('foto');
        //$path = $file->store('public/produk');
        $data = array(
            'nama_produk' => $request->nama_produk,
            'kode_produk' => $request->kode_produk,
            'harga' => $request->harga,
            'id_kategori' => $request->id_kategori,
            'id_supplier' => $request->id_supplier,
            //'foto' => $path,
        );
        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Produk',
            'product' => Product::where('id', $id)->get(),
            'kategori' => Category::all(),
            'supplier' => Supplier::all()
        ];
        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$file = $request->file('foto');
        //$request->validate(['foto' => 'mimes:png,jpg,jpeg,svg|max:2048',]);
        // if ($file == null) {
        $data = array(
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kode_produk' => $request->kode_produk,
            'id_supplier' => $request->id_supplier,
            'id_kategori' => $request->id_kategori,
        );
        Product::where('id', $id)->update($data);
        return redirect()->route('product.index')->with('success', 'Data berhasil disimpan!');
        // } else {
        //     $foto_lama = Product::where('id', $id)->first();
        //     Storage::delete($foto_lama->foto);
        //     $path = $file->store('public/produk');
        //     $data = array(
        //         'nama_produk' => $request->nama_produk,
        //         'harga' => $request->harga,
        //         'kode_produk' => $request->kode_produk,
        //         'id_supplier' => $request->id_supplier,
        //         'id_kategori' => $request->id_kategori,
        //         'foto' => $path
        //     );
        //     Product::where('id', $id)->update($data);
        //     return redirect()->route('produk.index')->with('success', 'Data berhasil disimpan!');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$foto_lama = Produk::where('id', $id)->first();
        //Storage::delete($foto_lama->foto);
        Product::destroy($id);
        return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus!');
    }
}