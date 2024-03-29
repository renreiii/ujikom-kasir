@extends('layouts.master')

@section('title')
    Daftar Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Produk</li>
@endsection

@section('content')
    @if (auth()->user()->level == 1)
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="btn-group">
                            <button onclick="addForm('{{ route('produk.store') }}')"
                                class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
                            <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')"
                                class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Hapus</button>
                            <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')"
                                class="btn btn-info btn-xs btn-flat"><i class="fa fa-barcode"></i> Cetak Barcode</button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <form action="" method="post" class="form-produk">
                            @csrf
                            <label for="filter-kategori">Filter Kategori:</label>
                            <select id="filter-kategori" class=" form-control margin-bottom" style="width: 15rem;">
                                <option value=""></option>
                            </select>
                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th width="5%">
                                        <input type="checkbox" name="select_all" id="select_all">
                                    </th>
                                    <th width="5%">No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Diskon</th>
                                    <th>Stok</th>
                                    <th width="15%"><i class="fa fa-cog"></i></th>
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="btn-group">
                            @if (auth()->user()->level == 1)
                                <button onclick="addForm('{{ route('produk.store') }}')"
                                    class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>
                                    Tambah</button>
                                <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')"
                                    class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Hapus</button>
                            @endif
                            <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')"
                                class="btn btn-info btn-xs btn-flat"><i class="fa fa-barcode"></i> Cetak Barcode</button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <form action="" method="post" class="form-produk">
                            @csrf
                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th width="5%">
                                        <input type="checkbox" name="select_all" id="select_all">
                                    </th>
                                    <th width="5%">No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Diskon</th>
                                    <th>Stok</th>
                                    @if (auth()->user()->level == 1)
                                        <th width="15%"><i class="fa fa-cog"></i></th>
                                    @endif
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @includeIf('produk.form')
@endsection

@push('scripts')
    <script>
        let table;
        $(function() {
            $.ajax({
                url: '{{ route('kategori.data') }}',
                type: 'GET',
                success: function(response) {
                    var select = $('#filter-kategori');
                    select.empty();
                    select.append('<option value="">All</option>');

                    // Iterate through the response data and add options to the dropdown
                    $.each(response.data, function(index, category) {
                        select.append('<option value="' + category.nama_kategori + '">' + category.nama_kategori + '</option>');
                    });
                }
            });

            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('produk.data') }}',
                },
                columns: [{
                        data: 'select_all',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_produk'
                    },
                    {
                        data: 'nama_produk'
                    },
                    {
                        data: 'nama_kategori'
                    },
                    {
                        data: 'merk'
                    },
                    {
                        data: 'harga_beli'
                    },
                    {
                        data: 'harga_jual'
                    },
                    {
                        data: 'diskon'
                    },
                    {
                        data: 'stok'
                    },
                    @if (auth()->user()->level == 1)
                        {
                            data: 'aksi',
                            searchable: false,
                            sortable: false
                        },
                    @endif
                ],
            });

            $('#filter-kategori').on('change', function() {
                var selectedCategory = $(this).val();
                table.column(4).search(selectedCategory).draw(); // Assuming "Kategori" is the 5th column (index 4)
            });

            $('#modal-form').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                        .done((response) => {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });

            $('[name=select_all]').on('click', function() {
                $(':checkbox').prop('checked', this.checked);
            });
        });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Produk');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=nama_produk]').focus();
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Produk');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=nama_produk]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-form [name=nama_produk]').val(response.nama_produk);
                    $('#modal-form [name=id_kategori]').val(response.id_kategori);
                    $('#modal-form [name=merk]').val(response.merk);
                    $('#modal-form [name=harga_beli]').val(response.harga_beli);
                    $('#modal-form [name=harga_jual]').val(response.harga_jual);
                    $('#modal-form [name=diskon]').val(response.diskon);
                    $('#modal-form [name=stok]').val(response.stok);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }

        function deleteSelected(url) {
            if ($('input:checked').length > 1) {
                if (confirm('Yakin ingin menghapus data terpilih?')) {
                    $.post(url, $('.form-produk').serialize())
                        .done((response) => {
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menghapus data');
                            return;
                        });
                }
            } else {
                alert('Pilih data yang akan dihapus');
                return;
            }
        }

        function cetakBarcode(url) {
            if ($('input:checked').length < 1) {
                alert('Pilih data yang akan dicetak');
                return;
            } else if ($('input:checked').length < 3) {
                alert('Pilih minimal 3 data untuk dicetak');
                return;
            } else {
                $('.form-produk')
                    .attr('target', '_blank')
                    .attr('action', url)
                    .submit();
            }
        }
    </script>
@endpush
