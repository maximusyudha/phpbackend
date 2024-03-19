<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;
use App\Http\Requests\CreatenovelRequest;
use App\Http\Requests\UpdatenovelRequest;

class NovelController extends Controller
{
    public function index()
    {
        return Novel::all();
    }

    public function store(CreateNovelRequest $request)
    {
        return Novel::create($request->validated());
    }

    public function show(Novel $novel)
    {
        return $novel;
    }

    public function update(UpdateNovelRequest $request, novel $novel)
    {
        $novel->update($request->validated());
        return $novel;
    }

    public function destroy(Novel $novel)
    {
        $novel->delete();
        return response()->noContent();
    }
}
