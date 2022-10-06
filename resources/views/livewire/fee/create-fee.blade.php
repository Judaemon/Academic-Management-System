<div>
  <x-button primary onclick="$openModal('modalCreate')" label="CREATE SCHOOL FEE " />
  
  <x-modal wire:model.defer="modalCreate" max-width="2xl">
      <x-card title="CREATE SCHOOL FEE">
          <div class="grid grid-cols-1 gap-4">
              <div class="col-span-4">
                  <x-input wire:model.defer="fee.fee_name" label="School Fee Name" placeholder="e.g.Tuition Fee, Miscellaneous Fee" />
              </div>

              <div class="col-span-4">
                  <x-native-select 
                    label="Select Academic Year" 
                    wire:model.defer="fee.academic_year_id"
                  >
                    <option class="text-gray-300" selected><--- Select academic year level ---></option>
                    @foreach ($academic_year as $academic_year)
                        <option value="{{ $academic_year->id }}">{{ $academic_year->year }}</option>
                    @endforeach
                </x-native-select>
              </div>

          </div>

          <x-slot name="footer">
              <div class="flex justify-end gap-x-4">
                  <x-button flat label="Cancel" wire:click="closeModal" />

                  <x-button wire:click="save" type="button" primary label="Save" />
              </div>
          </x-slot>
      </x-card>
  </x-modal>
</div>