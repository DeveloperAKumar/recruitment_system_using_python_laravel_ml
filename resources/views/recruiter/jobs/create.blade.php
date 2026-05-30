@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        Create New Job
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('jobs.store') }}">
            @csrf

            <div class="mb-3">
                <label>Job Title</label>

                <input type="text"
                       name="title"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Description</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label>Required Skills</label>

                <textarea
                    name="required_skills"
                    class="form-control"
                    placeholder="Python, Laravel, MySQL"></textarea>
            </div>

            <div class="row">

                <div class="col-md-6">

                    <label>Experience</label>

                    <input type="text"
                           name="experience"
                           class="form-control">

                </div>

                <div class="col-md-6">

                    <label>Salary</label>

                    <input type="text"
                           name="salary"
                           class="form-control">

                </div>

            </div>

            <br>

            <button class="btn btn-success">
                Create Job
            </button>

        </form>

    </div>

</div>

@endsection