<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Grades') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <div class="mb-4 d-flex justify-content-between">
                            {{-- @livewire('teacher-grades.export')
                            @livewire('teacher-grades.import') --}}
                        </div>
    
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th>Student</th> --}}
                                    <th>First Quarter</th>
                                    <th>Second Quarter</th>
                                    <th>Third Quarter</th>
                                    <th>Fourth Quarter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr>
                                        {{-- <td>{{ $grade->user->last_name }}</td> --}}
                                        <td>{{ $grade->first_quarter }}</td>
                                        <td>{{ $grade->second_quarter }}</td>
                                        <td>{{ $grade->third_quarter }}</td>
                                        <td>{{ $grade->fourth_quarter }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    
                        {{ $grades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>