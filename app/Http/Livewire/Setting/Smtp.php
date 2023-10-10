<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;
use App\Models\Setting;

class Smtp extends Component
{
    public $setting;

    public function mount()
    {
        $this->setting = Setting::first()->toArray();
    }
    public function render()
    {
        return view('livewire.setting.smtp');
    }

    public function save(Setting $model)
    {
        $setting = $model->find($this->setting['id']);
        $setting->smtp_host = $this->setting['smtp_host'];
        $setting->smtp_port = $this->setting['smtp_port'];
        $setting->smtp_username = $this->setting['smtp_username'];
        $setting->smtp_password = $this->setting['smtp_password'];
        $setting->smtp_email = $this->setting['smtp_email'];
        $setting->smtp_sender_name = $this->setting['smtp_sender_name'];
        $setting->smtp_encryption = $this->setting['smtp_encryption'];
        $setting->save();

        $this->dispatchBrowserEvent('updated');
    }
}
