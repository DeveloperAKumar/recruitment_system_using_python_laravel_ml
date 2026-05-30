@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">
        Upload Resume
    </div>

    <div class="card-body">

        <form method="POST"
              enctype="multipart/form-data"
              action="{{ route('resume.store') }}">

            @csrf

            <div class="mb-3">

                <label>Select Resume</label>

                <input type="file"
                       name="resume"
                       class="form-control">

            </div>

            <button class="btn btn-success">
                Upload Resume
            </button>

        </form>

    </div>

</div>

@endsection