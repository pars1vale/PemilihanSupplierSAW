<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabel Data Alternative</h4>
            <p class="card-description">
                Tabel Alternative
            </p>
            <div class="table-responsive">
                <table id="mytable" class="table">
                    <thead>
                        <tr>
                            <th>Nama Supplier</th>
                            @foreach ($criteriaweights as $c)
                                <th>{{ $c->name }}</th>
                            @endforeach
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatives as $alternative)
                            <tr>
                                <td>
                                    @if ($alternative->supplier)
                                        {{ $alternative->supplier->nama_supplier }}
                                    @else
                                        Supplier not found
                                    @endif
                                </td>
                                @php
                                    $scr = $scores->where('ida', $alternative->id)->all();
                                @endphp
                                @foreach ($scr as $s)
                                    <td>{{ $s->description }}</td>
                                @endforeach

                                <td>
                                    <form action="{{ route('alternatives.destroy', $alternative->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                            <a href="{{ route('alternatives.edit', $alternative->id) }}"
                                                class="btn btn-warning"><span class="fa fa-edit">Edit</span>
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
