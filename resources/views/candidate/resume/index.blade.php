@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header">
        My Resumes
    </div>

    <div class="card-body">

        <a href="{{ route('resume.create') }}" class="btn btn-primary mb-3">
            Upload New Resume
        </a>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Resume File</th>
                    <th>Skills</th>
                    <th>Category</th>
                    <th>Score</th>
                </tr>
            </thead>

            <tbody>

                @forelse($resumes as $resume)

                <tr>
                    <td>{{ $resume->id }}</td>

                    <td>
                        <a href="{{ asset('uploads/resumes/'.$resume->resume_file) }}"
                           target="_blank">
                            View Resume
                        </a>
                    </td>

                    <td>{{ $resume->skills ?? 'N/A' }}</td>

                    <td>{{ $resume->category ?? 'N/A' }}</td>

                    <td>{{ $resume->resume_score ?? 0 }}</td>
                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center">
                        No Resume Found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection