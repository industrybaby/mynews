@extends('layouts.profile')
@section('title', 'プロフィールの新規作成')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの新規作成</h2>
                <form action="{{ route('profile.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label class="col-md-2" for="gender">性別</label>
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="男性" checked>
                                    <label class="form-check-label" for="male">男性</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="女性" >
                                    <label class="form-check-label" for="female">女性</label>
                                </div>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="10">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介                            
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="15">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection