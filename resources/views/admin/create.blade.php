@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if( Auth::check() )   
                       @if (auth()->user()->isAdmin())
                            <div class="row">

                            <h1><i class='fa fa-user'></i> Add New User</h1>

                                {{ Form::open(['role' => 'form', 'url' => 'admin/users']) }}
                                
                                <div class='form-group'>
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
                                </div>

                                <div class='form-group'>
                                    {{ Form::label('name', 'User Name') }}
                                    {{ Form::text('username', null, ['placeholder' => 'User name', 'class' => 'form-control']) }}
                                </div>


                                <div class='form-group'>
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
                                </div>

                                <div class='form-group'>
                                    {{ Form::label('password', 'Password') }}
                                    {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                                </div>

                                <div class='form-group'>
                                    {{ Form::label('password_confirmation', 'Confirm Password') }}
                                    {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
                                </div>
                                

                                <div class='form-group'>
                                    {{ Form::submit('Add User', ['class' => 'large button green']) }}
                                </div>

                                {{ Form::close() }}
                                           
                            </div>
                        @else
                         <h1> Sorry Only Admin can see this page </h1>
                    @endif
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

