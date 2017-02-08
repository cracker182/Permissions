<div class="row">
    <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
        <form action="{{$action}}" method="POST">
            {!! csrf_field() !!}
            @if(isset($method)) {{ method_field($method) }} @endif
            <div class="form-group">
                <label for="slug">Example label</label>
                <input type="text" name="slug" value="{{old('slug', isset($permission->slug) ? $permission->slug : '' )}}" class="form-control" id="slug">
            </div>
            <a href="{{$cancel}}" class="btn btn-warning float-left">Cancel</a>
            <button type="submit" class="btn btn-success float-right">{{$button}}</button>
        </form>
    </div>
</div>
