<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Str;

class Categories extends Component
{

    public $form = false;
    public $category_id;
    public $parent_id;
    public $title;
    public $slug;

    public $status;
    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];

    protected $rules = [
        'title' => 'required',
        'parent_id' => '',
        'status' => ''
    ];
    public function render()
    {
        $categories = Category::with(['children', 'parent'])->whereNull('parent_id')->orderBy('created_at', 'DESC')->get();
        $parents = Category::select('id', 'title')->whereNull('parent_id')->get();

        return view('livewire.categories', compact('categories', 'parents'));
    }

    public function switch($type)
    {
        if ($type === 1) {
            $this->form = true;
            $this->resetInput();
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
        $category->parent_id = $data['parent_id'];
        $category->title = $data['title'];
        $category->slug = Str::slug($data['title']);
        $category->status = $data['status'] ?? 1;
        $category->save();
        if (!$this->category_id)
            $this->resetInput();

        $this->dispatchBrowserEvent($event);
    }

    public function resetInput()
    {
        $this->category_id = null;
        $this->parent_id = null;
        $this->title = null;
        $this->slug = null;
        $this->status = 1;
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
