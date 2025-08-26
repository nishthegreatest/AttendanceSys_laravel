@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h1 class="h3 mb-0">Attendance #{{ $attendance->id }}</h1>
	<div>
		<a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-primary">Edit</a>
		<a href="{{ route('attendances.index') }}" class="btn btn-secondary">Back</a>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<p><strong>Date:</strong> {{ $attendance->date }}</p>
		<p><strong>Student:</strong> {{ $attendance->student?->name }}</p>
		<p><strong>Class:</strong> {{ $attendance->schoolClass?->class_name }}</p>
		<p><strong>Status:</strong> {{ $attendance->status }}</p>
	</div>
</div>
@endsection