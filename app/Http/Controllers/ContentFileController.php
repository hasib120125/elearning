<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentFile;
use Storage;

class ContentFileController extends Controller
{
    public function upload(Request $request)
    {
        $raw_name = $request->file->store('contents');
        $input = [
            'name' => $request->file->getClientOriginalName(),
            'raw_name' => $raw_name,
            'extension' => $request->file->getClientOriginalExtension(),
            'file_size' => $request->file->getClientSize(),
            'type' => $request->file->getMimeType(),
        ];
        $file = ContentFile::create($input);

        return $file->id;
    }

    public function download($id)
    {
        $file = ContentFile::find($id);

        return response()->file(Storage::path($file->raw_name), [
            'Content-Type' => $file->type,
        ]);
    }
}
