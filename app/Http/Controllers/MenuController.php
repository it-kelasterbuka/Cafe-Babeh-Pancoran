<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Katagori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateMenuRequest;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $menu = Menu::with('Katagori')->latest()->get();

            return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('katagori_id', function($menu){
                return $menu->Katagori->katagori;
            })
            ->addColumn('button', function($menu){
                return '<div class="text-center">
                    <a href="menu/'.$menu->id.'" class="btn-sm btn btn-secondary">Detail</a>
                    <a href="menu/'.$menu->id.'/edit" class="btn btn-sm btn-primary">Update</a>
                    <a href="#" onclick="deleteMenu(this)" data-id="'.$menu->id.'"
                    class="btn btn-sm btn-danger">Delete</a>
                </div>';
            })
            ->rawColumns(['katagori_id', 'button'])
            ->make();
        }
        return view('menu.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create-menu',[
            'catagories' => Katagori::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $filename = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/image', $filename);

        $data['img'] = $filename;
        $data['slug'] = Str::slug($data['name_menu']);

        Menu::create($data);

        return redirect(url('menu'))->with('msg','Add new menu successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('menu.show-menu', [
            'menu' => Menu::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('menu.update-menu',[
            'menu' => Menu::find($id),
            'catagories' => Katagori::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/image', $filename);

            Storage::delete('public/image/'. $request->oldImg);

            $data['img'] = $filename;
        } else {
            $data['img'] = $request->oldImg;
        }
        
        $data['slug'] = Str::slug($data['name_menu']);

        Menu::find($id)->update($data);

        return redirect(url('menu'))->with('msg','Update menu successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Menu::find($id);
        Storage::delete('public/image'.$data->img);
        $data->delete();

        return response()->json([
            'msg' => 'Data menu has been delete'
        ]);
    }
}
