<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Data Kriteria</h4>
            <p class="card-description">
                Tabel Kriteria
            </p>
            <div class="table-responsive">
                <table id="mytable" class="table">
                    <thead>
                        <tr>
                            <th>Nama Kriteria</th>
                            <th>Sifat</th>
                            <th>Bobot</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($criteriaweights as $c)
                        <tr>
                            <td>{{ $c->name}}</td>
                            <td>{{ $c->type}}</td>
                            <td>{{ $c->weight}}</td>
                            <td>{{ $c->description}}</td>
                            <td>
                                <form action="{{ route('criteriaweights.destroy',$c->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                        <a href="{{ route('criteriaweights.edit',$c->id) }}" class="btn btn-warning"><span
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