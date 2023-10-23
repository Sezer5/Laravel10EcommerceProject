@foreach($children as $subcategory)
    @if(count($subcategory->children))
        <li>{{$subcategory->title}}</li>

            @include('home.categorytree',['children'=>$subcategory->children])

    @else
        <li>{{$subcategory->title}}</li>
    @endif
@endforeach
