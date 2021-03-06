@extends('layouts.main')

@section('styles')
<style>
    .actions a {
        color: #555;
    }

    .actions a:hover {
        color: #333;
        text-decoration: none;
    }

    .actions form {
        display: inline;
    }

    .actions .deleteRole {
        color: #d9534f;
        border: none;
        background: none;
        display: inline;
    }

    .actions .deleteRole:hover {
        color: #d9534f;
    }

</style>
@stop

@section('main')
@include('partial.content-header',['header'=>'Role Manager','sub_header'=>'Add, Edit and Delete Role'])

{{-- Start Row --}}
<div class="row">
	{{-- Start Col --}}
	<div class="col-lg-12">
		<div>
			@lang('aliukevicius/laravelRbac::lang.role.indexPageTitle')
		</div>
		{{-- Start Button Add New Role --}}
		<a href="{{ \URL::action('\\' . \Config::get('laravel-rbac.roleController') . '@create') }}" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> @lang('aliukevicius/laravelRbac::lang.role.addRoleBtn')
		</a>
		{{-- End Button Add New Role --}}

		{{-- Start Table --}}
		<table class="table table-striped">
			<thead>
			<tr>
				<th>@lang('aliukevicius/laravelRbac::lang.role.id')</th>
				<th>@lang('aliukevicius/laravelRbac::lang.role.name')</th>
				<th colspan="2">@lang('aliukevicius/laravelRbac::lang.role.description')</th>
			</tr>
			</thead>

			@foreach($list as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>{{ $role->description }}</td>
					<td class="actions">
						<div class="pull-right">
							<a href="{{ \URL::action('\\' . \Config::get('laravel-rbac.roleController') . '@edit', ['roles' => $role->id]) }}">
								<i class="glyphicon glyphicon-edit"></i>
							</a>

							<a
								href="{{ \URL::action('\\' . \Config::get('laravel-rbac.roleController') . '@destroy', ['roles' => $role->id]) }}"
								class="deleteRole"
								>
								<i class="glyphicon glyphicon-remove"></i>
							</a>

						</div>
					</td>
				</tr>
			@endforeach
		</table>
		{{-- End Table --}}

		{!! $list->render() !!}
	</div>
	{{-- End Col --}}
</div>
{{-- End Row --}}

<div class="modal fade" role="dialog" id="deleteConfirmationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">@lang('aliukevicius/laravelRbac::lang.role.confirmDeleteModalTitle')</h4>
            </div>
            <div class="modal-body">
                @lang('aliukevicius/laravelRbac::lang.role.confirmDeleteModalMessage')
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token(); !!}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button
                            type="button"
                            class="btn btn-default"
                            data-dismiss="modal">@lang('aliukevicius/laravelRbac::lang.role.confirmDeleteModalCancelBtn')
                    </button>
                    <button
                            type="submit"
                            class="btn btn-danger">
                        @lang('aliukevicius/laravelRbac::lang.role.confirmDeleteModalDeleteBtn')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerJs')
	@parent
	<script type="text/javascript">
		$(function(){
			$('.actions .deleteRole').click(function(e) {
				e.preventDefault();
				$('#deleteConfirmationModal form').attr('action', $(this).attr('href'));
				$('#deleteConfirmationModal').modal("show");
			});
		});
	</script>
@endsection