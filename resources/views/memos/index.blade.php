
@extends('layouts.app')

@include('layouts.header')

<script src="{{ asset('js/countdown.js') }}"></script>

<div class="row">
    <div class="col-2 bg-light" id="sidemenu" class="sidebar">
        @include('layouts.sidebar')
    </div>
    <div class="col">
        @section('content')
        <div class="container">
            {{-- フォームバリデーションのエラーハンドリング --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- タグ編集モーダル --}}
            @include('modal.edit_tag')

            <div class="row row-cols-3">
                @foreach ($memos as $memo)
                    {{-- メモ編集モーダル --}}
                    @include('modal.edit_memo')

                    {{-- メモ削除モーダル --}}
                    @include('modal.delete_memo')

                    {{-- タグ一覧モーダル --}}
                    @include('modal.show_tag')

                    {{-- メモをカードデザインで表示 --}}
                    <div class="col p-5">
                        <div class="card bg-white mt-3 position-relative" style="width: 20rem;">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="title d-flex align-items-center justify-content-center">
                                        <h4 class="card-title text-center fw-bold">
                                            {{-- メモのタイトル --}}
                                            {{ $memo->title }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="d-flex flex-row position-absolute top-0 end-0">
                                    @foreach ($memo->tags()->orderBy('id', 'asc')->get() as $tag)
                                        {{-- mb_substrでtagnameの一文字目をマルチバイトで取り出す --}}
                                        <div class="m-1 d-flex align-items-center justify-content-center flex-row border border-secondary rounded-1 bg-secondary text-light" style="width: 1.2rem; height: 1.2rem;">{{ mb_substr($tag->name , 0 , 1) }}</div>
                                    @endforeach
                                </div>
                                {{-- メモの内容 --}}
                                <p class="card-text text-center gap-2">{{ $memo->content }}</p>
                            </div>
                            
                            <div class=" text-body-secondary" style="width: 20rem">
                                {{-- 残り日数 --}}
                                <p class="left-time-text"id="countdown{{ $memo->id }}"></p>
                                {{-- メモの編集、削除、タグ付けアクション --}}
                                <div class="d-inline-block memo-action" style="width: 20rem">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editMemoModal{{ $memo->id }}"><i class="fa-solid fa-pen icon px-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteMemoModal{{ $memo->id }}"><i class="fa-solid fa-trash-can icon px-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#showTagModal{{ $memo->id }}"><i class="fa-solid fa-tags icon px-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        updateCountdown({{ $memo->id }}, @json($memo->created_at), @json($memo->updated_at), @json($memo->period));
                    </script>
                @endforeach

            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
