@extends('admin/admin')
@section('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('breadcrumb')
UTS
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">UTS</h3>
      </div>
      <!-- /.box-header -->
      <form action="{{url('nilai/save')}}" method="post">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <label>NIM</label>
              <input type="text" class="form-control" placeholder="Masukkan NIM" name="nim" required>
            </div>
            <div class="col-md-4">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required>
            </div>
            <div class="col-md-4">
              <label>Program Studi</label>
              <select class="form-control select2" style="width: 100%;" name="prodi" required>
                <option selected="selected" disabled="disabled">-- Pilih Program Studi --</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-3">
              <label>Nilai Absen</label>
              <input type="number" class="form-control" placeholder="Masukkan Nilai Absen" name="absen" required>
            </div>
            <div class="col-md-3">
              <label>Nilai Tugas</label>
              <input type="number" class="form-control" placeholder="Masukkan Nilai Tugas" name="tugas" required>
            </div>
            <div class="col-md-3">
              <label>Nilai UTS</label>
              <input type="number" class="form-control" placeholder="Masukkan Nilai UTS" name="uts" required>
            </div>
            <div class="col-md-3">
              <label>Nilai UAS</label>
              <input type="number" class="form-control" placeholder="Masukkan Nilai UAS" name="uas" required>
            </div>
          </div>
          @if (!empty($data))
            <hr>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-info"></i> Hasil Perhitungan !</h4>
              <p>NIM                 :{{$data['nim']}}</p>
              <p>Nama                :{{$data['nama']}}</p>
              <p>Program Studi       :{{$data['prodi']}}</p>
              <p>Nilai Akhir         :{{$data['nilaiakhir']}}</p>
              <p>Grade & Keterangan  :{{$data['grade']}} 
                @if ($data['grade'] == "E")
                  <small class="label label-danger">{{$data['keterangan']}}</small>
                @else
                  <small class="label label-info">{{$data['keterangan']}}</small>
                @endif
            </p>
            </div>
          @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="{{url("uts")}}" class="btn btn-default">Reset</a>
          <button type="submit" class="btn btn-info">Hitung</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
    
  </div>
  <!-- /.col -->
</div>
@endsection

@section('js')

<!-- bootstrap datepicker -->
<script src="{{ asset('lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "dd-mm-yyyy"
    });

</script>
    
@endsection
