<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AttendanceController extends Controller
{
	public function index(): View
	{
		$attendances = Attendance::with(['student', 'schoolClass'])->latest('date')->paginate(10);
		return view('attendances.index', compact('attendances'));
	}

	public function create(): View
	{
		$students = Student::orderBy('name')->get();
		$classes = SchoolClass::orderBy('class_name')->get();
		return view('attendances.create', compact('students', 'classes'));
	}

	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'student_id' => ['required', 'exists:students,id'],
			'class_id' => ['required', 'exists:school_classes,id'],
			'date' => ['required', 'date'],
			'status' => ['required', Rule::in(['Present', 'Absent', 'Late'])],
		]);

		$attendance = Attendance::create($validated);
		return redirect()->route('attendances.show', $attendance)
			->with('success', 'Attendance recorded successfully.');
	}

	public function show(Attendance $attendance): View
	{
		$attendance->load(['student', 'schoolClass']);
		return view('attendances.show', compact('attendance'));
	}

	public function edit(Attendance $attendance): View
	{
		$students = Student::orderBy('name')->get();
		$classes = SchoolClass::orderBy('class_name')->get();
		return view('attendances.edit', compact('attendance', 'students', 'classes'));
	}

	public function update(Request $request, Attendance $attendance): RedirectResponse
	{
		$validated = $request->validate([
			'student_id' => ['required', 'exists:students,id'],
			'class_id' => ['required', 'exists:school_classes,id'],
			'date' => ['required', 'date'],
			'status' => ['required', Rule::in(['Present', 'Absent', 'Late'])],
		]);

		$attendance->update($validated);
		return redirect()->route('attendances.show', $attendance)
			->with('success', 'Attendance updated successfully.');
	}

	public function destroy(Attendance $attendance): RedirectResponse
	{
		$attendance->delete();
		return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
	}
}