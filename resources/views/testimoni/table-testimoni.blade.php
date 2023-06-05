<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Data Testimoni</h4>
            <p class="card-description">
                Tabel Testimoni
            </p>
            <div class="table-responsive">
                <table id="mytable" class="table">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Nama Supplier</th>
                            <th>Rating</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimoni as $t)
                        <tr>
                            <td>{{ $t->namabar}}</td>
                            <td>{{ $t->namasup}}</td>
                            <td>{{ $t->rating}}</td>
                            <td>{{ $t->ket}}</td>
                            <td>
                                <form action="{{ route('testimoni.destroy',$t->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <a href="{{ route('testimoni.edit',$t->id) }}" class="btn btn-warning"><span
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