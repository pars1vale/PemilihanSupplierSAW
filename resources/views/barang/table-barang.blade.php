<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Data Barang</h4>
            <p class="card-description">
                Tabel Data barang
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal Produksi</th>
                            <th scope="col">Tanggal Kadaluarsa</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $b)
                        <tr>
                            <td>{{ $b->nama_barang }}</td>
                            <td>{{ $b->satuan }}</td>
                            <td>{{ $b->deskripsi }}</td>
                            <td>{{ $b->tanggal_produksi }}</td>
                            <td>{{ $b->tanggal_kadaluarsa }}</td>
                            <td>
                                <form action="{{ route('barang.destroy',$b->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning"><span
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