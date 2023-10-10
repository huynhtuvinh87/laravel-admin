<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\WithFileUploads;
use Str;

class Create extends Component
{
    use WithFileUploads;

    public $product_id;
    public $product_category_id;
    public $title;
    public $description;
    public $content;
    public $amount = 000;
    public $amount_sale = 000;
    public $status;
    public $photo = '/img/default-image.png';

    protected $rules = [
        'title' => 'required',
        'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'amount_sale' => 'regex:/^\d+(\.\d{1,2})?$/',
        'content' => '',
        'status' => ''
    ];
    public function render()
    {
        $categories = ProductCategory::with(['children', 'parent'])->whereNull('parent_id')->orderBy('created_at', 'DESC')->get();
        $this->dispatchBrowserEvent('load-tinymce');
        return view('livewire.product.form', compact('categories'));
    }

    public function save(Product $product)
    {
        $this->validate();
        $product->create([
            'product_category_id' => $this->product_category_id,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'amount' => $this->amount,
            'amount_sale' => $this->amount_sale,
            'status' => $this->status ?? 1,
            'photo' => is_object($this->photo) ? $this->photo->temporaryUrl() : null
        ])->save();
        $this->dispatchBrowserEvent('created');
        $this->dispatchBrowserEvent('load-tinymce');
    }
}
