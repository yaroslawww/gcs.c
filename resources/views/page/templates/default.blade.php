@extends('master')

@section('content')
    <div>
        {!! $page->template_field('page_content') !!}
    </div>
@endsection
