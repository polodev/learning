<div>
    <form wire:submit.prevent="addComment">
        @foreach ($commentContent as $index => $content)
            <textarea wire:model.defer="commentContent.{{ $index }}"></textarea>
            @error('commentContent.'.$index)
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        @endforeach

        <button type="submit">Add Comment</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>
                {{ $comment->content }}
                <button wire:click="replyToComment({{ $comment->id }}, {{ $loop->index }})">Reply</button>

                @if ($comment->replies->count() > 0)
                    <ul>
                        @foreach ($comment->replies as $reply)
                            <li>{{ $reply->content }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
