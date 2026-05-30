@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>My Jobs</h3>

    <a href="{{ route('jobs.create') }}"
       class="btn btn-primary">
        Create Job
    </a>

</div>

<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Experience</th>
                    <th>Salary</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @foreach($jobs as $job)

                <tr>

                    <td>{{ $job->id }}</td>

                    <td>{{ $job->title }}</td>

                    <td>{{ $job->experience }}</td>

                    <td>{{ $job->salary }}</td>

                    <td>
                        <span class="badge bg-success">
                            {{ $job->status }}
                        </span>
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection