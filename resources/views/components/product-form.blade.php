<form method="POST" action="{{ $action }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" class="form-control" name="price" required>
    </div>
    
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</form>