{!! Form::open(['class'=>'model-form','method' => 'POST','route' => ['settings.follow-description']]) !!}
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6">
                Description of Classroom
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <button type="submit" name="save" class="btn bg-blue">
                        <i class="fa fa-floppy-o"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        @if($errors->has('follow_description'))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('follow_description') as $error)
                <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    {!! Form::textarea('follow_description', $follow_description, array('placeholder' => 'Write Something','class' => 'form-control exam-assign-email', 'id' => 'follow-description', 'rows' => 3)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
