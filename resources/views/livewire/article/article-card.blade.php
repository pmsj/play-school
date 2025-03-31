<div class="my-5">
    @if (!$articleDeleted)
    <div class="bg-cardBackground3 rounded-2xl border">
        <a href="{{ route('show.article', $article->slug)}}">
            <div class="h-28 w-full object-contain rounded-t-2xl overflow-hidden  max-w-7xl">

                @if ($article->getFirstMediaUrl('articles'))
                <img src="{{ $article->getFirstMediaUrl('articles') }}" alt="{{ $article->title }}" class="w-full h-auto">
                @endif
            </div>
            <!-- all tags -->
            <livewire:tags />
            <div class="text-xl font-extrabold hover:underline hover:text-primary ml-5">{{ $article->title }}</div>
        </a>

        <div class="space-y-2 p-5  text-textColor">
            <div class="text-textColor">{{ $article->truncatedBody() }}
                <x-wui-button href="{{ route('show.article', $article->slug) }}" outline xs label="Read more" class="ml-1 hover:bg-secondary hover:text-white border-primary" />
            </div>
            <!-- user infos -->
            <div class="flex justify-between items-center">
                <!-- left div -->
                <div class="flex space-x-2 justify-center items-center text-start mt-4">
                    <div class="bg-slate-200 h-8 w-8">
                        <img src="{{ $article->user->profile_photo_url }}" alt="" srcset="" class="rounded-full">
                    </div>
                    <div>
                        <div class="text-sm font-bold"> <span class="font-light">Posted by </span>{{ $article->user->name}}</div>
                        <div class="text-xs">{{ $article->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                <!-- right div ----Edit articles-->
                <div class="text-sm flex">
                    @can('view', $article)
                    <x-wui-dropdown>
                        <x-wui-dropdown.header label="Options">
                            @can('update', $article)
                            <x-wui-dropdown.item icon="pencil-square" label="Edit" href="{{ route('edit.article', $article->slug) }}" class="text-secondary hover:bg-secondary hover:text-white" />
                            @endcan
                            @can('delete', $article)
                            <x-wui-dropdown.item x-on:click="if (window.confirm('Are you sure?')) { $wire.deleteArticle() }" icon="trash" label="Delete" class="hover:bg-secondary text-rose hover:text-white" />
                            @endcan
                        </x-wui-dropdown.header>
                    </x-wui-dropdown>
                    @endcan
                </div>
            </div>
        </div>
    @endif
</div>