<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = Auth::user()->memos;
        $tags = Auth::user()->tags;

        return view('memos.index', compact('memos','tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        // ]);

        $memo = new Memo();
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->period = $request->input('period');
        $memo->user_id = Auth::id();
        $memo->save();

        return to_route('memos.index');
    }

    public function attachTags(Request $request, Memo $memo)
    {
        // メモにタグをアタッチ
        $memo->tags()->sync($request->input('tag_ids'));
    
        return redirect()->route('memos.index');
    }

    public function tagFilter($tagId)
    {
        // 表示するメモをタグでフィルター
        // サイドバーから送信されたidのタグを取得
        $tag = Tag::find($tagId);
    
        if (!$tag) {
            // タグが見つからない場合のエラーハンドリング
            abort(404);
        }
        
        $memos = $tag->memos;
        $tags = Auth::user()->tags;
    
        return view('memos.index', compact('memos','tags'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        return view('memos.show', compact('memo'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memo $memo)
    {
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->period = $request->input('period');
        $memo->user_id = Auth::id();
        $memo->save();

        return redirect()->route('memos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect()->route('memos.index');
    }
}
