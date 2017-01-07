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
                    <form role="form" method="POST" action="user/store" class="form-horizontal">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend class="text-center">Register</legend>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <label for="name" class="control-label">Username</label>
                                    <input id="name" type="text" name="name" value="{{old('name')}}"
                                           placeholder="Please input your name" required="required"
                                           autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1"><label for="email" class="control-label">E-Mail
                                        Address</label>
                                    <input id="email" type="email" name="email" value="{{old('email')}}"
                                                               placeholder="Please input your e-mail address"
                                                               required="required" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1"><label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" name="password" value="{{old('password')}}"
                                           placeholder="Please input your password" required="required"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <label for="password_confirmation"
                                                                              class="control-label">Confirm
                                        Password</label> <input id="password_confirmation" type="password"
                                                                name="password_confirmation"
                                                                placeholder="Please input the password confirmation"
                                                                required="required" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Register
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2 text-center"><a class="btn btn-link">
                                        Are you had a account? Click Here.
                                    </a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection