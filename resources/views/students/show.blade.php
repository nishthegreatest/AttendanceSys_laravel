@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h1 class="h3 mb-0">{{ $student->name }}</h1>
	<div>
		<a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit</a>
		<a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
	</div>
</div>

<div class="card mb-4">
	<div class="card-body">
		<div class="row g-3">
			<div class="col-md-3"><strong>Age:</strong> {{ $student->age }}</div>
			<div class="col-md-5"><strong>Email:</strong> {{ $student->email }}</div>
			<div class="col-md-4"><strong>Class:</strong> {{ $student->schoolClass?->class_name }} - {{ $student->schoolClass?->section }}</div>
		</div>
	</div>
</div>

<h2 class="h5">Attendance</h2>
<div class="card">
	<div class="card-body p-0">
		<table class="table table-striped mb-0">
			<thead>
				<tr>
					<th>Date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($student->attendances as $attendance)
					<tr>
						<td>{{ $attendance->date }}</td>
						<td>{{ $attendance->status }}</td>
					</tr>
				@empty
					<tr><td colspan="2" class="text-center p-4">No attendance records.</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection