<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use App\Models\Page;
use Livewire\WithFileUploads;
use Str;

class Create extends Component
{
    use WithFileUploads;

    public $page_id;
    public $title;
    public $content;
    public $description;
    public $status;
    public $photo = '/img/default-image.png';

    protected $rules = [
        'title' => 'required',
        'content' => 'string',
        'description' => 'string',
        'status' => ''
    ];
    public function render()
    {
        $this->dispatchBrowserEvent('load-tinymce');
        return view('livewire.Page.form');
    }

    public function save(Page $page)
    {
        $this->validate();
        $page->forceFill([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'description' => $this->description,
            'status' => $this->status ?? 1,
            'photo' => $this->photo ? $this->photo->temporaryUrl() : ''
        ])->save();
        $this->dispatchBrowserEvent('created');
        $this->dispatchBrowserEvent('load-tinymce');
    }
}
