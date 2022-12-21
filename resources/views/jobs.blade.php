@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')
@foreach ($job_lists as $job_list)
    <x-job-card :job_list="$job_list" />
@endforeach
@endsection
