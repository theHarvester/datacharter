<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }} : {{ $category->user_id }}</li>
    @endforeach
</ul>