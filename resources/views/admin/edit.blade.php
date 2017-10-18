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

                    You are logged in as player !
                    @if( Auth::check() )   
                       @if (auth()->user()->isAdmin())
                            <div class="row">

                            <h1><i class='fa fa-user'></i> Edit User</h1>

                                {{ Form::model($user, ['role' => 'form', 'url' => 'admin/users/' . $user->id, 'method' => 'PUT']) }}

                                
                                <div class='form-group'>
                                    {{ Form::label('name', 'Name') }}
                                    {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
                                </div>

                                <div class='form-group'>
                                    {{ Form::label('name', 'User Name') }}
                                    {{ Form::text('username', null, ['placeholder' => 'username', 'class' => 'form-control']) }}
                                </div>


                                <div class='form-group'>
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
                                </div>

                                <div class='form-group'>
                                    {{ Form::label('password', 'New Password') }}
                                    {{ Form::password('password', ['placeholder' => 'Password, leave blank for same password', 'class' => 'form-control']) }}
                                </div>

                                

                                <div class='form-group'>
                                    {{ Form::submit('Update', ['class' => 'large button blue']) }}
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

