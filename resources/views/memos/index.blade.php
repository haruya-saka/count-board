
@extends('layouts.app')

@include('layouts.header')

<div class="row">
    <div class="col-2 bg-light" id="sidemenu" class="sidebar">
        @include('layouts.sidebar')
    </div>
    <div class="col">
        @section('content')
        <div class="container h-100">
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

            <div class="row">
                @foreach ($memos as $memo)
                    {{-- メモ編集モーダル --}}
                    @include('modal.edit_memo')

                    {{-- メモ削除モーダル --}}
                    @include('modal.delete_memo')

                    {{-- タグ一覧モーダル --}}
                    @include('modal.show_tag')

                    <div class="col">
                        <div class="card bg-white mt-3" style="width: 18rem">
                            <div class="card-body">
                                <h4 class="card-title text-center">{{ $memo->title }}</h4>
                                <div class="d-flex align-items-center">
                                </div>
                                <p class="card-text text-center">{{ $memo->content }}</p>
                                <div>
                                    @foreach ($memo->tags()->orderBy('id', 'asc')->get() as $tag)
                                        <span class="tag-memo badge bg-secondary mt-2 me-2 fw-light">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class=" text-body-secondary">
                                {{-- <div class="text-center left-time"> --}}
                                    <p class="left-time-text"id="countdown{{ $memo->id }}"></p>
                                {{-- </div> --}}
                                <div class="d-inline-block memo-action" style="width: 18rem">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editMemoModal{{ $memo->id }}"><i class="fa-solid fa-pen icon px-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteMemoModal{{ $memo->id }}"><i class="fa-solid fa-trash-can icon px-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#showTagModal{{ $memo->id }}"><i class="fa-solid fa-tags icon px-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        var updateCountdown{{ $memo->id }} = () => {
                            var period = @json($memo->period);
                            var createdAt = @json($memo->created_at);
                            
                            var createdAtDate = new Date(createdAt);
                            var currentDate = new Date();
                            var elapsedDays = Math.floor((currentDate - createdAtDate) / (1000 * 60 * 60 * 24));
                            var period = period - elapsedDays;

                            console.log(period);


                            if (period <= 0) {
                                document.getElementById('countdown{{ $memo->id }}').textContent = '期限切れ';
                            } else {
                                document.getElementById('countdown{{ $memo->id }}').textContent = '残り' + period + '日';
                            }
                        }

                        updateCountdown{{ $memo->id }}();
                    </script>
                @endforeach
            </div>
        </div>
    </div>
</div>




@include('layouts.footer')
