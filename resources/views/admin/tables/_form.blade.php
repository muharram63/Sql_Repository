<div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $table->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $table->description ?? '') }}</textarea>
</div>
