<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateSettingSocial extends Component
{
    use AuthorizesRequests, Actions;

    public $website_link;
    public $facebook_link;
    public $instagram_link;
    public $twitter_link;

    protected $rules = [
        'website_link' => ['nullable'],
        'facebook_link' => ['nullable'],
        'instagram_link' => ['nullable'],
        'twitter_link' => ['nullable'],
    ];

    public function mount()
    {
        $this->website_link = setting('website_link');
        $this->facebook_link = setting('facebook_link');
        $this->instagram_link = setting('instagram_link');
        $this->twitter_link = setting('twitter_link');
    }

    public function render()
    {
        return view('livewire.setting.update-setting-social');
    }

    public function save(): void
    {
        $this->validate();

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
                'website_link' => $this->website_link,
                'facebook_link' => $this->facebook_link,
                'instagram_link' => $this->instagram_link,
                'twitter_link' => $this->twitter_link,
            ]);

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Refresh the page to see it take effect.'
        );
    }
}
