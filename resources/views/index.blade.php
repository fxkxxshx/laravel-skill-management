<x-layout>
    <x-slot name="title">
        保有スキル管理
    </x-slot>

    <h1>保有スキル管理</h1>

    <h2>カテゴリ</h2>
    <a href="{{ route('categories.create') }}">新規作成</a>

    <h3>カテゴリ一覧</h3>
    <ul>
        @forelse ($categories as $category)
            <li>
                <span>{{ $category->name }}</span>
                <a href="{{ route('categories.edit', $category) }}">編集</a>
                <form method="post" action="{{ route('categories.destroy', $category) }}" class="delete-post">
                    @method('DELETE')
                    @csrf

                    <button>削除</button>
                </form>
            </li>
        @empty
            <li>まだ登録がありません。</li>
        @endforelse
    </ul>

    <script>
        const posts = document.querySelectorAll('.delete-post');

        posts.forEach(post => {
            post.addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('本当に削除しますか？')) {
                    return;
                }

                e.target.submit();
            });
        });
    </script>
</x-layout>
