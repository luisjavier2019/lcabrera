@extends('layouts.app')
@section('content')
    <div class="container"> 
        <div class="card">
        <div class="card-header bg-danger text-white">
            Ingreso de Usuarios
        </div>
        <div class="card-body">
            <!--<h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

            {!! Form::open(['route'=>'users.store','method'=>'POST']) !!}
                {!! Field::text('name', null, ['label'=>'Nombre','placeholder'=>'Ingrese el nombre']) !!}
                {!! Field::text('email', null, ['label'=>'Email','placeholder'=>'Ingrese el email']) !!}

                {{Form::password('password', array('class'=>'form-control input-sm','placeholder'=>'Ingrese Contraseña')) }}

                <br>
                {!! Form::submit('GUARDAR', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-primary">REGRESAR</a>
            {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection