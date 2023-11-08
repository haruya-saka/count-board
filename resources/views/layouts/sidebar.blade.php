@section('sidebar')
<div class="px-1 py-8 sidebar">
    <div class="tags-container">
        <ul>
            <li>
                <button type="button" class="tag-btn">
                    <i class="fa-solid fa-tags px-2 tag-icon"></i>
                    <a href="{{ route('index') }}">
                        <span class="text-decoration-none">home</span>
                    </a>
                </button>
            </li>
        </ul>

        @foreach ($tags as $tag)
            <ul>
                <li>
                    <button type="button" class="tag-btn">
                        <i class="fa-solid fa-tags px-2 tag-icon"></i>
                        <a href="{{ route('memo.tagFilter', ['tag' => $tag->id]) }}" class="tag-link" data-tag-id="{{ $tag->id }}">
                            <span>{{ $tag->name }}</span>
                        </a>
                    </button>
                </li>
            </ul>
        @endforeach


        <!-- メモ追加モーダル -->
        @include('modal.add_memo') 
        <ul>
            <li>
                <button type="button" class="mt-2 tag-btn" data-bs-toggle="modal" data-bs-target="#addmemoModal">
                    <i class="fa-solid fa-square-plus px-2 tag-icon"></i>
                    <span>メモを追加</span>
                </button>
            </li>
        </ul>
        {{-- タグ追加モーダル --}}
        @include('modal.add_tag')
        <ul>
            <li>
                <button type="button" class="mt-2 tag-btn" data-bs-toggle="modal" data-bs-target="#addTagModal">
                    <i class="fa-solid fa-circle-plus px-2 tag-icon"></i>
                    <span>タグを追加</span>
                </button>
            </li>
        </ul>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.sidebar').hover(function() {
        // ホバー時の処理
        $('.tag-btn').addClass('active');
    }, function() {
        // ホバーが外れた時の処理
        $('.tag-btn').removeClass('active');
    });
});
</script>

