<div>
    <h1>Comments ({{ $comments->count()}})</h1>
    @auth
        <form wire:submit="createComment" class="mt-4">
            <div>
                <x-textarea wire:model="form.body" placeholder="post a comment" class="w-full" rows="4" />
                <x-input-error for="form.body" />
            </div>
            <x-button class="mt-2">
                Post a comment
            </x-button>
        </form>
    @endauth
    @if($comments->count())
        <div class="mt-8 px-6">
            @foreach($comments as $comment)
                <div wire:key="{{ $comment->id }}" class="border-b border-gray-100 last:border-b-0 p-2">
                <livewire:comment-item  :comment="$comment" :key="$comment->id" />
                </div>
            @endforeach
        </div>
    @endif
</div>
