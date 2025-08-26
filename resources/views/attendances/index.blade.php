@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<h1 class="h3 mb-0">Attendance</h1>
	<a href="{{ route('attendances.create') }}" class="btn btn-primary">New Record</a>
</div>

<div class="card">
	<div class="card-body p-0">
		<table class="table table-striped mb-0">
			<thead>
				<tr>
					<th>Date</th>
					<th>Student</th>
					<th>Class</th>
					<th>Status</th>
					<th class="text-end">Actions</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($attendances as $attendance)
					<tr>
						<td>{{ $attendance->date }}</td>
						<td>{{ $attendance->student?->name }}</td>
						<td>{{ $attendance->schoolClass?->class_name }}</td>
						<td>{{ $attendance->status }}</td>
						<td class="text-end">
							<a href="{{ route('attendances.show', $attendance) }}" class="btn btn-sm btn-outline-secondary">View</a>
							<a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-sm btn-outline-primary">Edit</a>
							<form action="{{ route('attendances.destroy', $attendance) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
								@csrf
								@method('DELETE')
								<button class="btn btn-sm btn-outline-danger">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr><td colspan="5" class="text-center p-4">No attendance found.</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>

<div class="mt-3">
	{{ $attendances->links() }}
</div>
@endsection