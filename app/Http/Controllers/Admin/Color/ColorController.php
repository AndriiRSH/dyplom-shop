<?php

namespace App\Http\Controllers\Admin\Color;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Colors;


class ColorController
{
    public function create()
    {
        return view('admin.color.create');
    }

    public function delete(Colors $color)
    {
        $color->delete();
        return redirect()->route('admin.color.index');
    }

    public function edit(Colors $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function index()
    {
        $colors = Colors::all();
        return view('admin.color.index', compact('colors'));
    }

    public function show(Colors $color)
    {
        return view('admin.color.show', compact('color'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Colors::firstOrCreate($data);
        return redirect()->route('color.index');
    }

    public function update(UpdateRequest $request, Colors $color)
    {
        $data = $request->validated();
        $color->update($data);
        return view('admin.color.show', compact('color'));
    }
}
