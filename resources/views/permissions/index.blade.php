@extends('layouts.admin-layout')

@section('content')


<div class="card m-4">
    <div class="card-header">
        <div class=" h5 headings">Permissions</div>

    </div>
    <div class="card-body">
            <div class="row">

                @foreach ($permissions as $k => $permission)
                    <div class="column col-md-3">
                        <h6 class="fw-bold mb-2 pb-3">{{ strtoupper($k) }}</h6>
                        <label class="col-md-4">
                            <input type="checkbox" value="dashboard" class="select-all" />
                            <b> All</b>
                        </label>
                        @foreach ($permission as $key => $value)
                            <div class="text-left">
                                <label class="col-md-12" for="{{ $value->id }}">
                                    <input type="checkbox" class="child-item-{{ str_lower_rm_space($k) }} child-item"
                                        @if (in_array($value->id, $given_permissions)) checked="checked" @endif id="{{ $value->id }}"
                                        value="{{ $value->id }}"
                                        name="permissions[{{ str_lower_rm_space($k) }}][{{ str_lower_rm_space($k) }}][{{ $value->id }}]" />
                                    {{ $value->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>

            <div class="text-left pt-5">

                <button type="submit" name="form-submit-button" form="permission-form" class="btn btn-primary btn-hover py-2">
                    {{ __($button) }}
                </button>
            </div>

@endsection
