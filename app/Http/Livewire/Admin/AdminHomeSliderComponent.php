<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public $slideIdBeginRemoved = null;
    public function deleteSlideOk($slide_id){
        
        $slider = HomeSlider::find($slide_id);
         $slider->delete();
         session()->flash('message','Slider has been deleted sucessfully!');
  
        }

    public function deleteSlide($slide_id){

       // dd($slide_id);
        $this->slideIdBeginRemoved = $slide_id;
        //$this->dispatchBrowserEvent('show-delete-modal');

        /* $slider = HomeSlider::find($slide_id);
        $slider->delete();
        session()->flash('message','Slider has been deleted sucessfully!');
 */    }
    public function render()
    {
        $sliders = HomeSlider::all();

        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
