<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use Livewire\WithFileUploads;
use Str;

class Create extends Component
{
    use WithFileUploads;

    public $article_id;
    public $category_id;
    public $title;
    public $description;
    public $content;
    public $status;
    public $photo;

    public function mount()
    {
        $this->photo = '/img/default-image.png';
    }
    protected $rules = [
        'title' => 'required',
        'slug' => 'string',
        'content' => 'string',
        'status' => ''
    ];
    public function render()
    {
        $categories = Category::with(['children', 'parent'])->whereNull('parent_id')->orderBy('created_at', 'DESC')->get();
        $this->dispatchBrowserEvent('load-tinymce');
        return view('livewire.article.form', compact('categories'));
    }

    public function save(Article $article)
    {
        $this->validate();
        $article->forceFill([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'status' => $this->status ?? 1,
            'photo' => is_object($this->photo) ? $this->photo->temporaryUrl() : null
        ])->save();
        $this->dispatchBrowserEvent('created');
        $this->dispatchBrowserEvent('load-tinymce');
    }
}
