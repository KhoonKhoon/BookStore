@extends('layouts.admin-layout')

@section('content')
    <x-utils.card :attrs="['title' => $form_name]">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br>

                <x-forms::form-tag :attrs="[
                    'class' => 'user-create-form',
                    'id' => 'user-create-form-id',
                    'action' => $store_route,
                    'method' => $method,
                    'formName' => 'user-create-form',
                ]">
                    <x-forms::text-input :attrs="[
                        'name' => 'name',
                        'id' => 'name',
                        'class' => '',
                        'value' => isset($user) ? $user->name : old('name'),
                        'placeholder' => '',
                        'label' => 'Name',
                        'required' => 'yes',
                    ]" />

                    <x-forms::text-input :attrs="[
                        'name' => 'email',
                        'id' => 'email',
                        'class' => '',
                        'value' => isset($user) ? $user->email : old('email'),
                        'placeholder' => '',
                        'label' => 'Email',
                        'required' => 'yes',
                    ]" />

                    <x-selec-with-mulitple-key-value :attrs="[
                        'name' => 'role_id[]',
                        'selected' => isset($user)
                            ? $user
                                ->roles()
                                ->pluck('name')
                                ->toArray()
                            : (old('role_ids')
                                ? old('role_ids')
                                : []),
                        'placeholder' => '',
                        'label' => 'Role',
                        'required' => 'yes',
                        'multiple' => 'multiple',
                        'id' => 'select2',
                        'list' => $roles,
                    ]" />

                    <x-selec-with-mulitple-key-value :attrs="[
                        'name' => 'team_id[]',
                        'selected' => isset($user)
                            ? $user
                                ->teams()
                                ->pluck('name')
                                ->toArray()
                            : (old('team_ids')
                                ? old('team_ids')
                                : []),
                        'placeholder' => '',
                        'label' => 'Team',
                        'required' => 'yes',
                        'multiple' => 'multiple',
                        'list' => $teams,
                    ]" />

                    <x-forms::select-with-value-value :attrs="[
                        'name' => 'status',
                        'selected' => isset($user) ? $user->status : old('status'),
                        'placeholder' => '',
                        'label' => 'Status',
                        'required' => 'yes',
                        'list' => ['active', 'inactive'],
                    ]" />

                    <x-forms::password-input :attrs="[
                        'name' => 'password',
                        'id' => 'password',
                        'class' => '',
                        'value' => '',
                        'placeholder' => '',
                        'label' => 'Password',
                        'required' => 'yes',
                    ]" />

                    <x-forms::password-input :attrs="[
                        'name' => 'password_confirmation',
                        'id' => 'password_confirmation',
                        'class' => '',
                        'value' => '',
                        'placeholder' => '',
                        'label' => 'Confirm Password',
                        'required' => 'yes',
                    ]" />

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary py-2 border">{{ $button }}</button>
                    </div>
                </x-forms::form-tag>
            </div>
            <div class="col-md-2"></div>
        </div>


    </x-utils.card>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2').val();
            $('.select2').trigger('change');
        });
    </script>
@endpush
