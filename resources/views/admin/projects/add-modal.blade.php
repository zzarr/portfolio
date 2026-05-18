<!-- add modal -->
<div class="modal fade" id="add-project" tabindex="-1" aria-labelledby="add-project-label" aria-hidden="true">

    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-lg">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="add-project-label">Tambah Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body " style="background-color: #f8f9fa;">
                <form id="addProjectForm" enctype="multipart/form-data">

                    @csrf
                    <div class="row gy-3">
                        <!-- Nama Project -->
                        <div class="col-6">
                            <label for="title" class="form-label">Nama Project</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter project name">
                        </div>
                        <!-- slug (optional) -->
                        <div class="col-6">
                            <label for="slug" class="form-label">Slug (optional)</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                placeholder="Enter project slug">

                        </div>

                        <!-- github link -->
                        <div class="col-6">
                            <label for="github_url" class="form-label">GitHub Link</label>
                            <input type="text" class="form-control" id="github_url" name="github_url"
                                placeholder="Enter GitHub repository URL">
                        </div>
                        <!--- thumbnail -->
                        <div class="col-6">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" id="thumbnail" class="dropify" name="thumbnail" />
                        </div>

                        <div class="col-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter project description">
                        </div>

                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="is_futured"
                                    name="is_futured">

                                <label class="form-check-label" for="is_futured">
                                    masih berlangsung?
                                </label>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="col-6">
                            <label for="tags" class="form-label">Tags</label>

                            <select class="form-select" id="tags" name="tags[]" multiple>

                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">
                                        {{ $tag->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>



                        {{-- Content --}}
                        <div class="col-12">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="6"></textarea>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-wave waves-effect waves-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" form="addProjectForm" id="addProjectBtn "
                    class="btn btn-primary btn-wave waves-effect waves-light">Save changes</button>
            </div>

        </div>
    </div>

</div>
