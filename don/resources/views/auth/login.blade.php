<!-- login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection