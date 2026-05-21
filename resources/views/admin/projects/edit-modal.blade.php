<!-- EDIT MODAL -->
<div class="modal fade" id="edit-project" tabindex="-1" aria-labelledby="edit-project-label" aria-hidden="true">

    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="edit-project-label">
                    Edit Project
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body" style="background-color: #f8f9fa;">

                <form id="editProjectForm" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" id="edit_id" name="id">

                    <div class="row gy-3">

                        <!-- title -->
                        <div class="col-6">
                            <label class="form-label">Nama Project</label>

                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>

                        <!-- slug -->
                        <div class="col-6">
                            <label class="form-label">Slug</label>

                            <input type="text" class="form-control" id="edit_slug" name="slug">
                        </div>

                        <!-- github -->
                        <div class="col-6">
                            <label class="form-label">GitHub Link</label>

                            <input type="text" class="form-control" id="edit_github_url" name="github_url">
                        </div>

                        <!-- thumbnail -->
                        <div class="col-6">
                            <label class="form-label">Thumbnail</label>

                            <input type="file" id="edit_thumbnail" class="dropify" name="thumbnail" />
                        </div>

                        <!-- description -->
                        <div class="col-6">
                            <label class="form-label">Description</label>

                            <input type="text" class="form-control" id="edit_description" name="description">
                        </div>

                        <!-- tags -->
                        <div class="col-6">

                            <label class="form-label">
                                Tags
                            </label>

                            <select class="form-select" id="edit_tags" name="tags[]" multiple>

                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">
                                        {{ $tag->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- featured -->
                        <div class="col-6">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value="1" id="edit_is_featured"
                                    name="is_featured">

                                <label class="form-check-label">
                                    masih berlangsung?
                                </label>

                            </div>
                        </div>

                        <!-- content -->
                        <div class="col-12">

                            <label class="form-label">Content</label>

                            <textarea class="form-control" id="edit_content" name="content" rows="6"></textarea>

                        </div>

                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>

                <button type="submit" form="editProjectForm" class="btn btn-primary">
                    Update
                </button>

            </div>

        </div>
    </div>
</div>
