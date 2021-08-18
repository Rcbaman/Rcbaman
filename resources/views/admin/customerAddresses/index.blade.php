@extends('layouts.admin')
@section('content')
@can('customer_address_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.customer-addresses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.customerAddress.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.customerAddress.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CustomerAddress">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customerAddress.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerAddress.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerAddress.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerAddress.fields.address_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerAddress.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerAddress.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerAddress.fields.zip') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($customer_details as $key => $item)
                                    <option value="{{ $item->first_name }}">{{ $item->first_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customerAddresses as $key => $customerAddress)
                        <tr data-entry-id="{{ $customerAddress->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $customerAddress->id ?? '' }}
                            </td>
                            <td>
                                {{ $customerAddress->customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $customerAddress->address ?? '' }}
                            </td>
                            <td>
                                {{ $customerAddress->address_2 ?? '' }}
                            </td>
                            <td>
                                {{ $customerAddress->country ?? '' }}
                            </td>
                            <td>
                                {{ $customerAddress->state ?? '' }}
                            </td>
                            <td>
                                {{ $customerAddress->zip ?? '' }}
                            </td>
                            <td>
                                @can('customer_address_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.customer-addresses.show', $customerAddress->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('customer_address_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.customer-addresses.edit', $customerAddress->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('customer_address_delete')
                                    <form action="{{ route('admin.customer-addresses.destroy', $customerAddress->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('customer_address_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.customer-addresses.massDestroy') }}",
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
  let table = $('.datatable-CustomerAddress:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection