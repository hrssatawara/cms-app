<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Pages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): JsonResponse
    {
        $pages = Pages::all()->toArray();
        return response()->json(['pages'=>array_reverse($pages)]);
    }

    public function store(StorePageRequest $request)
    {
        $page = new Pages($request->all());
        $page->save();
        return response()->json('Page created!');
    }

    public function show($id)
    {
        $page = Pages::find($id);
        return response()->json($page);
    }


    public function update($id, UpdatePageRequest $request)
    {
        $page = Pages::find($id);
        $page->update($request->all());
        return response()->json('Page updated!');
    }

    public function destroy($id)
    {
        $page = Pages::find($id);
        $page->delete();
        return response()->json('Page deleted!');
    }
}
