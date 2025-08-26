@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Record Attendance</h1>
<form action="{{ route('attendances.store') }}" method="POST" class="card p-3">
	@csrf
	<div class="row g-3">
		<div class="col-md-4">
			<label class="form-label">Student</label>
			<select name="student_id" class="form-select" required>
				<option value="">Select student</option>
				@foreach ($students as $student)
					<option value="{{ $student->id }}" @selected(old('student_id') == $student->id)>{{ $student->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-4">
			<label class="form-label">Class</label>
			<select name="class_id" class="form-select" required>
				<option value="">Select class</option>
				@foreach ($classes as $class)
					<option value="{{ $class->id }}" @selected(old('class_id') == $class->id)>{{ $class->class_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-2">
			<label class="form-label">Date</label>
			<input type="date" name="date" class="form-control" value="{{ old('date', now()->toDateString()) }}" required>
		</div>
		<div class="col-md-2">
			<label class="form-label">Status</label>
			<select name="status" class="form-select" required>
				@foreach (['Present', 'Absent', 'Late'] as $status)
					<option value="{{ $status }}" @selected(old('status') == $status)>{{ $status }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="mt-3">
		<button class="btn btn-primary">Save</button>
		<a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
	</div>
</form>
@endsection