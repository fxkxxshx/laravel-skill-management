<x-layout>
    <x-slot name="title">
        保有スキル管理
    </x-slot>

    <h1>保有スキル管理</h1>

    <section class="block">
        <header>
            <h2>カテゴリ</h2>
            <a href="{{ route('categories.create') }}" class="button create">新規作成</a>
        </header>

        <div class="row heading">
            <p>カテゴリ名</p>
            <p>編集</p>
            <p>削除</p>
        </div>
        <ul>
            @forelse ($categories as $category)
                <li class="row category">
                    <span>{{ $category->name }}</span>
                    <span><a href="{{ route('categories.edit', $category) }}" class="button edit">編集</a></span>
                    <form method="post" action="{{ route('categories.destroy', $category) }}" class="delete-post">
                        @method('DELETE')
                        @csrf

                        <button class="button delete">削除</button>
                    </form>
                </li>
            @empty
                <li>まだ登録がありません。</li>
            @endforelse
        </ul>
    </section>

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
