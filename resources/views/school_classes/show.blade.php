@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h1 class="h3 mb-0">{{ $schoolClass->class_name }} - Section {{ $schoolClass->section }}</h1>
	<div>
		<a href="{{ route('school-classes.edit', $schoolClass) }}" class="btn btn-primary">Edit</a>
		<a href="{{ route('school-classes.index') }}" class="btn btn-secondary">Back</a>
	</div>
</div>

<div class="card mb-4">
	<div class="card-body">
		<p class="mb-0"><strong>Teacher:</strong> {{ $schoolClass->teacher_name }}</p>
	</div>
</div>

<h2 class="h5">Students</h2>
<div class="card">
	<div class="card-body p-0">
		<table class="table table-striped mb-0">
			<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Email</th>
					<th class="text-end">Actions</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($schoolClass->students as $student)
					<tr>
						<td>{{ $student->name }}</td>
						<td>{{ $student->age }}</td>
						<td>{{ $student->email }}</td>
						<td class="text-end">
							<a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-primary">Edit</a>
						</td>
					</tr>
				@empty
					<tr><td colspan="4" class="text-center p-4">No students yet.</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection