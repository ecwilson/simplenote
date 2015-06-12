@extends('layouts.default')

@section('title', 'Create new Collection - ')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/kube-btns.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-colorpicker.min.css') }}">
@endsection

@section('content')
<h2>Create new Collection</h2>
<br>
@include('flash::message')
@include('layouts.partials._errors')
{!! Form::open(['route' => 'collections.store']) !!}
	@include('collections.partials._form', ['name_val' => '', 'color_val' => '', 'is_public_val' => 0])
{!! Form::close() !!}
@endsection

@section('js')
<script src="{{ asset('js/kube.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#buttons').buttons({
            target: '#is-public-target'
        });

        $('#color-picker input').val(get_random_color());

        $('#color-picker').colorpicker();
    });

    function get_random_color() {
        var colors = ['#A74EFF', '#FF70FE', '#337ab7', '#5cb85c', '#5bc0de', '#f0ad4e', '#d9534f'];

        return colors[Math.floor(Math.random() * colors.length)];
    }
</script>
@endsection