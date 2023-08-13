<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKatagoriRequest;
use App\Http\Requests\UpdateKatagoriRequest;

class KatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('katagori.index', [
            'catagories' => Katagori::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request  $request)
    {
        $data = $request->validate([
            'katagori' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($data['katagori']);
        Katagori::create($data);
        return back()->with('msg','Add new catagories successfuly');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKatagoriRequest $request, Katagori $katagori, string $id)
    {
        $data = $request->validate([
            'katagori' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($data['katagori']);
        Katagori::find($id)->update($data);
        return back()->with('msg','Add new catagories update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Katagori $katagori, string $id)
    {
        Katagori::find($id)->delete();
        return back()->with('msg','Add new catagories delete successfuly');
    }
}
