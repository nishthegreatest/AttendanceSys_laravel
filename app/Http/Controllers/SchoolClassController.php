<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolClassController extends Controller
{
	public function index(): View
	{
		$classes = SchoolClass::withCount('students')->latest()->paginate(10);
		return view('school_classes.index', compact('classes'));
	}

	public function create(): View
	{
		return view('school_classes.create');
	}

	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'class_name' => ['required', 'string', 'max:255'],
			'section' => ['required', 'string', 'max:255'],
			'teacher_name' => ['required', 'string', 'max:255'],
		]);

		$schoolClass = SchoolClass::create($validated);

		return redirect()->route('school-classes.show', $schoolClass)
			->with('success', 'Class created successfully.');
	}

	public function show(SchoolClass $schoolClass): View
	{
		$schoolClass->load('students');
		return view('school_classes.show', compact('schoolClass'));
	}

	public function edit(SchoolClass $schoolClass): View
	{
		return view('school_classes.edit', compact('schoolClass'));
	}

	public function update(Request $request, SchoolClass $schoolClass): RedirectResponse
	{
		$validated = $request->validate([
			'class_name' => ['required', 'string', 'max:255'],
			'section' => ['required', 'string', 'max:255'],
			'teacher_name' => ['required', 'string', 'max:255'],
		]);

		$schoolClass->update($validated);

		return redirect()->route('school-classes.show', $schoolClass)
			->with('success', 'Class updated successfully.');
	}

	public function destroy(SchoolClass $schoolClass): RedirectResponse
	{
		$schoolClass->delete();
		return redirect()->route('school-classes.index')->with('success', 'Class deleted successfully.');
	}
}