<div>
    <x-button primary onclick="$openModal('modalCreate')" label="CREATE SCHOOL FEE " />
  
    <x-modal wire:model.defer="modalCreate" max-width="2xl">
        <x-card title="CREATE FEE">
            <div class="grid grid-cols-1 gap-4">
                <div class="col-span-4">
                    <x-input 
                      wire:model.defer="fee_name" 
                      label="Fee Name" 
                      placeholder="e.g.Tuition Fee, Miscellaneous Fee" 
                    />
                </div>

                <div class="col-span-4">
                    <x-inputs.currency 
                      label="Fee Amount" 
                      placeholder="e.g.20000" 
                      wire:model.defer="amount" 
                    />
                </div>

                <div class="col-span-4">
                    <x-native-select 
                      label="Select Academic Year" 
                      wire:model.defer="academic_year_id"
                    >
                        <option 
                          class="text-gray-300" 
                          selected
                        >
                            <--- Select Academic Year --->
                        </option>
                        @foreach ($academic_years as $academic_year)
                            <option value="{{ $academic_year->id }}">
                              {{ date('Y', strtotime($academic_year->start_year)) }} - {{ date('Y', strtotime($academic_year->end_year)) }}
                            </option>
                        @endforeach
                    </x-native-select>
                </div>

                {{-- <div class="col-span-4">
                    <x-native-select 
                      label="Select Grade Level" 
                      wire:model.defer="grade_level_id"
                    >
                        <option 
                          class="text-gray-300" 
                          selected
                        >
                            <--- Select Grade Level --->
                        </option>
                        @foreach ($grade_levels as $grade_level)
                            <option value="{{ $grade_level->id }}">{{ $grade_level->??? }}</option>
                        @endforeach
                    </x-native-select>
                </div> --}}
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button 
                      flat 
                      label="Cancel" 
                      wire:click="closeModal" 
                      type="button"
                    />

                    <x-button 
                      wire:click="save" 
                      type="button" 
                      primary 
                      label="Save" 
                    />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>