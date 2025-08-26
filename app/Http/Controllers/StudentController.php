<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StudentController extends Controller
{
	public function index(): View
	{
		$students = Student::with('schoolClass')->latest()->paginate(10);
		return view('students.index', compact('students'));
	}

	public function create(): View
	{
		$classes = SchoolClass::orderBy('class_name')->get();
		return view('students.create', compact('classes'));
	}

	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'age' => ['required', 'integer', 'min:1'],
			'email' => ['required', 'email', 'max:255', 'unique:students,email'],
			'class_id' => ['required', 'exists:school_classes,id'],
		]);

		$student = Student::create($validated);

		return redirect()->route('students.show', $student)
			->with('success', 'Student created successfully.');
	}

	public function show(Student $student): View
	{
		$student->load('schoolClass', 'attendances');
		return view('students.show', compact('student'));
	}

	public function edit(Student $student): View
	{
		$classes = SchoolClass::orderBy('class_name')->get();
		return view('students.edit', compact('student', 'classes'));
	}

	public function update(Request $request, Student $student): RedirectResponse
	{
		$validated = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'age' => ['required', 'integer', 'min:1'],
			'email' => ['required', 'email', 'max:255', Rule::unique('students', 'email')->ignore($student->id)],
			'class_id' => ['required', 'exists:school_classes,id'],
		]);

		$student->update($validated);

		return redirect()->route('students.show', $student)
			->with('success', 'Student updated successfully.');
	}

	public function destroy(Student $student): RedirectResponse
	{
		$student->delete();
		return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
	}
}