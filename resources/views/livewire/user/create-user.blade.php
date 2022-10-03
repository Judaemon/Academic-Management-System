<div>
    <x-button primary onclick="$openModal('modalCreate')" label="CREATE NEW " />
    
    <x-modal wire:model.defer="modalCreate" max-width="5xl">
        <x-card title="Create form">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">
                <!-- personal information -->
                <div class="col-span-12"> 
                    <x-card title="I. PERSONAL INFORMATION">Fill-out the necessary fields. Type N/A if not applicable.</x-card>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.firstname" label="First Name" placeholder="Juan" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.lastname" label="Last Name" placeholder="Dela Cruz" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.middlename" label="Middle Name" placeholder="Cardo" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.suffix" label="Suffix" placeholder="Mr." />
                </div>

                <!-- di ko maayos tong date picker -->
                <div class="col-span-4">
                    <x-datetime-picker wire:model.defer="user.birthdate" label="Birth Date" placeholder="Birth Date" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.birthplace" label="Birth Place" placeholder="Baguio" />
                </div>

                <!-- drop down sana ng mga religions -->
                <div class="col-span-4">
                    <x-input wire:model.defer="user.religion" label="Religion" placeholder="Catholic" />
                </div>

                <!-- drop down din sana pero di ko pa gets -->
                <div class="col-span-4">
                    <x-input wire:model.defer="user.gender" label="Gender" placeholder="Male/Female/Other" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.mothertongue" label="Mother Tongue" placeholder="English" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.nationality" label="Nationality" placeholder="Filipino" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.pwdid" label="PWD ID" placeholder="XXXX0000" />
                </div>

                <!-- physical information -->
                <div class="col-span-12"> 
                    <x-card title="II. PHYSICAL INFORMATION">Fill-out the necessary fields. Type N/A if not applicable.</x-card>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.height" label="Height (in cm)" placeholder="165 cm" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.weight" label="Weight (in kg)" placeholder="70 kg" />
                </div>

                <!-- contact information -->
                <div class="col-span-12"> 
                    <x-card title="III. CONTACT INFORMATION">Fill-out the necessary fields. Type N/A if not applicable.</x-card>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.mobilenumber" label="Contact Number" placeholder="09*********" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.address" label="Address" placeholder="Unit, Street, Barangay, City/Municipality" />
                </div>

                {{-- https://stackoverflow.com/questions/2530/how-do-you-disable-browser-autocomplete-on-web-form-field-input-tags --}}
                <div class="col-span-4">
                    <x-input autocomplete="randomshitparadimagautocomplete" wire:model.defer="user.email" label="Email" placeholder="Doe" />
                </div>

                <!-- educational background -->
                <div class="col-span-12"> 
                    <x-card title="IV. EDUCATIONAL BACKGROUND">Fill-out the necessary fields. Type N/A if not applicable.</x-card>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.school_kinder" label="Kinder" placeholder="School Name" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.school_elementary" label="Elementary" placeholder="School Name" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.school_juniorhigh" label="Junior High School" placeholder="School Name" />
                </div>

                <!-- academic information -->
                <div class="col-span-12"> 
                    <x-card title="V. ACADEMIC INFORMATION">Fill-out the necessary fields. Type N/A if not applicable.</x-card>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.lrn" label="Learner's Reference Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.esc" label="Education Service Contracting (ESC) No." placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.qvr" label="Qualified Vouchers Recipients (QVR)" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.public" label="Public" placeholder="" />
                </div>

                <!-- government beneficiary -->
                <div class="col-span-12"> 
                    <x-card title="VI. GOVERNMENT BENEFICIARY">If yes, please specify. If no, type N/A.</x-card>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.beneficiary" label="Beneficiary" placeholder="" />
                </div>

                <!-- guardian information -->
                <div class="col-span-12"> 
                    <x-card title="VII. GUARDIAN INFORMATION">Fill-out the necessary fields. Type N/A if not applicable.</x-card>
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.guardian_name" label="Guardian Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.guardian_number" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.guardian_occupation" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.guardian_address" label="Address" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.guardian_relationship" label="Relationship" placeholder="" />
                </div>

                <!-- parents information -->
                <div class="col-span-12"> 
                    <x-card title="VIII. PARENTS INFORMATION">Fill-out the necessary fields. Type N/A if not applicable.</x-card>
                </div>

                <div class="col-span-12"> 
                    <x-card>Mother's Information:</x-card>
                </div>
                
                <div class="col-span-4">
                    <x-input wire:model.defer="user.mparent_name" label="Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.mparent_number" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.mparent_occupation" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.mparent_address" label="Address" placeholder="" />
                </div>

                <div class="col-span-12"> 
                    <x-card>Father's Information:</x-card>
                </div>
                <div class="col-span-4">
                    <x-input wire:model.defer="user.fparent_name" label="Full Name" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.fparent_number" label="Contact Number" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.fparent_occupation" label="Occupation" placeholder="" />
                </div>

                <div class="col-span-4">
                    <x-input wire:model.defer="user.fparent_address" label="Address" placeholder="" />
                </div>

                <!-- user password -->
                <div class="col-span-12"> 
                    <x-card title="PASSWORD">Enter User Password</x-card>
                </div>

                <div class="col-span-4">
                    <x-inputs.password  autocomplete="randomshitparadimagautocomplete" wire:model.defer="user.password" label="Password" placeholder="" />
                </div>
                {{-- read link security reason ignore nalang muna --}}
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
