<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;


class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;
   // public $comments;
    public $ticketId = 1;

    public function mount()
    {
        // $initialcomments = Comment::latest()->get();
        // $this->comments = $initialcomments;
    }
    // protected $listeners = [
    //     'ticketSelected',
    // ];

    // public function ticketSelected($ticketId)
    // {
    //     $this->ticketId = $ticketId;
    // }

    public function showPost($id){
        $this->ticketId = $id;

      }


    #[Validate('required|min:3')]
    public $comment = '';

    #[Validate('image|max:1024')]
    public $image = '';

    public function addComment(){
        $validated = $this->validate();
       $file_content = $this->image;
       $image = Storage::disk('public')->put('livewire-tmp', $file_content);
        Comment::create([
            'body' => $this->comment,
            'image' => $image,
            'support_ticket_id' => $this->ticketId,
            'user_id'=> 1,
            'date_post' => \Carbon\Carbon::now(),
            'created_by' => 'Maria toledo',

        ]);
        session()->flash('message', 'Comment added successfully');
        return $this->redirect('/');
        // return redirect()->to('/');
        $this->comment = '';

    }



    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        Storage::disk('public')->delete('livewire-tmp', $comment->image);
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully');
        // return redirect()->to('/');
    }

    public function render()
    {

        return view('livewire.comments',
       [
        'comments' => Comment::latest()->paginate(3),
       ])->layout('livewire.home');
    }
}
