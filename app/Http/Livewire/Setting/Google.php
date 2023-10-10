<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\Setting;

class Google extends Component
{
    public $setting;

    public function mount()
    {
        $this->setting = Setting::first()->toArray();
    }
    public function render()
    {
        return view('livewire.setting.google');
    }

    public function save(Setting $model)
    {
        $setting = $model->find($this->setting['id']);
        $setting->google_active = $this->setting['google_active'];
        $setting->google_api_key = $this->setting['google_api_key'];
        $setting->google_api_secret = $this->setting['google_api_secret'];
        $setting->google_redirect_url = $this->setting['google_redirect_url'];
        $setting->save();

        $this->dispatchBrowserEvent('updated');
    }
}
