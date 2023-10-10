<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use App\Models\Page;
use Livewire\WithFileUploads;
use Str;

class Update extends Component
{
    use WithFileUploads;

    public $page_id;
    public $title;
    public $description;
    public $content;
    public $status;
    public $photo = '/img/default-image.png';

    protected $rules = [
        'title' => 'required',
        'slug' => 'string',
        'content' => 'string',
        'description' => 'string',
        'photo' => 'string',
        'status' => ''
    ];

    public function mount()
    {
        $page = Page::find($this->page_id);
        if ($page->photo)
            $this->photo = $page->photo;
        $this->title = $page->title;
        $this->content = $page->content;
        $this->description = $page->description;
        $this->status = $page->status;
    }
    public function render()
    {
        $this->dispatchBrowserEvent('load-tinymce');


        return view('livewire.page.form');
    }

    public function save()
    {
        $this->validate();
        $page = Page::find($this->page_id);
        $page->forceFill([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'content' => $this->content,
            'status' => $this->status,
            'photo' => is_object($this->photo) ? $this->photo->temporaryUrl() : $this->photo
        ])->save();
        $this->dispatchBrowserEvent('updated');
        $this->dispatchBrowserEvent('load-tinymce');
    }
}
