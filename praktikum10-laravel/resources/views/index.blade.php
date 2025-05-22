<!DOCTYPE html>
<html>
<head>
    <title>Novi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Halo! Saya {{ 'Novi Lailatul Faizah' }}</h1>
    <p>NIM: {{ '2211102110' }}</p>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Button Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Snack</button>

    <!-- Tabel Snack -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Snack</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($snacks as $snack)
                <tr>
                    <td>{{ $snack->name }}</td>
                    <td>Rp{{ number_format($snack->price, 0, ',', '.') }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $snack->id }}">Edit</button>

                        <!-- Delete Button -->
                        <form action="{{ route('snack.destroy', $snack->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $snack->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('snack.update', $snack->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Snack</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                              <label class="form-label">Nama</label>
                              <input type="text" class="form-control" name="name" value="{{ $snack->name }}" required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Harga</label>
                              <input type="number" class="form-control" name="price" value="{{ $snack->price }}" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('snack.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Snack</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Harga</label>
              <input type="number" class="form-control" name="price" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
