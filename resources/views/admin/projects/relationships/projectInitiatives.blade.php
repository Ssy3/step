@can('initiative_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.initiatives.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.initiative.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.initiative.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-projectInitiatives">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.initiative.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.initiative.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.initiative.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.initiative.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.initiative.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.initiative.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($initiatives as $key => $initiative)
                        <tr data-entry-id="{{ $initiative->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $initiative->id ?? '' }}
                            </td>
                            <td>
                                {{ $initiative->title ?? '' }}
                            </td>
                            <td>
                                {{ $initiative->project->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Initiative::STATUS_SELECT[$initiative->status] ?? '' }}
                            </td>
                            <td>
                                @foreach($initiative->users as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $initiative->updated_at ?? '' }}
                            </td>
                            <td>
                                @can('initiative_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.initiatives.show', $initiative->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('initiative_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.initiatives.edit', $initiative->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('initiative_delete')
                                    <form action="{{ route('admin.initiatives.destroy', $initiative->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('initiative_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.initiatives.massDestroy') }}",
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
  let table = $('.datatable-projectInitiatives:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection