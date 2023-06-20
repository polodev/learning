<?php
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
