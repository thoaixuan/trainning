<div class="card-body">
    <div class="">
        @foreach(fecthNews() as $items)
        <div class="d-flex overflow-visible mt-5">
            <a href="{{route('guest.blog.detail',['slug'=>$items->slug])}}" class="card-aside-column br-5 cover-image max-height" data-bs-image-src="/uploads/news/{{$items->image}}"></a>
            <div class="ps-3 flex-column">
                <h4><a href="{{route('guest.blog.detail',['slug'=>$items->slug])}}">{{$items->title}}</a></h4>
                <div class="text-muted text-summary fs-6">{!!$items->summary!!}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>