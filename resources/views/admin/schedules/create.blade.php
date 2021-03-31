@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'schedules.store', 'files'=>true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kegiatan</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all())}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('title', 'Kegiatan') }}
                                    {{ Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Judul Kegiatan']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('date', 'Tanggal Kegiatan') }}
                                    {{ Form::text('date', '', ['class'=>'form-control', 'id'=>'date', 'name'=>'date', 'placeholder'=>'Masukkan Tanggal Kegiatan']) }}       
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('time', 'Tanggal Kegiatan') }}
                                    {{ Form::text('time', '', ['class'=>'form-control', 'id'=>'time', 'name'=>'time', 'placeholder'=>'Masukkan Tanggal Kegiatan']) }}      
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('file', 'Proposal') }}
                                    {{ Form::file('file', ['class'=>'form-control']) }}        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{ Form::label('contents', 'Pengumuman') }}
                                {{ Form::textarea('contents', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Pengumuman', 'rows'=>5]) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin/announcements/index') }}" class="btn btn-outline-info">Kembali</a>
                        {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>

    <script>
    $(document).ready(function() {            
    $('#date').datepicker({                      
        format: 'dd-mm-yyyy',
        autoclose: true,
        }); 
    $('#time').datetimepicker({
        format: 'hh:mm:ss',
    });
    });
    </script> 
@endsection