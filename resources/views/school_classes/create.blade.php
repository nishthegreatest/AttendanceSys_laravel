@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Create Class</h1>
<form action="{{ route('school-classes.store') }}" method="POST" class="card p-3">
	@csrf
	<div class="row g-3">
		<div class="col-md-4">
			<label class="form-label">Class Name</label>
			<input type="text" name="class_name" class="form-control" value="{{ old('class_name') }}" required>
		</div>
		<div class="col-md-4">
			<label class="form-label">Section</label>
			<input type="text" name="section" class="form-control" value="{{ old('section') }}" required>
		</div>
		<div class="col-md-4">
			<label class="form-label">Teacher Name</label>
			<input type="text" name="teacher_name" class="form-control" value="{{ old('teacher_name') }}" required>
		</div>
	</div>
	<div class="mt-3">
		<button class="btn btn-primary">Create</button>
		<a href="{{ route('school-classes.index') }}" class="btn btn-secondary">Cancel</a>
	</div>
</form>
@endsection