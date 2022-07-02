@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                @include('section.errors')
                <div class="card">
                    <div class="card-header">
                        ایجاد تسک جدید
                    </div>
                    <div class="card-body">
                        <form action="{{route('todos.store')}}" method="post">
                         @csrf
                            <div class="form-group">
                                <label class="mb-2" for="title"> عنوان</label>
                                <input type="text" value="{{old('title')}}" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="mb-2 mt-3" for="description"> توضیحات</label>
                                <textarea  id="description" value="{{old('description')}}" name="description" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-success mt-3" type="submit">ارسال</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
