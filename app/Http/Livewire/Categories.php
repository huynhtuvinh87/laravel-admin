<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{

    public $form = false;
    public $category_id;
    public $title;
    public $slug;

    public $status;
    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];

    protected $rules = [
        'title' => 'required',
        'slug' => 'string',
        'status' => ''
    ];
    public function render()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.categories', compact('categories'));
    }

    public function switch($type)
    {
        if ($type === 1) {
            $this->form = true;
            $this->category_id = null;
            $this->title = null;
            $this->slug = null;
            $this->status = 1;
        } else
            $this->form = false;
    }

    public function edit($id)
    {
        $this->form = true;
        $category = Category::find($id);
        $this->category_id = $id;
        $this->title = $category->title;
        $this->slug = $category->slug;
        $this->status = $category->status;
    }

    public function submit(Category $model)
    {
        $data = $this->validate();
        $this->form = false;
        if ($this->category_id) {
            $category = $model->find($this->category_id);
            $event = 'updated';
        } else {
            $category = $model;
            $event = 'created';
        }
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->status = $data['status'];
        $category->save();

        $this->dispatchBrowserEvent($event);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function deleteConfirmation($id, Category $model)
    {
        $this->category_id = $id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function delete(Category $model)
    {
        $model->find($this->category_id)->delete();
        $this->dispatchBrowserEvent('deleted');
    }
}
