@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Edit Class</h1>
<form action="{{ route('school-classes.update', $schoolClass) }}" method="POST" class="card p-3">
	@csrf
	@method('PUT')
	<div class="row g-3">
		<div class="col-md-4">
			<label class="form-label">Class Name</label>
			<input type="text" name="class_name" class="form-control" value="{{ old('class_name', $schoolClass->class_name) }}" required>
		</div>
		<div class="col-md-4">
			<label class="form-label">Section</label>
			<input type="text" name="section" class="form-control" value="{{ old('section', $schoolClass->section) }}" required>
		</div>
		<div class="col-md-4">
			<label class="form-label">Teacher Name</label>
			<input type="text" name="teacher_name" class="form-control" value="{{ old('teacher_name', $schoolClass->teacher_name) }}" required>
		</div>
	</div>
	<div class="mt-3">
		<button class="btn btn-primary">Save</button>
		<a href="{{ route('school-classes.show', $schoolClass) }}" class="btn btn-secondary">Cancel</a>
	</div>
</form>
@endsection