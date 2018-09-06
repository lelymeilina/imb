@extends('layouts.app2')

@section('content')
<div id="login">
<div class="container">

<br/>
<br/>
<br/>
    <div class="row">
    <div class="col-md-8">
     <img src="{{ URL('assets/img/layoutsintesis.png') }}" id="logossintesys"  class="img-responsive pull-left" alt="Responsive image"> 
    </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login IMB KARANGASEM</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <p>&nbsp;</p>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-3 control-label">Username</label>

                            <div class="col-md-9">
                                <input id="username" type="text" placeholder="Username Or NIDN" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-9">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button> &nbsp;  &nbsp;
                                 <button type="reset" class="btn btn-default">
                                <i class="fa fa-btn fa-edit"></i> Clear</button>
                               
                        </div>
                    </div>
                     
                    </form>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> <!-- | <a class="btn btn-link" href="{{ url('/register') }}">Student Register</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
