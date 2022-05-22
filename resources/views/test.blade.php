


 
 <?Php $top_links="<a href=../dropdown-list-three.php>Three Dropdown list </a>"; ?>

  

<form action="{{ route("admin.offices.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="country">{{ trans('global.office.fields.country') }}</label>
        <select name="country_id" id="country" class="form-control">
            @foreach($countries as $id => $country)
                <option value="{{ $id }}">
                    {{ $country }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
        <label for="city">{{ trans('global.office.fields.city') }}</label>
        <select name="city_id" id="city" class="form-control">
            <option value="">{{ trans('global.pleaseSelect') }}</option>
        </select>
        @if($errors->has('city_id'))
            <p class="help-block">
                {{ $errors->first('city_id') }}
            </p>
        @endif
    </div>