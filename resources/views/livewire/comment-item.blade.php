<div class="">
    @if (!$deleted)
    <div 
    class="my-6"
    x-data="{ replying: false, editing:false }"
    x-on:replied.window="replying = false"
    x-on:edited.window="editing = false"

    >
    <div class="flex items-center space-x-2">
        <img src="{{ $comment->user->profile_photo_url }}" alt="photo" class="bg-black rounded-full size-8">
        <div class="font-semibold text-sm lg:text-base">{{ $comment->user->name }}</span></div>
        <div class="text-xs md:text-sm" x-human-date datetime="{{ $comment->created_at->toDateTimeString() }}" >{{ $comment->created_at->diffForHumans() }}</div>
    </div>
    @can('edit', $comment)
        <template x-if="editing">
        <form  wire:submit="edit" class="mt-4">
                <div>
                    <x-textarea  wire:model="editForm.body"  class="w-full" rows="4" />
                    <x-input-error for="editForm.body" />
                </div>
                <div class="flex items-baseline space-x-2">
                    <x-button class="mt-2">
                        Edit
                    </x-button>
                    <button x-on:click="editing = false" class="text-sm text-gray-500">
                        Cancel
                    </button>
                </div>
            </form>
        </template>
    @endcan
   <div class="mt-4" x-show="!editing">
        {{ $comment->body }}
   </div>
   <div class="mt-6 text-sm flex items-center space-x-3">
        @can('reply', $comment)
            <button x-on:click="replying = true" class="text-gray-500">Reply</button>
        @endcan
        @can('edit', $comment)
            <button x-on:click="editing = true" class="text-gray-500">Edit</button>
        @endcan
        @can('delete', $comment)
            <button class="text-gray-500" x-on:click="if (window.confirm('Are you sure?')) { $wire.delete() }">Delete</button>
        @endcan
   </div>
   <template x-if="replying">
        <div>
            <!-- reply form -->
            <form  wire:submit="reply" class="mt-4">
                <div>
                    <x-textarea  wire:model="replyForm.body" placeholder="Reply to {{ $comment->user->name }}" class="w-full" rows="4" />
                    <x-input-error for="replyForm.body" />
                </div>
                <div class="flex items-baseline space-x-2">
                    <x-button class="mt-2">
                        Reply
                    </x-button>
                    <button x-on:click="replying = false" class="text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
   </template>
   @if(is_null($comment->parent_id) && $comment->children->count())
        <div class="ml-8 mt-8">
            @foreach($comment->children as $childComment)
                <livewire:comment-item :comment="$childComment" :key="$childComment->id" />
            @endforeach
        </div>
   @endif
</div>
    @endif
</div>
