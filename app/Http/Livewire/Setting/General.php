<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;

class General extends Component
{
    use WithFileUploads;
    public $setting;
    public $logo;

    public function mount()
    {
        $this->setting = Setting::first()->toArray();
    }
    public function render()
    {
        return view('livewire.setting.general');
    }

    public function save(Setting $model)
    {
        $this->validate([
            'setting.site_name' => 'required'
        ]);
        $setting = $model->find($this->setting['id']);
        $setting->site_name = $this->setting['site_name'];
        $setting->site_url = $this->setting['site_url'];
        $setting->site_email = $this->setting['site_email'];
        $setting->logo = is_object($this->logo) ? $this->logo->temporaryUrl() : null;
        $setting->meta_title = $this->setting['meta_title'];
        $setting->meta_description = $this->setting['meta_description'];
        $setting->google_analytics_active = $this->setting['google_analytics_active'];
        $setting->google_analytics_code = $this->setting['google_analytics_code'];
        $setting->save();

        $this->dispatchBrowserEvent('updated');
    }
}