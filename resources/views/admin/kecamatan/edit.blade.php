@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('kecamatan.update', $kecamatans->id) }}" method="post">
            @csrf
            @method('put')
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Kecamatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Name provinsi</label>
                            <select name="provinsi_id" id="provinsi"
                                class="form-select @error('provinsi_id') is-invalid @enderror">
                                @foreach ($provinsis as $provinsi)
                                    @if (old('provinsi_id', $provinsi->id) == $kecamatans->provinsi_id)
                                        <option value="{{ $provinsi->id }}" selected hidden>{{ $provinsi->provinsi }}
                                        </option>
                                    @else
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->provinsi }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('provinsi_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kota</label>
                            <select name="kota_id" id="kota"
                                class="form-select @error('kota_id') is-invalid @enderror">
                                @foreach ($kotas as $kota)
                                    @if (old('kota_id', $kota->id) == $kecamatans->kota_id)
                                        <option value="{{ $kota->id }}" selected>
                                            {{ $kota->kota }}</option>
                                    @else
                                        <option value="{{ $kota->id }}">{{ $kota->kota }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kota_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama kecamatan</label>
                            <input type="text" name="kecamatan"
                                class="form-control mb-2  @error('kecamatan') is-invalid @enderror"
                                placeholder="Nama kecamatan" value="{{ $kecamatans->kecamatan }}">
                            @error('kecamatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex float-start">
                    <a href="/admin/kota" class="btn btn-danger me-3"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                            fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                        </svg> Kembali</a>
                </div>
                <div class="d-flex float-end">
                    <div class="col">
                        <button type="reset" class="btn btn-secondary mx-3">
                            <span class="indicator-label"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg> Reset </span>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                </svg> Kirim </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#provinsi').on('change', function() {
                var provinsi_id = $(this).val();
                if (provinsi_id) {
                    $.ajax({
                        url: '/admin/getKota/' + provinsi_id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#kota').empty();
                                $('#kota').append(
                                    '<option hidden>Pilih Kota</option>');
                                $.each(data, function(key, kotas) {
                                    $('select[name="kota_id"]').append(
                                        '<option value="' + kotas.id + '">' +
                                        kotas.kota + '</option>');
                                });
                            } else {
                                $('#kota').empty();
                            }
                        }
                    });
                } else {
                    $('#kota').empty();
                }
            });
        });
    </script>
@endsection