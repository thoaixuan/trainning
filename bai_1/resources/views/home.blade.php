@extends('layouts.master')

@section('content')
<div class="container">
<table class="table table-stripped mt-4" id="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script src="{{asset('app/admin/index.js')}}"></script>
@endpush