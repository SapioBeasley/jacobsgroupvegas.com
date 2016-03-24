<ul id="lightSlider">
    @foreach($property->propertyImages as $imageKey => $image)

        <li data-thumb="{{asset($image['dataUri'])}}">
            <img src="{{asset($image['dataUri'])}}" />
        </li>

    @endforeach
</ul>
