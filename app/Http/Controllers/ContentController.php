<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\models\Content;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::all();

        return response()->json([
            'content' => $content
        ], 200);
    }


    public function show($id) {
        $content = Content::find($id);
        if(!$content){
            return response()->json([
                'message' => 'Content not found'
            ], 404);
        }
        return response()->json([
            'content' => $content
        ], 200);
    }

    public function update(ContentRequest $request, $id)
    {
        try {
            $content = Content::find($id);
            if(!$content){
                return response()->json([
                    'message' => 'Content not found'
                ], 404);
            }

            $content->title = $request->title;
            $content->description = $request->description;

            if($request->hasFile('image')){

                $storage = Storage::disk('public');

                if($storage->exists($content->image))
                    $storage->delete($content->image);

                $imageName = Str::random(32).".".$request->image->getClientOriginalExtension();
                $content->image = $imageName;
                $storage->put($imageName, file_get_contents($request->image));
            }

            $content->save();  

            return response()->json([
                'message' => 'Content updated successfully'
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $content = Content::find($id);
        if(!$content){
            return response()->json([
                'message'=>'Content Not Found.'
            ],404);
        }

        $storage = Storage::disk('public');

        if($storage->exists($content->image))
            $storage->delete($content->image);

        $content->delete();

        return response()->json([
            'message' => "Content successfully deleted."
        ],200);
    }

    public function store(ContentRequest $request)
{
    try {
        $content = new Content();

        $content->title = $request->title;
        $content->description = $request->description;

        if ($request->hasFile('image')) {
            $storage = Storage::disk('public');

            $imageName = Str::random(32) . "." . $request->image->getClientOriginalExtension();
            $content->image = $imageName;
            $storage->put($imageName, file_get_contents($request->image));
        }

        $content->save();

        return response()->json([
            'message' => 'Content created successfully',
            'content' => $content
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
    }
}

}
