@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5 m-5 text-light">
            <h1 class="light_text">Contact me</h1>
            <hr class="bg-light">
            <form action="{{url('contact')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email:" class="form-control" required value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject:" class="form-control" required value="{{old('subject')}}">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Message:"></textarea>
                    <br>
                    <input type="submit" class="btn btn-success" value="Send Message">
                </div>
            </form>
        </div>
    </div>
@endsection