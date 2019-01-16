<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Content;
use App\Models\ContentUser;

class ContentUserController
{
    public function index(Request $request)
    {
        $query = auth()->user()->Contents()->with('topics.contents.file');
        if ('fav' == $request->type) {
            $query = $query->where('content_user.is_favorite', true);
        }
        if ('ass' == $request->type) {
            $query = $query->where('content_user.status_id', 13);
        }
        if ('con' == $request->type) {
            $query = $query->where('content_user.status_id', 13);
        }

        return $query->get();
    }

    public function changeStatus(Request $request)
    {
    }

    public function byCourse($course_id)
    {
        $content_ids = Course::find($course_id)->contents()->pluck('id');
        $content_users = ContentUser::whereIn('content_id', $content_ids)
            ->where('user_id', auth()->user()->id)->get();

        return $content_users;
    }

    public function toggleStatus($content_id)
    {
        $content = Content::find($content_id);
        
        $content_user = ContentUser::where('content_id', $content_id)
            ->where('user_id', auth()->user()->id)->first();
        if ($content_user) {
            $content_user->status_id = 18 == $content_user->status_id ? 19 : 18;
            $content_user->save();
        } else {
            $content_user[auth()->user()->id] = [
                'status_id' => 18,
            ];
            $content->users()->attach($content_user);

            $content_user = ContentUser::where('content_id', $content->id)
                ->where('user_id', auth()->user()->id)->first();
        }
        $course = $content->course;
        $contents = $course->contents;
        
        $no_of_incomplete_contents = $contents->count() - ContentUser::where('status_id', 18)->whereIn('content_id', $contents->pluck('id'))->where('user_id', auth()->user()->id)->count();
        if (0 == $no_of_incomplete_contents) {
            $content_user->no_of_incomplete_contents = 0;
        }

else {
    
        $content_user->no_of_incomplete_contents = 1;
    
}
   

        return $content_user;
    }
}
