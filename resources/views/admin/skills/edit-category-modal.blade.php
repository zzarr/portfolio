<div class="modal fade" id="edit-skill-category" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Edit Kategori</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
        <div class="modal-body"><form id="editSkillCategoryForm">@csrf
            <input type="hidden" id="edit_category_id" name="id">
            <label class="form-label" for="edit_skill_category_name">Nama Kategori</label>
            <input type="text" id="edit_skill_category_name" name="name" class="form-control" required>
        </form></div>
        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="editSkillCategoryForm" class="btn btn-primary">Update</button></div>
    </div></div>
</div>
