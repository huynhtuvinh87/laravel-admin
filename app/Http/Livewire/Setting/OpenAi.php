<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\Setting;

class OpenAi extends Component
{
    public $setting;

    public function mount()
    {
        $this->setting = Setting::first()->toArray();
    }
    public function render()
    {
        return view('livewire.setting.openai');
    }

    public function save(Setting $model)
    {
        $setting = $model->find($this->setting['id']);
        $setting->openai_api_secret_1 = $this->setting['openai_api_secret_1'];
        $setting->openai_api_secret_2 = $this->setting['openai_api_secret_2'];
        $setting->openai_api_secret_3 = $this->setting['openai_api_secret_3'];
        $setting->openai_api_secret_4 = $this->setting['openai_api_secret_4'];
        $setting->openai_api_secret_5 = $this->setting['openai_api_secret_5'];
        $setting->save();

        $this->dispatchBrowserEvent('updated');
    }
}
