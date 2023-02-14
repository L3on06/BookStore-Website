    <div class="flex md:w-2/4 mx-auto">
        <form action="{{ route('shop')}}" method="GET">
            <select type="sort" name="sort" id="sort-button" data-dropdown-toggle="sort" required  class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100  rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100">
                <option value="">Sort By</option>
                <option value="title_asc" @if(Request::get("sort") && Request::get('sort') === 'title_asc') selected @endif  class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Title A > Z</option>
                <option value="title_desc" @if(Request::get("sort") && Request::get('sort') === 'title_desc') selected @endif class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Title Z > A</option>
                <option value="price_asc" @if(Request::get("sort") && Request::get('sort') === 'price_asc')  selected @endif class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Price L > H</option>
                <option value="price_desc" @if(Request::get("sort") && Request::get('sort') === 'price_desc') selected @endif class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Price H > L</option>
            </select>
        </form>
        <div class="relative w-full">
            <form action="{{ route('shop')}}">
                <input type="search" name="search" id="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-[#6d4b2f] focus:ring-[#6d4b2f] focus:border-[#6d4b2f]" placeholder="Search book by title ..." required @if(Request::get("search")) value="{{Request::get('search')}}" @endif>
                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-[#e6ddc4] rounded-r-lg border border-y-[#6d4b2f] border-r-[#6d4b2f] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-[#6d4b2f]">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </div>

    @section('js')
    document.getElementById('sort-button').addEventListener('change', (e) => {
        window.location.href = '?sort=' + e.target.value
    });
    @endsection
