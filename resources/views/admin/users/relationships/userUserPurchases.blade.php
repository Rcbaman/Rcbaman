<div class="m-3">
    @can('user_purchase_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.user-purchases.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.userPurchase.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.userPurchase.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-userUserPurchases">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.userPurchase.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.userPurchase.fields.package_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.userPurchase.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.userPurchase.fields.hours') }}
                            </th>
                            <th>
                                {{ trans('cruds.userPurchase.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.userPurchase.fields.transaction_detail') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userPurchases as $key => $userPurchase)
                            <tr data-entry-id="{{ $userPurchase->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $userPurchase->id ?? '' }}
                                </td>
                                <td>
                                    {{ $userPurchase->package_name ?? '' }}
                                </td>
                                <td>
                                    {{ $userPurchase->price ?? '' }}
                                </td>
                                <td>
                                    {{ $userPurchase->hours ?? '' }}
                                </td>
                                <td>
                                    {{ $userPurchase->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $userPurchase->user->email ?? '' }}
                                </td>
                                <td>
                                    {{ $userPurchase->transaction_detail ?? '' }}
                                </td>
                                <td>
                                    @can('user_purchase_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.user-purchases.show', $userPurchase->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('user_purchase_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.user-purchases.edit', $userPurchase->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('user_purchase_delete')
                                        <form action="{{ route('admin.user-purchases.destroy', $userPurchase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_purchase_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-purchases.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-userUserPurchases:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection