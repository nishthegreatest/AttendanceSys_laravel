@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Create Student</h1>
<form action="{{ route('students.store') }}" method="POST" class="card p-3">
	@csrf
	<div class="row g-3">
		<div class="col-md-4">
			<label class="form-label">Name</label>
			<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
		</div>
		<div class="col-md-2">
			<label class="form-label">Age</label>
			<input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
		</div>
		<div class="col-md-6">
			<label class="form-label">Email</label>
			<input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
		</div>
		<div class="col-12">
			<label class="form-label">Class</label>
			<select name="class_id" class="form-select" required>
				<option value="">Select a class</option>
				@foreach ($classes as $class)
					<option value="{{ $class->id }}" @selected(old('class_id') == $class->id)>{{ $class->class_name }} - {{ $class->section }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="mt-3">
		<button class="btn btn-primary">Create</button>
		<a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
	</div>
</form>
@endsection