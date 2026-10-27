<?php

namespace App\Http\Controllers;

use App\Enums\SchoolRole;
use App\Enums\SchoolType;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function create(): View
    {
        return view('schools.create', ['types' => SchoolType::cases()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::enum(SchoolType::class)],
            'npsn' => ['nullable', 'digits:8', Rule::unique('schools', 'npsn')],
            'city' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
        ]);

        $school = DB::transaction(function () use ($data, $request) {
            $school = School::create($data + [
                'slug' => Str::slug($data['name']).'-'.Str::lower(Str::random(6)),
            ]);
            $school->members()->attach($request->user(), ['role' => SchoolRole::Admin]);

            return $school;
        });

        return redirect()->route('schools.show', $school)->with('status', 'Institusi berhasil dibuat.');
    }

    public function show(School $school): View
    {
        Gate::authorize('view', $school);

        return view('schools.show', [
            'school' => $school,
            'members' => $school->members()->orderBy('name')->get(),
        ]);
    }
}
