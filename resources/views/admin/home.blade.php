@extends('layouts.admin')
@section('content')
<div class="flex flex-wrap">

{{-- Number block --}}
    <div class="{{ $settings2['column_class'] }} px-4 col-12">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                           Estás en
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            Inicio
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Number block --}}
    <div class="{{ $settings2['column_class'] }} px-4 col-12">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            # Pacientes hospitalizados
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ number_format($settings2['total_number']) }}
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Number block --}}
    <div class="{{ $settings3['column_class'] }} px-4 col-12">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            # Pacientes ambulatorios
                        </h5>
                        <span class="font-semibold text-xl text-blueGray-700">
                            {{ number_format($settings3['total_number']) }}
                        </span>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Latest Entries --}}
    <div class="{{ $settings5['column_class'] }} px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 shadow-lg">
            <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Pacientes
                        </h5>
                    </div>
                    <div class="relative w-auto pl-4 flex-initial">
                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-indigo-500">
                            <i class="fas fa-table"></i>
                        </div>
                    </div>
                    <div class="w-full mt-4 overflow-x-auto">
                        <table class="table table-index">
                            <thead>
                                <tr>
                                    @foreach($settings5['fields'] as $key => $value)
                                        <th>
                                            {{ trans(sprintf('cruds.%s.fields.%s', $settings5['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($settings5['data'] as $entry)
                                    <tr>
                                        @foreach($settings5['fields'] as $key => $value)
                                            <td>
                                                @if($value === '')
                                                    {{ $entry->{$key} }}
                                                @elseif(is_iterable($entry->{$key}))
                                                    @foreach($entry->{$key} as $subEentry)
                                                        <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                                    @endforeach
                                                @else
                                                    {{ data_get($entry, $key . '.' . $value) }}
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="{{ count($settings5['fields']) }}">{{ __('No entries found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {{ $chart4->renderJs() }}
    {{ $chart6->renderJs() }}
@endpush