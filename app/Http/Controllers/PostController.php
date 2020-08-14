<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\post;
use App\user;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $result  = DB::table('posts');
        if($request->search){
            $result->where('posts.title', 'like', '%' .$request->search. '%')->get();
        }

        $listPost = $result->paginate(3);
        return view('admin.pages.post.list-post',['listPost'=>$listPost]);
    }
    public function create()
    {
        $dataUser = user::all();
        return view('admin.pages.post.add-post', compact('dataUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $this->validate($request, [
            'title'=>'bail|required',
            'short_desc' => 'bail|required',
            'desc' =>'bail|required',
        ], [
            'title.required' => 'Tiêu đề không được bỏ trống.',
            'short_desc.required' => 'Mô tả không được bỏ trống.',
            'desc.required' => 'Nội dung không được bỏ trống.',
        ]);
        $addPost = new post;
        $addPost->title = $request->title;
        $addPost->short_desc = $request->short_desc;
        $addPost->desc =  $request->desc;
        $addPost->author_id =$request->pst_user;
        $addPost->status =$request->status;
        if($request->hasFile('Hinh'))
         {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
            {
                return redirect()->route('post.listPost')->with('Loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg ');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/post/".$Hinh))
            {
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/post",$Hinh);
            $addPost->Hinh = $Hinh;
        }
        else
        {
            $addPost->Hinh = "";
        }
         $addPost->save();
         return redirect()->route('post.listPost')->with('thongbao','Thêm thành công ');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $addPost = post::find($id);
        $dataUser = user::all();
        return view('admin.pages.post.edit-post', compact('addPost', 'dataUser'));
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
        $this->validate($request, [
            'title'=>'bail|required',
            'short_desc' => 'bail|required',
            'desc' =>'bail|required',
        ], [
            'title.required' => 'Tiêu đề không được bỏ trống.',
            'short_desc.required' => 'Mô tả không được bỏ trống.',
            'desc.required' => 'Nội dung không được bỏ trống.',
        ]);
        $addPost = post::find($id);
        $addPost->title = $request->title;
        $addPost->short_desc = $request->short_desc;
        $addPost->desc =  $request->desc;
        $addPost->author_id =$request->pst_user;
        $addPost->status =$request->status;
        if($request->hasFile('Hinh'))
         {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png'&& $duoi != 'jpeg')
            {
                return redirect()->route('post.listPost')->with('Loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg ');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/post/".$Hinh))
            {
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/post",$Hinh);
            unlink("upload/post/".$addPost->Hinh);
            $addPost->Hinh = $Hinh;
        }
        $addPost->save();
        return redirect()->route('post.listPost')->with(['thongbao' => 'Cập nhật thành công ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addPost = post::find($id);
        $addPost->status = 2;
        $addPost->save();
        return redirect()->route('post.listPost');
    }
}