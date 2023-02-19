@php $matchFound = true; @endphp
<div class="container my-10 mx-auto">
    @if ($sliders && count($sliders) > 0)
    @foreach ($sliders as $slider)
    @foreach ($books as $book)
              @if($book->slider_category_id === $slider->id && $matchFound)
    <h2 class="text-center my-5 text-4xl font-bold p-5 tracking-wide slider-title"><span>{{$slider->name}}</span></h2>
    <hr>
    <div class="swiper">
        <div class="swiper-wrapper">

            {{-- Look if we have book at this category --}}
        @foreach ($books as $book)
            @if($book->slider_category_id === $slider->id)

              {{-- Books Slider --}}
                <div class="swiper-slide drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] hover:drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.8)]">
                    <a href="{{route('books.show', ['book' => $book->id]) }}">
                        <img  src="{{asset('storage/books/' .$book->image )}}" class="h-72 vhover:scale-[1.05] mx-4"  alt="{{$book->title}}">
                    </a>
                </div>

            @endif
        @endforeach

</div>
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>
<div class="swiper-pagination"></div>
</div>
<hr>
@php
    break;
    @endphp
    @endif
@endforeach
@endforeach
@endif
</div>
