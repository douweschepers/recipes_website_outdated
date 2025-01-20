<div>
    @foreach($recipes as $recipe)
        <span> {{$recipe['title']}}</span>
        <span> {{$recipe['description']}}</span>
    @endforeach
</div>