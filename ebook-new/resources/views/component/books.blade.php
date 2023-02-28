
<div class="containe p-10 mx-auto grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 my-20 gap-10">
        @foreach ($books as $book)

        <div class="w-80 border border-2 rounded-3xl shadow-xl mx-auto">
        <a href="#">
            <div class="drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] hover:drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.8)]">
            <a href="{{route('books.show', ['book' => $book->id]) }}">
                <img  src="{{asset('storage/books/' .$book->image )}}" class="rounded-2xl p-2 mx-auto w-64 h-[24rem] object-cover"  alt="{{$book->title}}">
            </a>
        </div>
    <div class="px-5 pb-5 flex flex-col justify-between">
        <a href="#">
            <h5 class="font-bold text-2xl h-[6rem] my-4 line-clamp-3 align-top">{{$book->title}}</h5>
        </a>

        <div class="flex items-center justify-between align-bottom ">
            <span class="text-3xl font-bold text-gray-900">{{number_format($book->price, 2, '.', '')}} &euro;</span>
            <a href="{{route('books.show', ['book' => $book->id]) }}" class="text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">View Book</a>
        </div>
    </div>
</div>
    @endforeach
