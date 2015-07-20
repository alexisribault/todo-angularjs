@extends('app')

@section('content')
    <h2>Projects</h2>

    @if ( !$projects->count() )
        You have no projects
    @else
        <ul>
            @foreach( $projects as $project )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('project.destroy', $project->slug))) !!}
                    <a href="{{ route('project.show', $project->slug) }}">{{ $project->name }}</a>
                    (
                    {!! link_to_route('project.edit', 'Edit', array($project->slug), array('class' => 'btn btn-info')) !!},
                    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                    )
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        {!! link_to_route('project.create', 'Create Project') !!}
    </p>
@endsection