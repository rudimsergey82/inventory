<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->name_place }}
            @if(count($child->childs))
                @include('manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>