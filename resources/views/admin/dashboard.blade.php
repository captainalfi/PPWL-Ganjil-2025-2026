@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-5">
            <div class="text-sm text-slate-500">Total Students</div>
            <div class="text-3xl font-bold mt-2">120</div>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <div class="text-sm text-slate-500">Total Courses</div>
            <div class="text-3xl font-bold mt-2">36</div>
        </div>
        <div class="bg-white rounded-xl shadow p-5">
            <div class="text-sm text-slate-500">Active Enrollments</div>
            <div class="text-3xl font-bold mt-2">420</div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow mt-6 overflow-hidden">
        <div class="px-5 py-4 border-b font-semibold">Recent Enrollments</div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 text-slate-600">
                    <tr>
                        <th class="text-left px-5 py-3">Student</th>
                        <th class="text-left px-5 py-3">Course</th>
                        <th class="text-left px-5 py-3">Semester</th>
                        <th class="text-left px-5 py-3">Enrolled At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-5 py-3">Muhammad Alfi</td>
                        <td class="px-5 py-3">PPWL 101</td>
                        <td class="px-5 py-3">2025G</td>
                        <td class="px-5 py-3">2025-10-29</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
