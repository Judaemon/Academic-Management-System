<?php

namespace App\Http\Livewire\Settings;

use App\Models\AcademicYear;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class UpdateSettings extends Component
{
    use AuthorizesRequests, Actions, WithFileUploads;

    public $setting;
    public $academic_years;
    public $logo;

    protected $rules = [
        'logo' => 'image|max:1024', // 1MB Max

        'setting.institute_name' => ['required'],
        'setting.institute_acronym' => ['required'],
        'setting.logo' => ['required'],
        'setting.address' => ['required'],
        'setting.academic_year_id' => ['required'],

        'setting.theme_color' => ['nullable'],
        'setting.theme_background' => ['nullable'],

        'setting.profile_editing' => ['nullable'],
        'setting.notify_grades' => ['nullable'],
        'setting.notify_payments' => ['nullable'],
        'setting.notification_type' => ['nullable'],

        'setting.email' => ['required'],
        'setting.mobile_1' => ['required'],
        'setting.mobile_2' => ['required'],
        'setting.telephone_1' => ['required'],

        'setting.website_link' => ['nullable'],
        'setting.facebook_link' => ['nullable'],
        'setting.instagram_link' => ['nullable'],
        'setting.twitter_link' => ['nullable'],
    ];

    public function mount()
    {
        $this->setting = Setting::firstOrFail();
        $this->logo = $this->setting->logo;
        $this->setting->academic_year_id = (string)$this->setting->academic_year_id;
        $this->academic_years = AcademicYear::orderBy('id', 'desc')->take(5)->get();
    }

    public function render()
    {
        return view('livewire.settings.update-settings');
    }

    public function save(): void
    {
        // $this->logo->store('images/system');

        // dd($this->setting->logo, $this->logo);
        // $this->validate();

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

        $this->setting->save();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Refresh the page to see it take effect.'
        );
    }
}
