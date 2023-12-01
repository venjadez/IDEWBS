<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeFormRequest;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();

        return view('admin.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.sizes.create');
    }

    public function store(SizeFormRequest $request)
    {
        $validatedData = $request->validated();
        Size::create($validatedData);

        return redirect('admin/sizes')->with('message', 'Size Added');
    }

    public function edit(int $size_id)
    {
        $data = Size::findOrFail($size_id);

        return view('admin/sizes/edit', compact('data'));
    }

    public function update(SizeFormRequest $request, $size_id)
    {
        $validatedData = $request->validated();
        $size = Size::findOrFail($size_id);
        $size->size_value = $validatedData['size_value'];
        $size->status = $request->status == true ? '1' : '0';
        $size->update();

        return redirect('admin/sizes')->with('message', 'Size Updated');
    }

    public function remove(int $size_id)
    {
        $size = Size::findOrFail($size_id);
        $size->delete();

        return redirect('admin/sizes')->with('message', 'Size Removed');
    }
}
