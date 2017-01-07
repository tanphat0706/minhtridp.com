@extends('backend.master')
@section('title', trans('user_group.add'))
@section('page_title') {{ trans('user_group.add') }}
@stop
@inject('userGroupService', 'App\Services\UserGroupServices')

@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <!-- form start -->
    {!! Form::open(['route'=>['store-user-group'], 'method'=> 'POST'])!!}
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ trans('user_group.name') }}</label>
                    <span class="required">*</span>
                    {!!Form::text('name', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ trans('user_group.note') }}</label>
                    {!!Form::text('note', null, array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row"><div class="col-md-6"><label for="roles">{{ trans('user_group.roles') }}</label><span class="required">*</span></div></div>
        {{--*/ $count = 0 /*--}}
        @foreach ($roleGroups as $group)
            {{--*/ $count++ /*--}}
            @if ($count <= $roleGroups->count())
            <div class="col-md-6">
                <label class="control-label" style="color: blue;">{{trans('role.'.$group->role_group) }}</label>
                <div class="form-group">
                    @foreach ($userGroupService->getRoles($group->role_group) as $role)
                    <label> {!!Form::checkbox( 'role[]', $role->code, false, array('class' => 'checkboxRole')) !!} {{ trans('role.'.$role->code) }} </label>
                    <br>
                    @endforeach
                </div>
            </div>
            @else
            <div class="col-md-6">
                <label class="control-label" style="color: blue;">{{ trans('role.'.$group->role_group) }}</label>
                <div class="form-group">
                    @foreach ( $userGroupService->getRoles($group->role_group) as $role)
                    <label> {!!Form::checkbox( 'role[]', $role->code, false, array('class' => 'checkboxRole')) !!} {{ trans('role.'.$role->code) }} </label>
                    <br>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach

    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ trans('system.finish') }}</button>
        <input type="checkbox" id="selecctall" />
        {{trans('system.select_all') }}
    </div>
    <!-- /.box -->
    {!! Form::close() !!}
</div>
    <!-- /.row -->
    @endsection @section('js')
    $(document).ready(function(){
       $('#selecctall').click(function() {
            var valueToSet = false;
            if ($(this).attr('checked') == 'checked') {
                valueToSet = true;
            }
            $(".checkboxRole").prop('checked', $(this).prop("checked"));
        });

        $(".checkboxRole").click(function() {
            var selectorCheckboxes = $(".checkboxRole");
            var isAllChecked = (selectorCheckboxes.size() == selectorCheckboxes.filter(':checked').size());
            $('#selecctall').prop('checked', isAllChecked);
        });

    });
    @endsection