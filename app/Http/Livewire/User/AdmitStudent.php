<?php

namespace App\Http\Livewire\User;

use App\Models\Admission;
use App\Models\GradeLevel;
use App\Models\Program;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Twilio\Rest\Client;

class AdmitStudent extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $suffix;

    public $birth_date;
    public $birth_place;
    public $nationality;
    public $gender;
    public $religion;
    public $mother_tongue;

    public $height;
    public $weight;
    public $pwd_id;

    public $email;
    public $mobile_number;
    public $address;

    // Admission
    public $programs;
    public $program;
    public $isTransferee = false;

    public $grade_levels;
    public $grade_level;

    public $sections;
    public $section;
    // Admission

    public $kinder_name;
    public $kinder_grad_date;

    public $elementary_name;
    public $elementary_grad_date;

    public $junior_high_name;

    public $lrn;
    public $esc;
    public $qvr;

    public $mother_name;
    public $mother_number;
    public $mother_email;
    public $mother_address;

    public $father_name;
    public $father_number;
    public $father_email;
    public $father_address;

    public $emergency_contact_name;
    public $emergency_contact_number;
    public $emergency_contact_address;
    public $emergency_contact_relationship;

    public $password;

    protected function rules()
    {
        return [
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'suffix' => ['nullable'],

            'birth_date' => ['required'],
            'birth_place' => ['required'],
            'nationality' => ['required'],
            'gender' => ['required', 'in:Male,Female'],
            'religion' => ['nullable'],
            'mother_tongue' => ['required'],

            'height' => ['nullable'],
            'weight' => ['nullable'],
            'pwd_id' => ['nullable', 'unique:users,pwd_id'],

            'email' => ['required', 'unique:users,email', 'email'],
            'mobile_number' => ['required', 'unique:users,mobile_number'],
            'address' => ['required'],

            // Admission
            'programs' => ['nullable'],
            'program' => ['required'],

            'isTransferee' => ['nullable'],

            'grade_levels' => ['nullable'],
            'grade_level' => ['nullable', 'required_if:isTransferee,true'],

            'sections' => ['nullable'],
            'section' => ['required'],
            // Admission

            // kinder
            'kinder_name' => ['nullable'],
            'kinder_grad_date' => ['nullable'],

            'elementary_name' => ['nullable'],
            'elementary_grad_date' => ['nullable'],

            'junior_high_name' => ['nullable'],

            'lrn' => ['nullable', 'unique:users,lrn'],
            'esc' => ['nullable', 'unique:users,esc'],
            'qvr' => ['nullable', 'unique:users,qvr'],

            'mother_name' => ['nullable'],
            'mother_number' => ['nullable', 'unique:users,mother_number'],
            'mother_email' => ['nullable', 'email'],
            'mother_address' => ['nullable'],

            'father_name' => ['nullable'],
            'father_number' => ['nullable', 'unique:users,father_number'],
            'father_email' => ['nullable', 'email'],
            'father_address' => ['nullable'],

            'emergency_contact_name' => ['required'],
            'emergency_contact_number' => ['required'],
            'emergency_contact_address' => ['required', 'unique:users,emergency_contact_number'],
            'emergency_contact_relationship' => ['required'],

            'password' => ['nullable'],
        ];
    }

    public function mount()
    {
        $this->programs = Program::query()
            ->where('isEnabled', true)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.admit-student');
    }

    public function updatedProgram($value)
    {
        $this->isTransferee = false;
        $this->grade_level = null;
        $this->section = null;

        if (empty($value)) {
            return;
        }

        $this->program = Program::find($this->program);

        $this->grade_levels = GradeLevel::query()
            ->where('program_id', $this->program->id)
            ->get();

        $this->sections = Section::query()
            ->whereHas('grade_level', function ($query) {
                $query->where('program_id', $this->program->id);
                $query->where('id', $this->program->starting_grade_level_id);
            })
            ->get();
    }

    public function updatedIsTransferee()
    {
        $this->section = null;
        $this->grade_level = null;

        $this->grade_levels = GradeLevel::query()
            ->where('program_id', $this->program->id)
            ->get();

        $this->sections = Section::query()
            ->whereHas('grade_level', function ($query) {
                $query->where('program_id', $this->program->id);
                $query->where('id', $this->program->starting_grade_level_id);
            })
            ->get();
    }

    public function updatedGradeLevel($value)
    {
        $this->section = null;

        $this->sections = Section::query()
            ->whereHas('grade_level', function ($query) use ($value) {
                $query->where('program_id', $this->program->id);
                $query->where('id', $value);
            })
            ->get();
    }

    public function save(): void
    {
        $this->validate();

        // Validation for Educational Background
        if ($this->program->name == 'Kinder') {
            // if transferee
            if ($this->isTransferee) {
                $this->validate([
                    'kinder_name' => 'required',
                    'kinder_grad_date' => 'nullable',
                ]);
            }
        }

        if ($this->program->name == 'Elementary') {
            // required kinder
            // if transferee
            $this->validate([
                'kinder_name' => 'required',
                'kinder_grad_date' => 'nullable',
            ]);

            if ($this->isTransferee) {
                $this->validate([
                    'elementary_name' => 'required',
                    'elementary_grad_date' => 'nullable',
                ]);
            }
        }

        if ($this->program->name == 'Junior High') {
            // required kinder
            $this->validate([
                'kinder_name' => 'required',
                'kinder_grad_date' => 'nullable',
            ]);


            // required elementary
            $this->validate([
                'elementary_name' => 'required',
                'elementary_grad_date' => 'nullable',
            ]);

            // if transferee
            if ($this->isTransferee) {
                $this->validate([
                    'junior_high_name' => 'required',
                ]);
            }
        }
        // Validation for Educational Background

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Create the User?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, create it',
                'method' => 'submit',
                'params' => 'Created',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function submit()
    {
        $this->authorize('create_student');

        if (empty($this->password)) {
            // first_name.first_letter_of_last_name ex. first_name = Sample, last_name = Sample, password = sample.s
            $this->password = strtolower(mb_substr($this->first_name, 0, 1, 'utf-8') . '.' . $this->last_name);
        }

        // dd(
        //     $this->first_name,
        //     $this->middle_name,
        //     $this->last_name,
        //     $this->suffix,

        //     $this->birth_date,
        //     $this->birth_place,
        //     $this->nationality,
        //     $this->gender,
        //     $this->mother_tongue,
        //     $this->religion,

        //     $this->weight,
        //     $this->height,
        //     $this->pwd_id,

        //     $this->suffix,
        //     $this->birth_date,
        //     $this->birth_place,
        //     $this->religion,
        //     $this->gender,
        //     $this->mother_tongue,
        //     $this->nationality,

        //     $this->mobile_number,
        //     $this->email,
        //     $this->address,

        //     $this->kinder_name,
        //     $this->kinder_grad_date,

        //     $this->elementary_name,
        //     $this->elementary_grad_date,

        //     $this->junior_high_name,

        //     $this->lrn,
        //     $this->esc,
        //     $this->qvr,

        //     $this->mother_name,
        //     $this->mother_number,
        //     $this->mother_email,
        //     $this->mother_address,

        //     $this->father_name,
        //     $this->father_number,
        //     $this->father_email,
        //     $this->father_address,

        //     $this->emergency_contact_name,
        //     $this->emergency_contact_relationship,
        //     $this->emergency_contact_number,
        //     $this->emergency_contact_address,

        //     $this->password,

        //     '---------------------',

        //     setting('academic_year_id'),
        //     auth()->id(),
        //     $this->grade_level,
        //     $this->section,
        // );

        // dd("for testing!!!!!!!!!");


        $user = User::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix,

            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'nationality' => $this->nationality,
            'gender' => $this->gender,
            'mother_tongue' => $this->mother_tongue,
            'religion' => $this->religion,

            'weight' => $this->weight,
            'height' => $this->height,
            'pwd_id' => $this->pwd_id,

            'suffix' => $this->suffix,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'religion' => $this->religion,
            'gender' => $this->gender,
            'mother_tongue' => $this->mother_tongue,
            'nationality' => $this->nationality,

            'mobile_number' => $this->mobile_number,
            'email' => $this->email,
            'address' => $this->address,

            // educational background
            'kinder_name' => $this->kinder_name,
            'kinder_grad_date' => $this->kinder_grad_date,

            'elementary_name' => $this->elementary_name,
            'elementary_grad_date' => $this->elementary_grad_date,

            'junior_high_name' => $this->junior_high_name,

            'lrn' => $this->lrn,
            'esc' => $this->esc,
            'qvr' => $this->qvr,

            'mother_name' => $this->mother_name,
            'mother_number' => $this->mother_number,
            'mother_email' => $this->mother_email,
            'mother_address' => $this->mother_address,

            'father_name' => $this->father_name,
            'father_number' => $this->father_number,
            'father_email' => $this->father_email,
            'father_address' => $this->father_address,

            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_relationship' => $this->emergency_contact_relationship,
            'emergency_contact_number' => $this->emergency_contact_number,
            'emergency_contact_address' => $this->emergency_contact_address,

            'password' => Hash::make($this->password),
        ]);

        // Granting the Student role to the newly created user
        $user->assignRole('Student');
        $this->sendMessage('Account registration successful!', '+63 976 054 2645');
        // if isTransferee == false
        if ($this->isTransferee == false) {
            $this->grade_level = $this->program->starting_grade_level_id;
        }

        // Creating admission
        Admission::create([
            'status' => 'Pending',
            'academic_year_id' => setting('academic_year_id'),

            'student_id' => $user->id,
            'enrolled_by' => auth()->id(),
            'admit_to_grade_level' => $this->grade_level,
            'section_id' => $this->section,
        ]);

        $this->sendMessage('Your Admission has been recorded!', '+63 976 054 2645');

        $this->closeModal();

        $this->emit('refreshDatatable');

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'User successfully Created.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
    }
}
