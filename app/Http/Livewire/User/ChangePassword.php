<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ChangePassword extends ModalComponent
{
    use AuthorizesRequests, Actions;

    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    protected function rules()
    {
        return [
            #Match current password
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($this->current_password, auth()->user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => [
                'required',
                'min:8',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'confirmed',
            ],
        ];
    }

    protected function messages()
    {
        return [
            'regex' => 'Password must contain at least one digit, one lowercase letter, and one uppercase letter.'
        ];
    }

    public function render()
    {
        return view('livewire.user.change-password');
    }

    public function save(): void
    {
        $this->validate();

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
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
        $this->authorize('change_password');

        $this->emit('refreshDatatable');

        $user = Auth::user();

        $user->password = Hash::make($this->new_password);
        $user->password_changed_at = Carbon::now();

        $user->save();

        $this->closeModal();

        $this->dialog()->success(
            $title = 'Successful!',
            $description = 'Password changed successfully!.'
        );
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
