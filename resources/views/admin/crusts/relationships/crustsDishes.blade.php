<div class="m-3">
    @can('dish_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.dishes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.dish.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.dish.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-crustsDishes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.dish.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.dish.fields.product') }}
                            </th>
                            <th>
                                {{ trans('cruds.dish.fields.ingredients') }}
                            </th>
                            <th>
                                {{ trans('cruds.dish.fields.crusts') }}
                            </th>
                            <th>
                                {{ trans('cruds.dish.fields.category') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dishes as $key => $dish)
                            <tr data-entry-id="{{ $dish->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $dish->id ?? '' }}
                                </td>
                                <td>
                                    {{ $dish->product->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($dish->ingredients as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $dish->crusts->name ?? '' }}
                                </td>
                                <td>
                                    {{ $dish->category->name ?? '' }}
                                </td>
                                <td>
                                    @can('dish_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.dishes.show', $dish->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('dish_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.dishes.edit', $dish->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('dish_delete')
                                        <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dish_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dishes.massDestroy') }}",
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
  let table = $('.datatable-crustsDishes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection