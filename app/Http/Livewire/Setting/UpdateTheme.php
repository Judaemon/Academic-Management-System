<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;

class UpdateTheme extends Component
{
    use AuthorizesRequests, Actions;

    public $color;
    public $background;

    protected $rules = [
        'color' => 'required',
        'background' => 'required',
    ];

    protected $messages = [
        'color.required' => 'The color field is required.',
        'background.required' => 'The background field is required.',
    ];

    public function mount()
    {
        $this->color = setting('theme_color');
        $this->background = setting('theme_background');
    }

    public function render()
    {
        return view('livewire.setting.update-theme');
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
                'theme_color' => $this->color,
                'theme_background' => $this->background,
            ]);

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Refresh the page to see it take effect.'
        );
    }
}
