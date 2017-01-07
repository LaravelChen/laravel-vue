@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
                <div class="well bs-component">
                    @if($errors->any())
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form role="form" method="POST" action="/user/attamp" class="form-horizontal"><input
                                type="hidden" name="_token" value="XK1r03qZOqekD1KwtpUUNYZSmpzPy6IF0ydcWslh">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend class="text-center">Login In</legend>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1"><label for="email" class="control-label">E-Mail
                                        Address</label> <input id="email" type="email" name="email" value=""
                                                               placeholder="Please input your e-mail address"
                                                               required="required" autofocus="autofocus"
                                                               class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1"><label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" name="password"
                                           placeholder="Please input your password" required="required"
                                           class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-1">
                                    <div class="checkbox"><label><input type="checkbox" name="remember"> Remember Me
                                        </label></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <button type="submit" class="btn btn-success form-control">
                                        Login In
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2 text-center"><a
                                             class="btn btn-link">
                                        Forgot Your Password?
                                    </a></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection