@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.note.management'))

@section('breadcrumb-links')
    @include('backend.note.includes.breadcrumb-links')
@endsection

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">

              @foreach($notes as $note)
              @if($note->type==1)
              <div class="col-sm-6 col-md-4">
                <div class="card border-success">
                  <div class="card-header"><i class="fas fa-thumbtack"></i>
                    @if($note->type==1)
                     @lang('labels.backend.access.note.table.created_by'): {{ optional($note->generated_by)->name }}
                    @endif
                    <div class="card-header-actions">
                      <a class="card-header-action btn-setting" data-toggle="modal" href="#" data-id="{{ $note->id }}" data-content="{{  $note->content  }}" data-target="#editNote">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="card-header-action btn-minimize" href="#" data-toggle="collapse" data-target="#{{ 'a'.$note->id }}" aria-expanded="true">
                        <i class="fas fa-chevron-up"></i>
                      </a>

                      <a class="card-header-action btn-close" href="{{ route('admin.note.destroy', $note->id) }}" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}">
                        <i class="fas fa-times"></i>
                      </a>
                    </div>
                  </div>
                  <div class="collapse show" id="a{{ $note->id }}">
                    <div class="card-body">
                      {{ $note->content }}
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              @else
              <div class="col-sm-6 col-md-4">
                <div class="card border-warning">
                  <div class="card-header"><i class="fas fa-thumbtack"></i>

                    <div class="card-header-actions">
                      <a class="card-header-action btn-setting" data-toggle="modal" href="#" data-id="{{ $note->id }}" data-content="{{  $note->content  }}" data-target="#editNote">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="card-header-action btn-minimize" href="#" data-toggle="collapse" data-target="#a{{ $note->id }}" aria-expanded="true">
                        <i class="fas fa-chevron-up"></i>
                      </a>
                      <a class="card-header-action btn-close" href="{{ route('admin.note.destroy', $note->id) }}" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}">
                        <i class="fas fa-times"></i>
                      </a>
                    </div>
                  </div>
                  <div class="collapse show" id="a{{ $note->id }}">
                    <div class="card-body">
                      {{ $note->content }}
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              @endif
              @endforeach

            </div>
          </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <div class="float-left">
                            {!! $notes->total() !!} {{ trans_choice('labels.backend.access.note.note', $notes->total()) }}
                        </div>
                    </div><!--col-->

                    <div class="col-5">
                        <div class="float-right">
                            {{ $notes->links() }}
                        </div>
                    </div><!--col-->
                </div><!--row-->

          </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="addNoteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNoteLabel">@lang('labels.backend.access.note.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.note.store') }}">
       @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="content" class="col-form-label">@lang('labels.backend.access.note.table.content'):</label>
            <input type="text" class="form-control" name="content" id="content" required>
          </div>

          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active">
              <input type="radio" name="type" id="type" value="1" autocomplete="off" checked> @lang('labels.backend.access.note.table.general')
            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="type" id="type" value="2" autocomplete="off"> @lang('labels.backend.access.note.table.personal')
            </label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('labels.general.buttons.close')</button>
        <button type="submit" class="btn btn-primary">@lang('labels.general.buttons.save')</button>
      </div>

    </form>

    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editNote" tabindex="-1" role="dialog" aria-labelledby="editNoteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editNoteLabel">@lang('labels.backend.access.note.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.note.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="content" class="col-form-label">@lang('labels.backend.access.note.table.content'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" name="content" id="content" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('labels.general.buttons.close')</button>
        <button type="submit" class="btn btn-primary">@lang('labels.general.buttons.save')</button>
      </div>

    </form>

    </div>
  </div>
</div>

@endsection




@push('after-scripts')
<script>
    $('#editNote').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var mycontent = button.data('content')
      var myid = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #content').val(mycontent)
      modal.find('.modal-body #id').val(myid)
    });
</script>
@endpush