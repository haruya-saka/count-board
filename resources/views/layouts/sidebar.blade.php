@section('sidebar')
<div class="px-1 py-8 sidebar">
    <div class="tags-container">
        <ul>
            <li>
                <button type="button" class="tag-btn">
                    <i class="fa-solid fa-tags px-2 tag-icon"></i>
                    <a href="{{ route('index') }}" class="text-decoration-none">
                        <span class="">home</span>
                    </a>
                </button>
            </li>
        </ul>

        @foreach ($tags as $tag)
            <ul>
                <li>
                    <button type="button" class="tag-btn">
                        <i class="fa-solid fa-tags px-2 tag-icon"></i>
                        <a href="{{ route('memo.tagFilter', ['tag' => $tag->id]) }}" class="text-decoration-none" data-tag-id="{{ $tag->id }}">
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

        {{-- タグ編集モーダル --}}
        @include('modal.edit_tag')
        <ul>
            <li>
                <button type="button" class="mt-2 tag-btn" data-bs-toggle="modal" data-bs-target="#editTagModal">
                    <i class="fa-solid fa-bars px-2 tag-icon"></i>
                    <span>タグを編集</span>
                </button>
            </li>
        </ul>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    $(document).ready(function() {
        $('.sidebar').hover(function() {
            // ホバー時の処理
            $('.tag-btn').addClass('active');
        }, function() {
            // ホバーが外れた時の処理
            $('.tag-btn').removeClass('active');
        });
    });
});




</script>

