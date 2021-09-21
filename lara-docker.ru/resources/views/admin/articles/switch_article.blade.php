@extends('admin.layouts.app_admin')
@if($article)
    @include('admin.articles.edit')
@else
    @include('admin.articles.create')
@endif

{{--Тут подключаем нужные стили и скрипты для шаблонов форм--}}
@section('page-script')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/i18n/ru.js"></script>
  <script>
      $(document).ready(function () {
             let $select2 = $('#tags').select2({
                 language: "ru",
                 maximumSelectionLength: 3
             })
      })
      @isset($article->id)
      $('#tags').select2().val({!! json_encode($article->tags()->allRelatedIds()) !!}).trigger('change');
      @endisset
    </script>

@stop
