<div class="container mt-4">
    <div class="lg:flex">
        <div class="mb-2 lg:w-1/3 lg:pr-4">
            <h2 class="text-lg font-medium text-text">Social Medias Sites</h2>
            <p class=" text-sm text-text">Lorem ipsum dolor sit, nobis ea?</p>
        </div>

        <div class="bg-bg p-4 lg:w-2/3 rounded-md">
            <div class="grid grid-cols-6">
                <div class="col-span-6 md:col-span-4">
                    <div class="max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Website</label>
                        <div>
                            <x-input wire:model.defer="website_link" placeholder="website.com" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Facebook</label>
                        <div>
                            <x-input wire:model.defer="facebook_link" placeholder="facebook.com" />

                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Instagram</label>
                        <div>
                            <x-input wire:model.defer="instagram_link" placeholder="instagram.com" />
                        </div>
                    </div>

                    <div class="mt-3 max-w-xl text-sm mb-4">
                        <label class="text-text block text-sm font-medium mb-1">Twitter</label>
                        <div>
                            <x-input wire:model.defer="twitter_link" placeholder="twitter.com" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 flex justify-end">
                <x-button wire:click="save" type="button" icon="shield-check" negative label="Save" />
            </div>
        </div>
    </div>
</div>
