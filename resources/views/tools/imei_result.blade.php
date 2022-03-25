@extends('results')

@section('output')
    @if(!empty($success))
        <div>
            <table class="table">
                <tr>
                    <td>Type Allocation Code: </td>
                    <td>{{ $typeAllocationCode }}</td>
                </tr>
                <tr>
                    <td>Serial Number: </td>
                    <td>{{ $serialiNumber }}</td>
                </tr>
                <tr>
                    <td>Checksum: </td>
                    <td>{{ $checksum }}</td>
                </tr>
            </table>
        </div>
    @endif
@endsection
