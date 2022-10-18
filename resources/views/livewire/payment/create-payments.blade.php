<div wire:ignore.self>
    <x-card title="Create Payment Record">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-4">
                {{-- <x-select
                  label="Search a User"
                  wire:model.defer="payment.user_id"
                  placeholder="Select User"
                  :async-data="route('api.users')"
                  :template="[
                    'name'   => 'user-option',
                    'config' => ['src' => 'profile_image']
                  ]"
                  option-label="name"
                  option-value="id"
                  option-description="email"
                /> --}}
                  <x-native-select 
                    label="Select User" 
                    wire:model.defer="user_id"
                  >
                      <option class="text-gray-300" selected><--- Select user ---></option>
                      @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                      @endforeach
                  </x-native-select>
                </div>

                <div class="col-span-4">
                    <x-inputs.currency 
                        label="Amount Paid" 
                        placeholder="0.00" 
                        wire:model.defer="amount_paid" 
                    />
                </div>

                <div class="col-span-4">
                    <label>Payment Type</label>
                    <div class="grid">
                        <x-select 
                            label="Options" 
                            placeholder="Select payment"
                            wire:model.defer="fee_id"
                        >
                            @foreach ($fees as $fee)
                                <x-select.option label="{{ $fee->fee_name }}" value="{{ $fee->id }}" />
                            @endforeach
                        </x-select>
                    </div>
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" wire:click="closeModal" />
                    <x-button wire:click.prevent="save" type="button" primary label="Save" />
                </div>
            </x-slot>
        </form>
    </x-card>
</div>