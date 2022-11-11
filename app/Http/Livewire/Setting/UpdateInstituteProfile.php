<?php

namespace App\Http\Livewire\Setting;

use App\Models\AcademicYear;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class UpdateInstituteProfile extends Component
{
    use AuthorizesRequests, Actions, WithFileUploads;

    public $institute_name;
    public $institute_acronym;
    public $logo;
    public $address;
    public $academic_year;

    public $academic_years;

    protected $rules = [
        'institute_name' => 'required',
        'institute_acronym' => 'required',
        'logo' => 'sometimes|nullable|image|max:2048', // 2MB Max
        'address' => 'required',
        'academic_year' => 'required',
    ];

    public function mount()
    {
        $this->institute_name = setting('institute_name');
        $this->institute_acronym = setting('institute_acronym');
        // $this->logo = setting('logo'); // because it will only get the path for the image not the actual image
        $this->address = setting('address');
        $this->academic_year = (string) setting('academic_year_id');

        $this->academic_years = AcademicYear::orderBy('id', 'desc')->take(5)->get();
    }

    public function render()
    {
        return view('livewire.setting.update-institute-profile');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "You are changing the institute profile.",
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
                'institute_name' => $this->institute_name,
                'institute_acronym' => $this->institute_acronym,
                'address' => $this->address,
                'academic_year_id' => $this->academic_year,
            ]);

        if (!empty($this->logo)) {
            $logo_name = $this->logo->store('images/system');

            Setting::query()
                ->where('id', 1)
                ->update([
                    'logo' => $logo_name,
                ]);
        }

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Refresh the page to see it take effect.'
        );
    }
}
