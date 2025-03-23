<div class="my-5">
    <div class="space-y-2 p-5 bg-blue-100 bg-opacity-40 rounded-2xl shadow-sm">
        <a href="{{ route('article.show', $article->slug)}}">
            <div class="h-28 w-full object-contain rounded-t-2xl overflow-hidden border-primary max-w-7xl">

                @if ($article->getFirstMediaUrl('articles'))
                    <img src="{{ $article->getFirstMediaUrl('articles') }}" alt="{{ $article->title }}" class="w-full h-auto">
                @endif
            </div>
            <livewire:tags />
            <div class="text-xl font-extrabold hover:underline">{{ $article->title }}</div>
        </a>
        <div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit placeat necessitatibus iusto quae velit adipisci reiciendis earum atque odio quos provident molestiae temporibus eius neque modi cum, sint quis fugiat!</div>
        <!-- user infos -->
        <div class="flex justify-between items-center">
            <!-- left div -->
            <div class="flex space-x-2 justify-center items-center text-start mt-4">
                <div class="bg-slate-200 rounded-full size-10">
                    <img src="https://gravatar.com/creativelystarfish82125b658b" alt="" srcset="">
                </div>
                <div>
                    <div class="text-sm font-bold"> <span class="font-light">Posted by </span>{{ $article->user->name}}</div>
                    <div class="text-xs">{{ $article->created_at->diffForHumans() }}</div>
                </div>
            </div>
            <!-- right div ----Edit articles-->
            <div class="text-sm flex">
                <div>
                    <x-wui-link>
                        <x-wui-mini-button wire:click="$dispatch('openModal', { component: 'livewire.edit-article'})" rounded icon="pencil-square" flat gray interaction="negative" />
                    </x-wui-link>
                </div>
                <div>
                    <x-wui-mini-button rounded icon="trash" flat red interaction="negative" />
                </div>
            </div>
        </div>
    </div>