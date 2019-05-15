@if(\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if(\Session::has('update'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('update') !!}</li>
        </ul>
    </div>
@endif
@if(\Session::has('delete'))
    <div class="alert alert-warning">
        <ul>
            <li>{!! \Session::get('delete') !!}</li>
        </ul>
    </div>
@endif