<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostRequest;
use App\Traits\PictureTrait;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;

class PostController extends Controller
{  
    use PictureTrait;
    protected $user;
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
   
    public function index()
    {
        //
    }

        
    public function store(PostRequest $request)
    {       
        
            $post = new Post();
            $post->fill($request->all());
            $post->user_id = Auth()->id();

            if($request->hasFile('banner')){
                $post->banner =  Storage::put('post-banner', $request->file('banner'));
            }

            $pictures = ($request->thumbnail) ? $request->thumbnail : [];
            if($post->save()){
                if (!empty($pictures)) {
                    foreach ($pictures as $k => $list) {
                        $model = Post::class;
                        $this->upload($list , $post->id , $model);
                    }
                }
                $status = "success";
                 return response()->json($status);
            }
           

          
    }

    public function commentPost(Request $request){
           
        $com = new Comment();
        $com->fill($request->all());
        $com->user_id = Auth()->id();
        $com->save();
        $status = "success";
        return response()->json($status);
    }
    public function getUserPost(){
        $user = Auth()->id();
        $obj = Comment::where('user_id' , $user)->first();
        $obj->post();
        return response()->json($obj);
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
