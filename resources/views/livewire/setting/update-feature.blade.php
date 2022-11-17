<div class="container mt-4">
    <div class="lg:flex">
        <div class="mb-2 lg:w-1/3 lg:pr-4">
            <h2 class="text-lg font-medium text-text">Features</h2>
            <p class="text-sm text-text">Set preferences for features of the system.
        </div>

        <div class="bg-bg p-4 lg:w-2/3 rounded-md">
            <div class="grid grid-cols-6">
                <div class="col-span-6 md:col-span-4">
                    <div class="max-w-xl text-sm mb-4">
                        <label for="notify_grades" class="inline-flex">
                            <x-checkbox wire:model.defer="notify_grades" />
                            <label class="ml-2 text-text block text-sm font-medium mb-1">Notify Grades</label>
                        </label>
                        <div class="pl-6 mt-0 max-w-xl text-sm text-text">
                            Send notification to students if the grades are already posted through either by email or
                            sms, or by both.
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <div class="inline-flex">
                            <x-checkbox id="notify_payments" wire:model.defer="notify_payments" />
                            <label class="ml-2 text-text block text-sm font-medium mb-1">Notify Payments</label>
                        </div>
                        <div class="pl-6 mt-0 max-w-xl text-sm text-text">
                            Send notification if the payments are confirmed or refunded through either by email or sms,
                            or by both.
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Select notification channel</label>
                        <div>
                            <x-select placeholder="Select one notification channel" :options="['Email', 'SMS', 'Email and SMS']"
                                wire:model.defer="notification_channel" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Select current grading quarter</label>
                        <div>
                            <x-select placeholder="Select current grading quarter" :options="['First quarter', 'Second quarter', 'Third quarter', 'Fourth quarter']"
                                wire:model.defer="current_quarter" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <div class="inline-flex">
                            <x-checkbox id="isAbleToUploadGrade" wire:model.defer="isAbleToUploadGrade" />
                            <label class="ml-2 text-text block text-sm font-medium mb-1">Enable uploading of
                                grades</label>
                        </div>
                        <div class="pl-6 mt-0 max-w-xl text-sm text-text">
                            Allow teacher to upload grades.
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Programs offered</label>
                        <div class="flex space-x-4">
                            <div class="inline-flex">
                                <x-checkbox id="programs" value="1" wire:model.defer="programs" />
                                <label class="ml-2 text-text block text-sm font-medium mb-1">Kinder</label>
                            </div>
                            <div class="inline-flex">
                                <x-checkbox id="programs" value="2" wire:model.defer="programs" />
                                <label class="ml-2 text-text block text-sm font-medium mb-1">Elementary</label>
                            </div>
                            <div class="inline-flex">
                                <x-checkbox id="programs" value="3" wire:model.defer="programs" />
                                <label class="ml-2 text-text block text-sm font-medium mb-1">Junior high</label>
                            </div>
                        </div>
                        <div class="pl-6 mt-0 max-w-xl text-sm text-text">
                            Set available programs that will be offered.
                        </div>
                        @error($programs)
                            <p class="mt-2 text-sm text-negative-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-span-12 flex justify-end">
                <x-button wire:click="save" type="button" icon="shield-check" negative label="Save" />
            </div>
        </div>
    </div>
</div>
