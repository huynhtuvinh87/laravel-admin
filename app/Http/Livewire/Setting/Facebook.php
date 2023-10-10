<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\Setting;

class Facebook extends Component
{
    public $setting;
    public $logo;

    public function mount()
    {
        $this->setting = Setting::first()->toArray();
    }
    public function render()
    {
        return view('livewire.setting.facebook');
    }

    public function save(Setting $model)
    {
        $setting = $model->find($this->setting['id']);
        $setting->facebook_active = $this->setting['facebook_active'];
        $setting->facebook_api_key = $this->setting['facebook_api_key'];
        $setting->facebook_api_secret = $this->setting['facebook_api_secret'];
        $setting->facebook_redirect_url = $this->setting['facebook_redirect_url'];
        $setting->save();

        $this->dispatchBrowserEvent('updated');
    }
}
