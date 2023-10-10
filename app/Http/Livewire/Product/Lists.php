<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
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

        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        $this->dispatchBrowserEvent('load-tinymce');

        return view('livewire.product.list', compact('products'));
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

    public function delete(Product $model)
    {
        $model->find($this->article_id)->delete();
        $this->dispatchBrowserEvent('deleted');
    }
}
