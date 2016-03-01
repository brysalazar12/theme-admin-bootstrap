@extends('layouts.main')

@section('main')
@include('partial.content-header',['header'=>'Role Manager','sub_header'=>'Add Role'])
{{-- Start Row --}}
<div class="row">
	{{-- Start Col --}}
	<div class="col-lg-6">
		<h3>@lang('aliukevicius/laravelRbac::lang.role.createPageTitle')</h3>
        <form action="{!! $formAction !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token(); !!}">

            <div class="form-group <?= $errors->has('name') ? 'has-error' : '' ?>">
                <label class="control-label" for="name">@lang('aliukevicius/laravelRbac::lang.role.fieldName')</label>
                <input
                        name="name"
                        value="{!! Session::getOldInput('name', '') !!}"
                        class="form-control"
                        id="name"
                        placeholder="@lang('aliukevicius/laravelRbac::lang.role.fieldNamePlaceholder')">
            </div>

            <div class="form-group <?= $errors->has('description') ? 'has-error' : '' ?>">
                <label class="control-label" for="description">@lang('aliukevicius/laravelRbac::lang.role.fieldDescription')</label>
                <textarea
                        name="description"
                        class="form-control"
                        id="description"
                        placeholder="@lang('aliukevicius/laravelRbac::lang.role.fieldDescriptionPlaceholder')"
                        >{!! Session::getOldInput('description', '') !!}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">@lang('aliukevicius/laravelRbac::lang.role.createRoleBtn')</button>
        </form>
	</div>
	{{-- End Col --}}
</div>
{{-- End Row --}}
@stop
