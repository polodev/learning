# June 20, 2023 
Prompt:
Make a livewire comment component which will have nested comments and nested replies with alpine js


~~~html
<livewire:comment :article="$article" />
~~~
Certainly! Here's an example of a Livewire comment component with nested comments and replies, using Alpine.js for the frontend interactions:

First, make sure you have Alpine.js included in your project. You can include it via a CDN or by installing it with npm and compiling it with your build process.

Next, create a Livewire component called CommentComponent using the php artisan make:livewire CommentComponent command. Then, update the generated CommentComponent.php file with the following code:

~~~php
use Livewire\Component;
use App\Models\Comment;

class CommentComponent extends Component
{
    public $postId;
    public $commentContent = [];

    protected $rules = [
        'commentContent.*' => 'required|min:3',
    ];

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        $comments = Comment::where('post_id', $this->postId)
            ->whereNull('parent_id')
            ->with('replies')
            ->get();

        return view('livewire.comment-component', [
            'comments' => $comments,
        ]);
    }

    public function addComment()
    {
        $this->validate();

        foreach ($this->commentContent as $index => $content) {
            Comment::create([
                'post_id' => $this->postId,
                'content' => $content,
                'parent_id' => null,
            ]);
        }

        $this->reset(['commentContent']);
    }

    public function replyToComment($commentId, $index)
    {
        $comment = Comment::find($commentId);

        $comment->replies()->create([
            'post_id' => $this->postId,
            'content' => $this->commentContent[$index],
        ]);

        $this->reset(['commentContent']);
    }
}
~~~

Next, update the comment-component.blade.php view file with the following code:

~~~html
<div x-data="{ openReply: [] }">
    <form wire:submit.prevent="addComment">
        <template x-for="(comment, index) in commentContent" :key="index">
            <textarea x-model="commentContent[index]"></textarea>
            @error('commentContent.' + index)
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </template>

        <button type="submit">Add Comment</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>
                <div>
                    {{ $comment->content }}
                    <button @click="openReply[{{ $comment->id }}] = !openReply[{{ $comment->id }}]">Reply</button>
                </div>

                <template x-if="openReply[{{ $comment->id }}]">
                    <div>
                        <textarea x-model="commentContent[{{ $comment->id }}]"></textarea>
                        @error('commentContent.' . $comment->id)
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <button @click="submitReply({{ $comment->id }})">Submit Reply</button>
                    </div>
                </template>

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

@push('scripts')
<script>
    function commentComponent() {
        return {
            commentContent: {},
            openReply: [],

            submitReply(commentId) {
                Livewire.emit('replyToComment', commentId, this.commentContent[commentId]);
                this.commentContent[commentId] = '';
                this.openReply[commentId] = false;
            }
        };
    }
</script>
@endpush
~~~

In this example, the CommentComponent handles the rendering of comments and replies. Alpine.js is used to manage the state for opening/closing reply sections and storing the content of each comment and reply textarea.      

Make sure to include the Alpine.js script and Livewire scripts in your view or layout file. Additionally, include @livewireStyles and @livewireScripts to enable Livewire functionality.

Please note that this is a basic example, and you may need to modify the code based on your specific requirements and styling.







