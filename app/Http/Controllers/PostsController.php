<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    public function index()
    {
        //
        //$posts= Post::orderBy('title','desc')->get();
        //$post=Post::where('title','Post Two')->get();
       // $posts=DB::select('select * from posts');
       $posts= Post::orderBy('created_at','desc')->take(1)->paginate(10);

        
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]); 
        $filenametostore='';
        //Handler file upload
        if($request->hasFile('cover_image')){
          //get file name with extension
          $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
          //get just filename
          $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
          //get just fileextension
          $extension=$request->file('cover_image')->getClientOriginalExtension();
          //file name to store
          $filenametostore=$filename."_".time()."_.".$extension;

          $path=$request->file('cover_image')->storeAs('public/coverimages',$filenametostore);

        }else{
            $filetostore="noimg.jpeg";
        }

        $post=new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image=$filenametostore;
        $post->save();
        return redirect('posts')->with('success','Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post= Post::find($id);

        
        return view('posts.show')->with('post',$post);
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
         //
       

        $post=Post::find($id);
        $userid=$post->user_id;
        $uid=auth()->user()->id;

        return view('posts.edit')->with('post',$post);
        
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
         //
         $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]); 

        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image')){
            //get file name with extension
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just fileextension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $filenametostore=$filename."_".time()."_.".$extension;
  
            $path=$request->file('cover_image')->storeAs('public/coverimages',$filenametostore);
            $post->cover_image=$filenametostore;

  
          }

        $post->save();
        return redirect('posts')->with('success','Post Edited');
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
        $post=Post::find($id);
        $post->delete();
        return redirect('posts')->with('success','Deleted');
    }
}
