<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();

        return view('admin/colors/index', compact('colors'));
    }

    public function create()
    {
        return view('admin/colors/create');
    }

    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        Color::create($validatedData);

        return redirect('admin/colors')->with('message', 'Color Added');
    }

    public function edit(int $color_id)
    {
        $data = Color::findOrFail($color_id);

        return view('admin/colors/edit', compact('data'));
    }

    public function update(ColorFormRequest $request, $color_id)
    {
        $validatedData = $request->validated();
        $color = Color::findOrFail($color_id);
        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->status = $request->status == true ? '1' : '0';
        $color->update();

        return redirect('admin/colors')->with('message', 'Color Updated');
    }

    public function remove(int $color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();

        return redirect('admin/colors')->with('message', 'Color Removed');
    }
}
