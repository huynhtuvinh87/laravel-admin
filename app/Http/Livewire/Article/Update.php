<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithFileUploads;
use Str;
use App\Models\Category;

class Update extends Component
{
    use WithFileUploads;

    public $article_id;
    public $category_id;
    public $title;
    public $description;
    public $content;
    public $status;
    public $photo = '/img/default-image.png';

    protected $rules = [
        'title' => 'required',
        'content' => 'string',
        'photo' => '',
        'status' => ''
    ];

    public function mount()
    {

        $article = Article::find($this->article_id);
        if ($article->photo)
            $this->photo = $article->photo;
        $this->title = $article->title;
        $this->description = $article->description;
        $this->content = $article->content;
        $this->status = $article->status;
        $this->category_id = $article->category_id;
    }
    public function render()
    {
        $this->dispatchBrowserEvent('load-tinymce');
        $categories = Category::with(['children', 'parent'])->whereNull('parent_id')->orderBy('created_at', 'DESC')->get();

        return view('livewire.article.form', compact('categories'));
    }

    public function save()
    {
        $this->validate();
        $article = Article::find($this->article_id);
        $article->forceFill([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'status' => $this->status,
            'photo' => is_object($this->photo) ? $this->photo->temporaryUrl() : $this->photo
        ])->save();
        $this->dispatchBrowserEvent('updated');
        $this->dispatchBrowserEvent('load-tinymce');
    }
}
