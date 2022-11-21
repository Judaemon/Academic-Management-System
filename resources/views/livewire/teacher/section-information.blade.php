<div class="container">
    <x-badge class="w-full mb-2" dark md label="Section Information" />
    <div class="grid grid-cols-12 gap-4 w-1/2">
        <div class="col-span-12 md:col-span-4">
            <p class="text-xs italic text-gray-600">Section name</p>
            <p class="font-semibold text-sm"> {{ $section->name }}</p>
        </div>

        <div class="col-span-12 md:col-span-4">
            <p class="text-xs italic text-gray-600">Capacity</p>
            <p class="font-semibold text-sm"> {{ $section->capacity }}</p>
        </div>

        <div class="col-span-12 md:col-span-4">
            <p class="text-xs italic text-gray-600">Teacher</p>
            <p class="font-semibold text-sm"> {{ $section->teacher->first_name }} {{ $section->teacher->last_name }}</p>
        </div>

        <div class="col-span-12">
            <p class="text-xs italic text-gray-600">Subjects</p>
            <div class="flex flex-wrap gap-2">
                @foreach ($section_subjects as $subject)
                    <p class="font-semibold text-sm"> {{ $subject->name }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
