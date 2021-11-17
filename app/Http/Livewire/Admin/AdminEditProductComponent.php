<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminEditProductComponent extends Component
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

    public $newimage;
    public $product_id;

    //public $product_slug;

    public function mount($product_slug){
        $this->slug = $product_slug;
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;

        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;

    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price'=> 'required|numeric',
            'sale_price' => 'numeric',
            'SKU'=> 'required',
            'stock_status'=> 'required',
            'quantity'=> 'required|numeric',
            'newimage'=> 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);

    }

    public function updateProduct()
    {

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
            'newimage'=> 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);
        
        $product = Product::where('slug', $product_slug)->first();

        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        if($this->newimage){
         $imageName = Carbon::now()->timestamp.'.'.$product->image->extension();
        $this->image->storeAs('products',$imageName); 
        $this->image = $imageName;
        }
        $this->category_id = $product->category_id;
        $this->save();
        session()->flash('message','Product has been created successfully!');

        
    }


    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }



    public function render()
    {
        $categories = Category::paginate(5);
        //dd($categories);

        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.base');

    }
}
