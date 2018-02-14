@extends('app')
@section('content')
<div class="col-xs-12"  style="padding-top: 100px;">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="login">
            <div class="col-xs-12 panel panel-default">
                {{--<div class="panel-heading">Авторизация  -  Логин:test@test.com Пароль:test</div>--}}
                <div class="col-xs-4 title_news_list" style="top: -20px;    ">Авторизация</div>

                <div class="panel-body" style=" padding-top: 30px;">
                    <form class="form-horizontal" method="POST" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Логин:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Вход
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 dis_none" id="news">
                    <div class="col-xs-12 panel panel-default articles_block" id="news_list" style="padding: 25px" >
                    <div class="col-xs-2 title_news_list">Новости</div>
                    </div>
                </div>
    </div>
</div>
</div>


@stop