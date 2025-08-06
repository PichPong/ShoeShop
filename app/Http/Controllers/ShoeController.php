<?php

namespace App\Http\Controllers;

use App\Models\shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoeController extends Controller
{

    public function index()
    {
        return response()->json(DB::table('shoes')->get());
    }


    public function delete($id)
    {
        $shoe = shoe::where('id', $id)->first();
        if (!empty($shoe->image) && file_exists(public_path('uploads/' . $shoe->image))) {
            unlink(public_path('uploads/' . $shoe->image));
        }
        $shoe->delete();
        return redirect()->route('shoes.show');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock_qty' => 'required',
            'brand' => 'required',
            'description' => 'required',
        ]);

        $shoe = Shoe::find($id); // Capital "S" and correct method

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

            if (!empty($shoe->image) && file_exists(public_path('uploads/' . $shoe->image))) {
                unlink(public_path('uploads/' . $shoe->image));
            }

            $extension = $request->file('image')->extension();
            $filename = date('YmdHis') . '.' . $extension;
            $request->file('image')->move(public_path('uploads/'), $filename);

            $shoe->image = $filename;
        }

        $shoe->name = $request->input('name');
        $shoe->price = $request->input('price');
        $shoe->stock_qty = $request->input('stock_qty');
        $shoe->brand = $request->input('brand');
        $shoe->description = $request->input('description');

        $shoe->update();

        return redirect()->route('shoes.show');
    }

    public function edit($id)
    {
        $shoe = shoe::where('id', $id)->first();
        return view('shoes.edit', compact('shoe'));
    }

    public function show()
    {

        $shoes = shoe::orderBy('id', 'desc')->get();
        return view('shoes.show', compact('shoes'));

    }

    public function create()
    {
        return view('shoes.create'); // Make sure you have this Blade view file
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock_qty' => 'required',
            'brand' => 'required',
            'image' => 'required|image|mimes:jpg, jpeg, png, gif|max:2048',
            'description' => 'required',
        ]);

        $shoe = new shoe();

        $shoe->name = $request->input('name');
        $shoe->price = $request->input('price');
        $shoe->stock_qty = $request->input('stock_qty');
        $shoe->brand = $request->input('brand');
        $shoe->description = $request->input('description');

        $extension = $request->file('image')->extension();
        $filename = date('YmdHis') . '.' . $extension;
        $request->file('image')->move(public_path('uploads/'), $filename);

        $shoe->image = $filename;

        $shoe->save();

        return redirect()->route('shoes.show');

    }
}
