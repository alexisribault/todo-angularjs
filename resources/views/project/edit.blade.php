@extends('app')

@section('content')
    <h2>Edit Project</h2>

    {!! Form::model($project, ['method' => 'PATCH', 'route' => ['project.update', $project->slug]]) !!}
    @include('project/partials/_form', ['submit_text' => 'Edit Project'])
    {!! Form::close() !!}
@endsection