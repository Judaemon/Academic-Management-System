<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateSettingContact extends Component
{
    use AuthorizesRequests, Actions;

    public $email;
    public $mobile_1;
    public $mobile_2;
    public $telephone_1;

    protected $rules = [
        'email' => 'email|required',
        'mobile_1' => 'required',
        'mobile_2' => 'required',
        'telephone_1' => 'required',
    ];

    public function mount()
    {
        $this->email = setting('email');
        $this->mobile_1 = setting('mobile_1');
        $this->mobile_2 = setting('mobile_2');
        $this->telephone_1 = setting('telephone_1');
    }

    public function render()
    {
        return view('livewire.setting.update-setting-contact');
    }

    public function save(): void
    {
        $this->validate();
        // dd("qwe");

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "you're updating system setting?",
            'icon'        => 'warning',
            'accept'      => [
                'label'  => 'Yes, save it',
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
        cache()->forget('setting');

        $this->authorize('update_setting');

        $this->validate();

        Setting::query()
            ->where('id', 1)
            ->update([
                'email' => $this->email,
                'mobile_1' => $this->mobile_1,
                'mobile_2' => $this->mobile_2,
                'telephone_1' => $this->telephone_1,
            ]);

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Refresh the page to see it take effect.'
        );
    }
}
