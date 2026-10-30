<div class="modal fade" id="add-skill" tabindex="-1" aria-labelledby="add-skill-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-skill-label">Tambah Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSkillForm">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-xl-6">
                            <label class="form-label" for="skill_name">Nama Skill</label>
                            <input type="text" id="skill_name" name="name" class="form-control"
                                placeholder="Contoh: Laravel" required>
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label" for="skill_category_id">Kategori</label>
                            <select id="skill_category_id" name="skill_category_id" class="form-select" required>
                                <option value="">Pilih kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="addSkillForm" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
