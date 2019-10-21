@extends('layouts.app')
@section('content')
    <div class="container"> 
        <div class="card">
        <div class="card-header bg-danger text-white">
            Modificación de Usuarios
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>['users.update', $user],'method'=>'PUT']) !!}
                {!! Field::text('name', $user->name, ['label'=>'Nombre','placeholder'=>'Ingrese el nombre']) !!}
                {!! Field::text('email', $user->email, ['label'=>'email','placeholder'=>'Ingrese el email']) !!}
                {!! Form::submit('GUARDAR', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-primary">REGRESAR</a>
            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection