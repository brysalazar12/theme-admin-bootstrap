@extends('layouts.main')

@section('main')
@include('partial.content-header',['header'=>'Role Manager','sub_header'=>'Edit Role'])
{{-- Start Row --}}
<div class="row">
	{{-- Start Col --}}
	<div class="col-lg-6">
		<h3>@lang('aliukevicius/laravelRbac::lang.role.updatePageTitle')</h3>
		<form action="{!! $formAction !!}" method="POST">
			<input type="hidden" name="_token" value="{!! csrf_token(); !!}">
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group <?= $errors->has('name') ? 'has-error' : '' ?>">
				<label class="control-label" for="name">@lang('aliukevicius/laravelRbac::lang.role.fieldName')</label>
				<input
						name="name"
						value="{!! Session::getOldInput('name', $role->name) !!}"
						class="form-control" id="name"
						placeholder="@lang('aliukevicius/laravelRbac::lang.role.fieldNamePlaceholder')">
			</div>

			<div class="form-group">
				<label class="control-label" for="description">@lang('aliukevicius/laravelRbac::lang.role.fieldDescription')</label>
				<textarea
						name="description"
						class="form-control"
						id="description"
						placeholder="@lang('aliukevicius/laravelRbac::lang.role.fieldDescriptionPlaceholder')"
						>{!! Session::getOldInput('description', $role->description) !!}</textarea>
			</div>

			<button type="submit" class="btn btn-primary">@lang('aliukevicius/laravelRbac::lang.role.updateRoleBtn')</button>
		</form>
	</div>
	{{-- End Col --}}
</div>
{{-- End Row --}}
@stop
