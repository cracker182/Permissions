<div class="row" style="margin-top:30px;margin-bottom:30px;">
    <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
        <form action="{{$action}}" method="POST">
            {!! csrf_field() !!}
            @if(isset($method)) {{ method_field($method) }} @endif
            @php
                $fields = ['name', 'slug'];
            @endphp
            @foreach ($fields as $field)
                <div class="form-group">
                    <label for="{{$field}}">{{ucfirst($field)}}</label>
                    <input type="text" name="{{$field}}" value="{{old($field, isset($permission->$field) ? $permission->$field : '' )}}" class="form-control" id="{{$field}}">
                    <strong class="text-danger">{{ $errors->first($field) }}</strong>
                </div>
            @endforeach
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3">{{old('description', isset($permission->description) ? $permission->description : '' )}}</textarea>
              <strong class="text-danger">{{ $errors->first('description') }}</strong>
            </div>
            <a href="{{$cancel}}" class="btn btn-warning float-left">Cancel</a>
            <button type="submit" class="btn btn-success float-right">{{$button}}</button>
        </form>
    </div>
</div>
