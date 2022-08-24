<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Validator;
use DB;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            "success" => true,
            "message" => "All Posts",
            "data" => $posts,
        ]);
    }
    public function store(Request $request)
    {

        $input = $request->all();

        // $validator = Validator::make($input, [
        //     'title' => 'required',
        //     'content' => 'required',
        //     'category' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }
        $posts = Post::create($input);
        return response()->json([
            "success" => true,
            "message" => "Product created successfully.",
            "data" => $posts
        ]);
    }

    public function show($id)
    {
        # code...
        $posts = Post::find($id);
        if (is_null($posts)) {
            return $this->sendError('Posts not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Posts retrieved successfully.",
            "data" => $posts
        ]);
    }
    public function update(Request $request)
    {
         $id = $request->id;
        $post= DB::table('posts')->where('id',$id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->status
        ]);
        
        // $input = $request->();
        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'detail' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }
        // $posts->title = $input['title'];
        // $posts->content = $input['content'];
        // $posts->category = $input['category'];
        // $posts->status = $input['status'];

        // $posts->save();
        return response()->json([
            "success" => true,
            "message" => "Posts updated successfully.",
            
        ]);
    }
    public function destroy($id)
    {
$posts = Post::find($id);
        $posts->delete();
        return response()->json([
            "success" => true,
            "message" => "Posts deleted successfully.",
            "data" => $posts
        ]);
    }
}
