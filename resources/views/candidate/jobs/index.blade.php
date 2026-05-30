@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Available Jobs</h3>
</div>

<div class="row">

    @forelse($jobs as $job)

    <div class="col-md-6 mb-4">

        <div class="card shadow h-100">

            <div class="card-header bg-primary text-white">
                {{ $job->title }}
            </div>

            <div class="card-body">

                <p>
                    <strong>Description:</strong><br>
                    {{ $job->description }}
                </p>

                <hr>

                <p>
                    <strong>Required Skills:</strong><br>
                    {{ $job->required_skills }}
                </p>

                <p>
                    <strong>Experience:</strong>
                    {{ $job->experience }}
                </p>

                <p>
                    <strong>Salary:</strong>
                    ₹{{ $job->salary }}
                </p>

            </div>

            <div class="card-footer">

                @if(in_array($job->id,$appliedJobs))

                <button class="btn btn-secondary w-100" disabled>
                    Already Applied
                </button>

                @else

                <form action="{{ route('candidate.apply',$job->id) }}"
                    method="POST">

                    @csrf

                    <button class="btn btn-success w-100">
                        Apply Now
                    </button>

                </form>

                @endif  

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert alert-warning">
            No Jobs Available
        </div>

    </div>

    @endforelse

</div>

@endsection