<div class="container mt-4">
    <div class="lg:flex">
        <div class="mb-2 lg:w-1/3 md:pr-4">
            <h2 class="text-lg font-medium text-text">Themes</h2>
            <p class=" text-sm text-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, ea?
            </p>
        </div>
        <div class="bg-bg p-4 lg:w-2/3 rounded-md">
            <div class="grid grid-cols-6">
                <div class="col-span-6 md:col-span-4">
                    <label class="text-text block text-sm font-medium">Color</label>

                    <div class="pl-4 mt-3 max-w-xl text-sm text-gray-600 flex justify-between">
                        <label>
                            <div class="relative">
                                <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    @if ($color == 'color1')
                                        <x-icon name="check" class="w-5 h-5 text-white" />
                                    @endif
                                </div>
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10" fill="#1d9bf0">
                                    <g>
                                        <circle cx="12" cy="12" r="10.3"></circle>
                                    </g>
                                </svg>
                            </div>
                            <input class="hidden" wire:model="color" type="radio" value="color1">
                        </label>

                        <label>
                            <div class="relative">
                                <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    @if ($color == 'color2')
                                        <x-icon name="check" class="w-5 h-5 text-white" />
                                    @endif
                                </div>
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10" fill="#ffd400">
                                    <g>
                                        <circle cx="12" cy="12" r="10.3"></circle>
                                    </g>
                                </svg>
                            </div>
                            <input class="hidden" wire:model="color" type="radio" value="color2">
                        </label>

                        <label>
                            <div class="relative">
                                <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    @if ($color == 'color3')
                                        <x-icon name="check" class="w-5 h-5 text-white" />
                                    @endif
                                </div>
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10" fill="#f91880">
                                    <g>
                                        <circle cx="12" cy="12" r="10.3"></circle>
                                    </g>
                                </svg>
                            </div>
                            <input class="hidden" wire:model="color" type="radio" value="color3">
                        </label>

                        <label>
                            <div class="relative">
                                <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    @if ($color == 'color4')
                                        <x-icon name="check" class="w-5 h-5 text-white" />
                                    @endif
                                </div>
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10" fill="#7856ff">
                                    <g>
                                        <circle cx="12" cy="12" r="10.3"></circle>
                                    </g>
                                </svg>
                            </div>
                            <input class="hidden" wire:model="color" type="radio" value="color4">
                        </label>

                        <label>
                            <div class="relative">
                                <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    @if ($color == 'color5')
                                        <x-icon name="check" class="w-5 h-5 text-white" />
                                    @endif
                                </div>
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10" fill="#ff7a00">
                                    <g>
                                        <circle cx="12" cy="12" r="10.3"></circle>
                                    </g>
                                </svg>
                            </div>
                            <input class="hidden" wire:model="color" type="radio" value="color5">
                        </label>

                        <label>
                            <div class="relative">
                                <div class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    @if ($color == 'color6')
                                        <x-icon name="check" class="w-5 h-5 text-white" />
                                    @endif
                                </div>
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="w-10 h-10" fill="#00ba7c">
                                    <g>
                                        <circle cx="12" cy="12" r="10.3"></circle>
                                    </g>
                                </svg>
                            </div>
                            <input class="hidden" wire:model="color" type="radio" value="color6">
                        </label>
                    </div>
                </div>

                <div class="col-span-6 md:col-span-4 mt-4">
                    <label class="text-text block text-sm font-medium">Background</label>

                    <div class="pl-6 mt-3 max-w-xl text-sm text-gray-600">
                        <div class="grid grid-cols-3 gap-2">
                            <label for="background_white">
                                <div
                                    class="bg-white p-3 {{ $background == 'white-bg' ? 'border-2 border-main' : 'border-2 border-white' }}">

                                    <div class="relative flex items-start dark">
                                        <div class="flex items-center h-5">
                                            <input type="radio"
                                                class="form-radio rounded-full transition ease-in-out duration-100
                                                    border-secondary-300 text-primary-600 focus:ring-primary-600 focus:border-primary-400
                                                    dark:border-secondary-500 dark:checked:border-secondary-600 dark:focus:ring-secondary-600
                                                    dark:focus:border-secondary-500 dark:bg-secondary-600 dark:text-secondary-600
                                                    dark:focus:ring-offset-secondary-800"
                                                id="background_white" value="white-bg" wire:model="background"
                                                name="background">
                                        </div>

                                        <div class="ml-2 text-sm">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400"
                                                for="background_black">
                                                White
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <label for="background_dim">
                                <div class="p-3 {{ $background == 'dim-bg' ? 'border-2 border-main' : '' }}"
                                    style="background-color: #15202b; border-style: solid; border-width: 2px;
                                    {{ $background == 'dim-bg' ? '' : 'border-color: #15202b;' }}">

                                    <div class="relative flex items-start dark">
                                        <div class="flex items-center h-5">
                                            <input type="radio"
                                                class="form-radio rounded-full transition ease-in-out duration-100
                                                    border-secondary-300 text-primary-600 focus:ring-primary-600 focus:border-primary-400
                                                    dark:border-secondary-500 dark:checked:border-secondary-600 dark:focus:ring-secondary-600
                                                    dark:focus:border-secondary-500 dark:bg-secondary-600 dark:text-secondary-600
                                                    dark:focus:ring-offset-secondary-800"
                                                id="background_dim" value="dim-bg" wire:model="background"
                                                name="background">
                                        </div>

                                        <div class="ml-2 text-sm">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400"
                                                for="background_dim">
                                                Dim
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <label for="background_black">
                                <div
                                    class="bg-black p-3 {{ $background == 'dark-bg' ? 'border-2 border-main' : 'border-2 border-black' }}">
                                    <div class="absolute left-1 top-1 h-7 w-6  "></div>

                                    <div class="relative flex items-start dark">
                                        <div class="flex items-center h-5">
                                            <input type="radio"
                                                class="form-radio rounded-full transition ease-in-out duration-100
                                                    border-secondary-300 text-primary-600 focus:ring-primary-600 focus:border-primary-400
                                                    dark:border-secondary-500 dark:checked:border-secondary-600 dark:focus:ring-secondary-600
                                                    dark:focus:border-secondary-500 dark:bg-secondary-600 dark:text-secondary-600
                                                    dark:focus:ring-offset-secondary-800"
                                                id="background_black" value="dark-bg" wire:model="background"
                                                name="background">
                                        </div>

                                        <div class="ml-2 text-sm">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400"
                                                for="background_black">
                                                Black
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @error($background)
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
