<x-layout>
    <x-slot name="title">
        スキル - 新規作成
    </x-slot>

    <header>
        <h1>スキル - 新規作成</h1>
        <a href="{{ route('index') }}" class="button back">TOPページに戻る</a>
    </header>

    <div class="block">
        <form method="post" action="{{ route('skills.store') }}">
            @csrf

            <div class="input-block">
                <label>
                    カテゴリ名
                    <select name="id">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('id') == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </label>
                @error('id')
                    <p class="notice">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-block">
                <label>
                    スキル名
                    <input type="text" name="name" value="{{ old('name') }}">
                </label>
                @error('name')
                    <p class="notice">{{ $message }}</p>
                @enderror
            </div>
            <button class="button save">保存</button>
        </form>
    </div>
</x-layout>
