<?php

namespace App\Http\Controllers\Api;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController
{
    public function index(Request $request)
    {
        $query = Topic::all();

        return $query->get();
    }

    public function show($id)
    {
        return Topic::with('contents')->find($id);
    }
}
