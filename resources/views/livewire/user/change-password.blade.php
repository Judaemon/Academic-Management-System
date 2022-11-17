<div class="container">
    <x-card title="Change Password">
        <form wire:submit.prevent="save">
            @if (empty(Auth::user()->password_changed_at))
                <div class="mb-4">
                    <h1>Hello, {{ auth()->user()->first_name }} you still have the default password.
                        <br> Please update your password immediately.
                    </h1>
                </div>
            @endif

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-inputs.password wire:model.defer="current_password" label="Old password"
                        placeholder="Type your old password here" />
                </div>

                <div class="col-span-12">
                    <x-inputs.password wire:model.defer="new_password" label="New password"
                        placeholder="Type your new password here" />

                </div>

                <div class="col-span-12">
                    <x-inputs.password wire:model.defer="new_password_confirmation" label="Confirm password"
                        placeholder="Confirm your new password here" />
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Skip" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="submit" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>
