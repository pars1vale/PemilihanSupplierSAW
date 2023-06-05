<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Riwayat Pembelian</h4>
            <p class="card-description">Tabel Data Riwayat Pembelian</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Nama Supplier</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayatpembelian as $r)
                        <tr>
                            <td>{{ $r->namabar }}</td>
                            <td>{{ $r->namasup }}</td>
                            <td>{{ $r->tgl }}</td>
                            <td>{{ $r->jmlbarang }}</td>
                            <td>{{ $r->satuan }}</td>
                            <td>{{ $r->total }}</td>
                            <td>{{ $r->status }}</td>
                            <td>
                                <form action="{{ route('riwayat.destroy',$r->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <a href="{{ route('riwayat.edit',$r->id) }}" class="btn btn-warning"><span
                                                class="fa fa-edit">Edit</span>
                                        </a>
                                    </span>
                                    <span data-toggle="tooltip" data-placement="bottom" title="Delete Data">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="fa fa-trash-alt">Hapus</span>
                                        </button>
                                    </span>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>