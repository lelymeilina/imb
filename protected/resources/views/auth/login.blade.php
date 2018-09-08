@extends('layouts.app')

@section('content')
<style type="text/css">
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
body{
    background: #f7f7f7;
}
</style>

<div class="container">

    <div class="row" style="margin-top:10px">
        <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
        <img src="{{URL('assets/img/1.png')}}" class="img-responsive" >
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
                <fieldset>
                    <hr class="colorgraph">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}" style="margin: 10px 0px 10px 0px">
                        <input id="username" placeholder="Username" type="text" class="form-control input-lg" name="username" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin: 10px 0px 10px 0px">
                        <input id="password" placeholder="Password" type="password" class="form-control input-lg" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <span class="button-checkbox">
                        <button type="button" class="btn" data-color="info">Remember Me</button>
                        <input type="checkbox" name="remember" id="remember_me" checked="checked" class="hidden">
                        <a href="#" class="btn btn-link pull-right">Forgot Password?</a>
                    </span>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="{{ url('/') }}" class="btn btn-lg btn-primary btn-block">Home</a>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

</div>

@endsection
