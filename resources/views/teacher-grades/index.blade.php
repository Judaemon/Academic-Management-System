<x-app-layout>
    <div class="container p-2 bg-white rounded-lg shadow-md mb-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="overflow-hidden w-full py-2">
                        <div class="card-header overflow-hidden flex justify-between w-full font-semibold text-2xl text-gray-800 leading-tight py-2">
                            {{ __('Grades') }}
                        </div>
    
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="mb-4 flex justify-between">
                                    @livewire('teacher-grades.export')
                            </div>
        
                            <table class="table mb-6 pt-4 w-full">
                                <thead>
                                    <tr>
                                        {{-- Subject and User column missing as of now --}}
                                        <th><x-badge class="w-full mb-2" dark md label="First Quarter"/></th>
                                        <th><x-badge class="w-full mb-2" dark md label="Second Quarter"/></th>
                                        <th><x-badge class="w-full mb-2" dark md label="Third Quarter"/></th>
                                        <th><x-badge class="w-full mb-2" dark md label="Fourth Quarter"/></th>
                                    </tr>
                                </thead>
                                <tbody class="mb-6 pt-4 w-full">
                                    @foreach ($grades as $grade)
                                        <tr>
                                            {{-- Subject and User row missing as of now --}}
                                            <td><x-badge class="bg-blue-100 text-black mb-2 w-full rounded dark:bg-blue-200 dark:text-blue-800"
                                                dark md label="{{ $grade->first_quarter }}"/></td>
                                            <td><x-badge class="bg-blue-100 text-black mb-2 w-full rounded dark:bg-blue-200 dark:text-blue-800"
                                                dark md label="{{ $grade->second_quarter }}"/></td>
                                            <td><x-badge class="bg-blue-100 text-black mb-2 w-full rounded dark:bg-blue-200 dark:text-blue-800"
                                                dark md label="{{ $grade->third_quarter }}"/></td>
                                            <td><x-badge class="bg-blue-100 text-black mb-2 w-full rounded dark:bg-blue-200 dark:text-blue-800"
                                                dark md label="{{ $grade->fourth_quarter }}"/></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mb-4 flex justify-between">
                                @livewire('teacher-grades.import')
                            </div>

                            {{ $grades->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>