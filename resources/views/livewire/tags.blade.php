<div class="flex space-x-2 justify-start items-center text-xs font-semibold mb-5 mt-2">
    @if($tag)
        @foreach($tag as $articleTag)
            <h2 class="bg-green-100 text-green-800 rounded-3xl px-3 py-1">
                {{ $articleTag->name }}
                sth
            </h2>
        @endforeach
    @endif
</div>