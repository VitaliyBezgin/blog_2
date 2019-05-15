@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12 m-5">
            <h1>Contact me</h1>
            <hr>
            <form action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="Subject" placeholder="Subject" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    <br>
                    <input type="submit" class="btn btn-success" value="Send Message">
                </div>
            </form>
        </div>
    </div>
@endsection