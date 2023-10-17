<x-layout>
    <x-slot name="title">
        保有スキル管理
    </x-slot>

    <h1>保有スキル管理</h1>

    {{-- カテゴリ一覧 --}}
    <section class="block">
        <header>
            <h2>カテゴリ一覧</h2>
            <a href="{{ route('categories.create') }}" class="button create">新規作成</a>
        </header>

        <div class="row heading category">
            <p>カテゴリ名</p>
            <p>編集</p>
            <p>削除</p>
        </div>
        <ul>
            @forelse ($categories as $category)
                <li class="row category">
                    <span class="text">{{ $category->name }}</span>
                    <span><a href="{{ route('categories.edit', $category) }}" class="button edit">編集</a></span>
                    <form method="post" action="{{ route('categories.destroy', $category) }}" class="delete-post">
                        @method('DELETE')
                        @csrf

                        <button class="button delete">削除</button>
                    </form>
                </li>
            @empty
                <li class="row category">まだ登録がありません</li>
            @endforelse
        </ul>
    </section>
    {{-- カテゴリ一覧 --}}

    {{-- スキル一覧 --}}
    <section class="block">
        <header>
            <h2>スキル一覧</h2>
            <a href="{{ route('skills.create') }}" class="button create">新規作成</a>
        </header>

        <div class="row heading skill">
            <p>カテゴリ名</p>
            <p>スキル名</p>
            <p>編集</p>
            <p>削除</p>
        </div>
        <ul>
            @forelse ($skills as $skill)
                <li class="row skill">
                    <span class="text">{{ $skill->category->name }}</span>
                    <span class="text">{{ $skill->name }}</span>
                    <span><a href="{{ route('skills.edit', $skill) }}" class="button edit">編集</a></span>
                    <form method="post" action="{{ route('skills.destroy', $skill) }}" class="delete-post">
                        @method('DELETE')
                        @csrf

                        <button class="button delete">削除</button>
                    </form>
                </li>
            @empty
                <li class="row skill">まだ登録がありません</li>
            @endforelse
        </ul>
    </section>
    {{-- スキル一覧 --}}

    {{-- 保有スキル登録 --}}
    <section class="block">
        <form method="post" action="{{ route('skills.register') }}">
            @method('PATCH')
            @csrf

            <header>
                <h2>保有スキル登録</h2>
                <button class="button save">保存</button>
            </header>

            @forelse ($categories as $category)
                <div class="experience-block">
                    <h3>{{ $category->name }}</h3>
                    <div>
                        <div class="row heading experience">
                            <p>スキル名</p>
                            <p>経験の有無</p>
                        </div>
                        <ul>
                            @forelse ($category->skills as $skill)
                                <li class="row experience">
                                    <span class="text">{{ $skill->name }}</span>
                                    <label>
                                        <input type="checkbox" name="id[]" value="{{ $skill->id }}" @if ($skill->is_experience) checked @endif>
                                        <span>@if ($skill->is_experience) 経験あり @else 経験なし @endif</span>
                                    </label>
                                </li>
                            @empty
                                <li class="row experience">まだ登録がありません</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            @empty

            @endforelse
        </form>
    </section>
    {{-- 保有スキル登録 --}}

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

        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const span = checkbox.nextElementSibling;

                if (checkbox.checked) {
                    span.innerText = '経験あり';
                } else {
                    span.innerText = '経験なし';
                }
            });
        })
    </script>
</x-layout>
