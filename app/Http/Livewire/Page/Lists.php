<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use App\Models\Page;
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
        $pages = Page::orderBy('created_at', 'DESC')->paginate(10);
        $this->dispatchBrowserEvent('load-tinymce');

        return view('livewire.page.list', compact('pages'));
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

    public function delete(Page $model)
    {
        $model->find($this->article_id)->delete();
        $this->dispatchBrowserEvent('deleted');
    }
}
