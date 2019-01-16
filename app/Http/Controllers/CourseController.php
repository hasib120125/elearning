<?php

namespace App\Http\Controllers;

use Image;
use Storage;
use App\Models\Exam;
use App\Models\Skill;
use App\Models\Topic;
use App\Models\Course;
use App\Models\Status;
use App\Models\Content;
use App\Models\ExamUser;
use App\Models\Difficulty;
use App\Models\ContentFile;
use App\Models\CourseExtra;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Course::with('topics')
            ->with('skills')
            ->with('status')
            ->with('difficulty')
            ->select('courses.*');
        if ('sa' != auth()->user()->username) {
            $query = $query->where('created_by', auth()->user()->id);
        }

        return $datatables->eloquent($query)
            ->addColumn('name', function ($course) {
                return $course->name;
            })
            ->addColumn('qty', function ($course) {
                return $course->topics()->count();
            })
            ->addColumn('status', function ($course) {
                return $course->status->display_name;
            })
            ->addColumn('skills', function ($course) {
                return $course->skills->pluck('name')->implode(', ');
            })
            ->addColumn('difficulty', function ($course) {
                return $course->difficulty->name;
            })
            ->addColumn('action', function ($course) {
                return view('courses.actions', compact('course'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $skills = Skill::where('name', '!=', 'sa')
            ->orderBy('name')
            ->pluck('name', 'id');
        $statuses = Status::where('whose', 'course')->orderBy('display_order')->pluck('display_name', 'id');
        $difficulties = Difficulty::orderBy('display_order')->pluck('name', 'id');
        $exams = Exam::where('status_id', 1)->pluck('title', 'id');

        return view('courses.create', [
            'skills' => $skills,
            'statuses' => $statuses,
            'difficulties' => $difficulties,
            'exams' => $exams,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
              'required',
            ],
            'started_at' => 'required',
            'ended_at' => 'required',
            'status_id' => 'required',
            'difficulty_id' => 'required',
            'skill_ids' => 'required',
        ], [
            'status_id.required' => 'Status is Required',
            'difficulty_id' => 'Select Difficulty Level',
            'skill_ids.required' => 'At least one skill is Required',
        ]);
        if ($request->validate) {
            return ['success' => true];
        }
        $contents_sorted = 0;
        $course = Course::create($request->all());
        $course->skills()->sync($request->skill_ids);
        foreach ($request->no_of_contents as $key => $no_of_contents_each_topic) {
            $topic = Topic::create([
                'name' => $request->topic_name[$key],
                'description' => $request->topic_description[$key],
                'course_id' => $course->id,
                'display_order' => $key,
            ]);
            for ($i = 0; $i < $no_of_contents_each_topic; ++$i) {
                $content = Content::create([
                    'title' => $request->content_title[$contents_sorted],
                    'description' => $request->content_description[$contents_sorted],
                    'display_order' => $i,
                    'course_id' => $course->id,
                    'topic_id' => $topic->id,
                ]);
                if (!empty($request->file_id[$contents_sorted])) {
                    $file = ContentFile::find($request->file_id[$contents_sorted]);
                    $file->content_id = $content->id;
                    $file->save();
                }
                ++$contents_sorted;
            }
        }

        if($request->hasFile('signer_sign1') && $request->hasFile('signer_sign2')){

            $certificate = new CourseExtra;
            $certificate->allow_certificate = $request->allow_certificate;
            $certificate->threshold_mark = $request->threshold_mark;
            $certificate->signer_name1 = $request->signer_name1;
            $certificate->signer_position1 = $request->signer_position1;
            $originalImage= $request->file('signer_sign1');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/thumbnail/';
            if (!file_exists($thumbnailPath)) {
                mkdir($thumbnailPath, 666, true);
            }

            $originalPath = public_path().'/images/';
            if (!file_exists($originalPath)) {
                mkdir($originalPath, 666, true);
            }
            $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
            $thumbnailImage->resize(300,80);
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 

            $certificate->signer_sign1=time().$originalImage->getClientOriginalName();
        
            $certificate->signer_name2=$request->signer_name2;
            $certificate->signer_position2=$request->signer_position2;

            $originalImage= $request->file('signer_sign2');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/thumbnail/';
            if (!file_exists($thumbnailPath)) {
                mkdir($thumbnailPath, 666, true);
            }

            $originalPath = public_path().'/images/';
            if (!file_exists($originalPath)) {
                mkdir($originalPath, 666, true);
            }
            $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
            $thumbnailImage->resize(300,80);
            $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 

            $certificate->signer_sign2=time().$originalImage->getClientOriginalName();
        }else{
            $certificate = new CourseExtra;
            $certificate->allow_certificate = $request->allow_certificate;
            $certificate->threshold_mark = $request->threshold_mark;
            $certificate->signer_name1 = $request->signer_name1;
            $certificate->signer_position1 = $request->signer_position1;
            $certificate->signer_name2=$request->signer_name2;
            $certificate->signer_position2=$request->signer_position2;
        }

        $certificate->course_id = $course->id;

        $certificate->save();

        return redirect()->back()->with('success', 'Course created Successfully');
    }

    public function edit($id)
    {
        $course = Course::with('topics.contents')->with('contents')->find($id);
        $skills = Skill::where('name', '!=', 'sa')
            ->orderBy('name')
            ->pluck('name', 'id');
        $statuses = Status::where('whose', 'course')->orderBy('display_order')->pluck('display_name', 'id');

        $difficulties = Difficulty::orderBy('display_order')->pluck('name', 'id');

        $exams = Exam::where('status_id', 1)->pluck('title', 'id');

        return view('courses.edit', [
            'course' => $course,
            'skills' => $skills,
            'statuses' => $statuses,
            'difficulties' => $difficulties,
            'exams' => $exams,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
              'required',
            ],
            'started_at' => 'required',
            'ended_at' => 'required',
            'status_id' => 'required',
            'skill_ids' => 'required',
        ], [
            'status_id.required' => 'Status is Required',
            'skill_ids.required' => 'At least one skill is Required',
        ]);
        if ($request->validate) {
            return ['success' => true];
        }
        $contents_sorted = 0;
        $course = Course::find($id);
        $course->update($request->all() + ['is_top' => $request->is_top ? true : false]);
        $course->skills()->sync($request->skill_ids);
        $course->topics()->whereNotIn('topics.id', $request->topic_id)->delete();
        $course->contents()->whereNotIn('contents.id', $request->content_id)->delete();
        foreach ($request->no_of_contents as $key => $no_of_contents_each_topic) {
            if (empty($request->topic_id[$key])) {
                $topic = Topic::create([
                    'name' => $request->topic_name[$key],
                    'description' => $request->topic_description[$key],
                    'course_id' => $course->id,
                    'display_order' => $key,
                ]);
            } else {
                $topic = Topic::find($request->topic_id[$key]);
                $topic->update([
                    'name' => $request->topic_name[$key],
                    'description' => $request->topic_description[$key],
                    'course_id' => $course->id,
                    'display_order' => $key,
                ]);
            }
            for ($i = 0; $i < $no_of_contents_each_topic; ++$i) {
                if (empty($request->content_id[$contents_sorted])) {
                    $content = Content::create([
                        'title' => $request->content_title[$contents_sorted],
                        'description' => $request->content_description[$contents_sorted],
                        'display_order' => $i,
                        'course_id' => $course->id,
                        'topic_id' => $topic->id,
                    ]);

                    if (!empty($request->file_id[$contents_sorted])) {
                        $file = ContentFile::find($request->file_id[$contents_sorted]);
                        $file->content_id = $content->id;
                        $file->save();
                    }
                } else {
                    $content = Content::find($request->content_id[$contents_sorted]);
                    $content->update([
                        'title' => $request->content_title[$contents_sorted],
                        'description' => $request->content_description[$contents_sorted],
                        'display_order' => $i,
                        'course_id' => $course->id,
                        'topic_id' => $topic->id,
                    ]);

                    if (!empty($content->file) && $content->file->id != $request->file_id[$contents_sorted]) {
                        Storage::delete($content->file->raw_name);
                        $content->file->delete();
                    }
                    if (!empty($request->file_id[$contents_sorted])) {
                        $file = ContentFile::find($request->file_id[$contents_sorted]);
                        $file->content_id = $content->id;
                        $file->save();
                    }
                }
                ++$contents_sorted;
            }
        }

        return redirect()->back()->with('success', 'Course Updated Successfully');
    }

    public function delete($id)
    {
        $course = Course::find($id);

        return view('courses.delete', ['course' => $course]);
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->back()->with('success', 'Course Delete Successfully');
    }
}
