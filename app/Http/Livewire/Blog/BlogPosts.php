<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Comment;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class BlogPosts extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $post_id, $post_user_name, $post_user_image,$post_user_id,$post_created_at = false;
    public $title, $description, $cover_image, $user_id = false;
    public $updateMode, $showAddModal, $showPostModel= false;
    public $likes, $dislikes, $comments, $theCommentCount = false;
    public $writeComment,$allComments;
    private $posts;

    public function render()
    {
        $this->posts = Post::orderBy('created_at', 'DESC')->get();
        return view('livewire.blog.blog-posts', ['posts' => $this->posts]);
    }

    public function showAddModel()
    {
        $this->showAddModal = true;
    }

    public function closeAddModal()
    {
        $this->showAddModal = false;
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'image|max:5120', // 1MB Max
        ]);

        $imageName = null;
        if ($this->cover_image) {

            $imageName = md5($this->cover_image . microtime()) . '.' . $this->cover_image->extension();
            Storage::disk('upload_image_website')->put('blog/'.$imageName, file_get_contents($this->cover_image->getRealPath()));
        }

        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'cover_image' => $imageName,
            'user_id' => auth()->id(),
        ]);

        $this->resetInputFields();
        $this->emit('postAdded');

        $this->reset(['title', 'description', 'cover_image']);
        $this->emit('closeModal');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->post_user_id = $post->user_id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->cover_image = $post->cover_image;
        $this->post_user_name = $post->userPost->name;
        $this->post_created_at = $post->created_at;
        $this->post_user_image = $post->image ? $post->image->filename:"default.png";
        $this->theCommentCount = Comment::where('post_id',$this->post_id)->count();
        $this->showPostModel = true;
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->cover_image = $post->cover_image;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'image|max:5120', // 5MB Max
        ]);

        $post = Post::find($this->post_id);

        // Delete the last cover image if it exists
        if ($post->cover_image) {
            Storage::disk('upload_image_website')->delete('blog/' . $post->cover_image);
        }

        if ($this->cover_image) {
            // Upload the new cover image
            $imageName = md5($this->cover_image . microtime()) . '.' . $this->cover_image->extension();
            Storage::disk('upload_image_website')->put('blog/' . $imageName, file_get_contents($this->cover_image->getRealPath()));
            $this->cover_image = $imageName;
        }

        $post->update([
            'title' => $this->title,
            'description' => $this->description,
            'cover_image' => $this->cover_image,
        ]);

        $this->resetInputFields();
        $this->updateMode = false;
    }


    public function delete($id)
    {
        // delete the cover image first
        $cover_image = Post::find($id)->cover_image;
        Storage::disk('upload_image_website')->delete('blog/'.$cover_image);

        Post::find($id)->delete();
        $this->emit('postDeleted');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->cover_image = '';
    }

    public function showComments(){
        $this->comments = true;
        $this->allComments = Comment::where('post_id',$this->post_id)->get();
    }

    public function hiddComments(){
        $this->comments = false;
    }

    public function addComment(){

        $this->validate([
            'writeComment' => 'required',
        ]);

        Comment::create([
            'post_id' => $this->post_id,
            'content' => $this->writeComment,
            'user_id' => auth()->id(),
        ]);

        $this->writeComment = '';
        $this->allComments = Comment::where('post_id',$this->post_id)->get();

    }
}
