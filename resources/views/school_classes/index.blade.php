@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h1 class="h3 mb-0">Classes</h1>
	<a href="{{ route('school-classes.create') }}" class="btn btn-primary">New Class</a>
</div>

<div class="card">
	<div class="card-body p-0">
		<table class="table table-striped mb-0">
			<thead>
				<tr>
					<th>Name</th>
					<th>Section</th>
					<th>Teacher</th>
					<th>Students</th>
					<th class="text-end">Actions</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($classes as $class)
					<tr>
						<td>{{ $class->class_name }}</td>
						<td>{{ $class->section }}</td>
						<td>{{ $class->teacher_name }}</td>
						<td>{{ $class->students_count }}</td>
						<td class="text-end">
							<a href="{{ route('school-classes.show', $class) }}" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="{{ route('school-classes.edit', $class) }}" class="btn btn-sm btn-outline-primary">Edit</a>
							<form action="{{ route('school-classes.destroy', $class) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this class?')">
								@csrf
								@method('DELETE')
								<button class="btn btn-sm btn-outline-danger">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr><td colspan="5" class="text-center p-4">No classes found.</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

<div class="mt-3">
	{{ $classes->links() }}
</div>
@endsection