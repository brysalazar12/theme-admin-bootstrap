@extends('layouts.main')

@section('main')
@include('partial.content-header',['header'=>'Permission Manager','sub_header'=>'List Route'])
{{-- Start Row --}}
<div class="row">
	{{-- Start Col --}}
	<div class="col-lg-12">
		<form action="{{ \URL::action('\\' . \Config::get('laravel-rbac.permissionController') . '@savePermissions') }}" method="POST">
			<input type="hidden" name="_token" value="{!! csrf_token(); !!}">
			<h3>@lang('aliukevicius/laravelRbac::lang.permissions.indexPageTitle')</h3>
			<table class="table table-striped">
				<thead>
				<tr>
					<th></th>
					@foreach($roles as $r)
						<th class="text-center">{{ $r->name }}</th>
					@endforeach
				</tr>
				</thead>

				@foreach($permissions as $controllerName => $pList)
					<tr class="info">
						<td colspan="{{ $roleCount + 1 }}">{{ $controllerName }}</td>
					</tr>

					@foreach($pList as $actionName => $permissionId)
						<tr>
							<td>{{ $actionName }}</td>

							@foreach($roles as $r)
								<td class="text-center">
									<input
											type="checkbox"
											name="permissions[{{ $r->id }}][{{ $permissionId }}]"
											value="{{ $permissionId }}"
											<?= isset($rolePermissions[$r->id][$permissionId]) ? 'checked' : '' ?>
											/>
								</td>
							@endforeach
						</tr>
					@endforeach
				@endforeach
			</table>

			<a href="{{ \URL::action('\\' . \Config::get('laravel-rbac.permissionController') . '@updatePermissionList') }}" class="btn btn-primary">
				<i class="glyphicon glyphicon-refresh"></i> @lang('aliukevicius/laravelRbac::lang.permission.refreshPermissionListBtn')
			</a>

			<button type="submit" class="btn btn-success pull-right">
				<i class="glyphicon glyphicon-ok"></i> @lang('aliukevicius/laravelRbac::lang.permission.savePermissionsBtn')
			</button>
		</form>
	</div>
	{{-- End Col --}}
</div>
{{-- End Row --}}
@stop
