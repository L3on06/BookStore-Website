<div class="container my-0 mx-auto">
    <h2 class="text-center my-5 text-4xl font-bold p-5 tracking-wide slider-title"><span>Best books of the year</span></h2>
    <hr  class="">
      <div class="swiper">
          <div class="swiper-wrapper">

@if ($books && count($books) > 0)
@foreach ($books as $book)




<!-- Slides -->
<div class="swiper-slide drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] hover:drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.8)]">
    <a href="ViewBook.php?id=">
        <img  src="{{asset('storage/books/' .$book->image )}}" class="h-72 vhover:scale-[1.05] mx-4"  alt="{{$book->title}}">
    </a>
</div>
{{-- <div class="swiper-slide drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] hover:drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.8)]">
<a href="ViewBook.php?id=">
<img src="{{asset('/images/books/book37.jpg')}}" class="h-72 hover:scale-[1.05] mx-4"  alt="Best books of the year">
</a>
</div> --}}
@endforeach

@else

<h1>
    no book
</h1>

@endif
            </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
            <hr class="">
        </div>
</div>
