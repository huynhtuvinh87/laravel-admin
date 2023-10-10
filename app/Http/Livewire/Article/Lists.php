<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithFileUploads;

class Lists extends Component
{
    use WithFileUploads;

    public $article_id;

    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];
    public function render()
    {

        $articles = Article::orderBy('created_at', 'DESC')->paginate(10);
        $this->dispatchBrowserEvent('load-tinymce');

        return view('livewire.article.list', compact('articles'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function deleteConfirmation($id)
    {
        $this->article_id = $id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function delete(Article $model)
    {
        $model->find($this->article_id)->delete();
        $this->dispatchBrowserEvent('deleted');
    }
}
