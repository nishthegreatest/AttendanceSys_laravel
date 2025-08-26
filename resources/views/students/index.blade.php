@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h1 class="h3 mb-0">Students</h1>
	<a href="{{ route('students.create') }}" class="btn btn-primary">New Student</a>
</div>

<div class="card">
	<div class="card-body p-0">
		<table class="table table-striped mb-0">
			<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Email</th>
					<th>Class</th>
					<th class="text-end">Actions</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($students as $student)
					<tr>
						<td>{{ $student->name }}</td>
						<td>{{ $student->age }}</td>
						<td>{{ $student->email }}</td>
						<td>{{ $student->schoolClass?->class_name }}</td>
						<td class="text-end">
							<a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-primary">Edit</a>
							<form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this student?')">
								@csrf
								@method('DELETE')
								<button class="btn btn-sm btn-outline-danger">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr><td colspan="5" class="text-center p-4">No students found.</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

<div class="mt-3">
	{{ $students->links() }}
</div>
@endsection