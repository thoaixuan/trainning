<div class="row">
@foreach($news as $items)
    <div class="col-md-6">
        <div class="card px-2 py-3">
            <a href="{{route('guest.blog.detail',['slug'=>$items->slug])}}"><img class="card-img-top img-new" src="/uploads/news/{{$items->image}}" alt="Well, I didn&#39;t vote for you."></a>
            <div class="d-flex flex-column">
                <h3 class="mt-3 mb-1"><a href="{{route('guest.blog.detail',['slug'=>$items->slug])}}"> {{$items->title}} </a></h3>
                <div class="text-muted text-summary">{!!(editorEmpty($items->summary)?summaryText($items->content):summaryText($items->summary))!!}</div>
            </div>
        </div>
    </div>
@endforeach
</div>