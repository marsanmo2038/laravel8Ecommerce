<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;


    public function mount() {
        $this->stock_status = 'instock';
        $this->featured = 0 ;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields){
        $this->validateOnly([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price'=> 'required|numeric',
            'sale_price' => 'numeric',
            'SKU'=> 'required',
            'stock_status'=> 'required',
            'quantity'=> 'required|numeric',
            'image'=> 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);

    }

    public function addProduct(){

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price'=> 'required|numeric',
            'sale_price' => 'numeric',
            'SKU'=> 'required',
            'stock_status'=> 'required',
            'quantity'=> 'required|numeric',
            'image'=> 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);
        //dd($this);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','Product has been created successfully!');

        

        
    }


    public function render()
    {
        $categories = Category::paginate(5);
        //dd($categories);

        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
     }
}
