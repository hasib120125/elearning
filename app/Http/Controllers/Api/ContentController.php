<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController
{
    public function index(Request $request)
    {
        $query = Content::with('file')->orderBy('display_order')->get();
        if ('new' == $request->order) {
            $query = $query->orderBy('created_at');
        }
        if ('pop' == $request->order) {
            $query = $query->orderBy('created_at');
        }
        if ('top' == $request->order) {
            $query = $query->orderBy('created_at');
        }

        return $query->get();
    }

    public function show($id)
    {
        return Content::with('file')->find($id);
    }
}
