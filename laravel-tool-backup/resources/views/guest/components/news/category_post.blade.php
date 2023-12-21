<div class="card-body">
    <ul class="list-group">
        @foreach(fetchCategories() as $data)
            <li class="list-group-item border-0 p-0 position-relative"><a href="{{route('guest.blog.index',['slug'=>$data->slug])}}"><i class="fe fe-chevron-right"></i>{{$data->name}} </a> <span class="product-label position-absolute position">{{countCategories($data->id)}}</span> </li>
        @endforeach
    </ul>
</div>