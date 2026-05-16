<!-- add modal -->
<div class="modal fade" id="add-project" tabindex="-1" aria-labelledby="add-project-label" aria-hidden="true">

    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-lg">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title" id="add-project-label">Tambah Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="addProjectForm" enctype="multipart/form-data">

                    @csrf
                    <div class="row gy-3">



                        {{-- Content --}}
                        <div class="col-12">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="6"></textarea>
                        </div>

                        <div class="col-12">

                            <input type="hidden" name="content" id="editor-content" value="{{ old('content') }}">

                            <div class="form-group mb-3">

                                <label class="form-label fw-bold">
                                    Konten
                                </label>

                                {{-- TOOLBAR --}}
                                <div class="btn-toolbar p-2 border border-bottom-0 rounded-top-2 bg-light gap-2"
                                    role="toolbar">

                                    {{-- TEXT --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-bold">
                                            <b>B</b>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-italic">
                                            <i>I</i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            id="btn-underline">
                                            <u>U</u>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-strike">
                                            <s>S</s>
                                        </button>
                                    </div>

                                    {{-- HEADING --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            id="btn-heading-1">
                                            H1
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            id="btn-heading-2">
                                            H2
                                        </button>
                                    </div>

                                    {{-- LIST --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-bullet">
                                            • List
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            id="btn-ordered">
                                            1. List
                                        </button>
                                    </div>

                                    {{-- BLOCK --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-quote">
                                            Quote
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-hr">
                                            HR
                                        </button>
                                    </div>

                                    {{-- HISTORY --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-undo">
                                            Undo
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-redo">
                                            Redo
                                        </button>
                                    </div>

                                    {{-- LINK --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-link">
                                            Link
                                        </button>
                                    </div>

                                    {{-- IMAGE --}}
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-image">
                                            Image
                                        </button>
                                    </div>

                                </div>

                                {{-- EDITOR --}}
                                <div id="tiptap-editor"></div>

                            </div>
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
