<ul id="lightSlider">
    @foreach($property->propertyImages as $imageKey => $image)

        <li data-thumb="{{asset($image['dataUri'])}}">
            <img src="{{asset($image['dataUri'])}}" onerror="this.src='http://placehold.it/854x468?text=No Image Available'"/>
        </li>

    @endforeach
</ul>
