{{--************************* start links ************************* --}}

@extends('layout.layout')

{{--**************** page name  **************** --}}

@section('title_page')
  <title>Cars | Import & Export</title>
@endsection

{{--**************** title in page **************** --}}

@section('title_home')
  Cars
@endsection

@section('page_name_text')
  Cars Data
@endsection

@section('page_name_link')
  <li class="breadcrumb-item"><a href="{{route('index')}}">home page</a></li>
  <li class="breadcrumb-item">cars data</li>
@endsection

@section('content')
  <div>
    <div class="container">
      <div class="row">
        <div class="col insert_car">
          <form method="post" action="{{route('car.create')}}" enctype="multipart/form-data" class="p-2">
            @csrf
          <fieldset class="scheduler-border">
            <legend class="scheduler-border text-white"> Create New Car</legend>
            <div class="row">
              <div class="col">
                <label for="title text-center" class="text-white">Car Brand</label>
                <input type="text" class="form-control" name="brand" id="title" placeholder="type car brand">
                @if($errors->any())
                  <ul class="help-block text-danger mt-2">
                    <li> {{$errors->first('brand')}}</li>
                  </ul>
                @endif
              </div>
              <div class="col">
                <label for="formGroupExampleInput" class="text-white">Car Model</label>
                <input type="text" class="form-control" name="model"
                       placeholder="type car model">
                @if($errors->any())
                  <ul class="help-block text-danger mt-2">
                    <li> {{$errors->first('model')}}</li>
                  </ul>
                @endif
              </div>
              <div class="col">
                <label for="formGroupExampleInput" class="text-white">Car Year</label>
                <input type="text" class="form-control" name="year"
                       placeholder="type car year">
                @if($errors->any())
                  <ul class="help-block text-danger mt-2">
                    <li> {{$errors->first('year')}}</li>
                  </ul>
                @endif
              </div>
            </div>
            <div class="my-auto text-center p-2">
              <button type="submit" class="btn btn-primary col-4">Save</button>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
    </div>


  </div>
  <div class="col-8 m-auto">
    {!! $dataTable->scripts() !!}
    {!! $dataTable->table() !!}
  </div>
 @endsection





@section('scripts')
  {!! $dataTable->scripts() !!}
@endsection
