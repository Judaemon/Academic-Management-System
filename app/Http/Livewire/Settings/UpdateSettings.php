<?php

namespace App\Http\Livewire\settings;

use App\Models\Setting;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateSettings extends Component
{
    use Actions;

    public Setting $setting;

    protected $rules = [
        'setting.system_name' => ['required'],
        'setting.school_name' => ['required'],
        'setting.logo' => ['required'],
        'setting.address' => ['required'],
        'setting.mobile_1' => ['required'],
        'setting.mobile_2' => ['required'],
        'setting.telephone_1' => ['required'],
    ];

    public function mount()
    {
        $this->setting = Setting::firstOrFail();
    }

    public function render()
    {
        return view('livewire.settings.update-settings');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Youre updating system setting?',
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, saved it',
                'method' => 'submit',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $this->validate();

        $this->setting->save();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Refresh the page to see it take effect.'
        );
    }
}
