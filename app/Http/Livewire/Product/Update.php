<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Str;
use App\Models\ProductCategory;

class Update extends Component
{
    use WithFileUploads;

    public $product_id;
    public $product_category_id;
    public $title;
    public $description;
    public $content;
    public $amount;
    public $amount_sale;
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

        $product = Product::find($this->product_id);
        if ($product->photo)
            $this->photo = $product->photo;
        $this->title = $product->title;
        $this->content = $product->content;
        $this->amount = $product->amount;
        $this->amount_sale = $product->amount_sale;
        $this->status = $product->status;
        $this->product_category_id = $product->product_category_id;
    }
    public function render()
    {
        $this->dispatchBrowserEvent('load-tinymce');
        $categories = ProductCategory::with(['children', 'parent'])->whereNull('parent_id')->orderBy('created_at', 'DESC')->get();

        return view('livewire.product.form', compact('categories'));
    }

    public function save()
    {
        $this->validate();
        $product = Product::find($this->product_id);
        $product->forceFill([
            'product_category_id' => $this->product_category_id,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'content' => $this->content,
            'amount' => $this->amount,
            'amount_sale' => $this->amount_sale,
            'status' => $this->status,
            'photo' => is_object($this->photo) ? $this->photo->temporaryUrl() : $this->photo
        ])->save();
        $this->dispatchBrowserEvent('updated');
        $this->dispatchBrowserEvent('load-tinymce');
    }
}
