@extends('app')

@section('content')
    <h2>Create Project</h2>

    {!! Form::model(new App\Project, ['route' => ['project.store']]) !!}
    @include('project/partials/_form', ['submit_text' => 'Create Project'])
    {!! Form::close() !!}
    @endsection

