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
                            <div x-data="createEditor(@js(old('content', $project->content ?? '')))" class="space-y-3">

                                {{-- Hidden Input --}}
                                <input type="hidden" name="content" x-model="content">

                                {{-- Toolbar --}}
                                <div
                                    class="flex flex-wrap items-center gap-2 border border-gray-700 bg-gray-950 rounded-xl p-3">

                                    {{-- Heading --}}
                                    <button type="button" @click="toggleHeading(1)"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        H1
                                    </button>

                                    <button type="button" @click="toggleHeading(2)"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        H2
                                    </button>

                                    <button type="button" @click="setParagraph()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        P
                                    </button>

                                    {{-- Text Style --}}
                                    <button type="button" @click="toggleBold()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm font-bold">
                                        B
                                    </button>

                                    <button type="button" @click="toggleItalic()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm italic">
                                        I
                                    </button>

                                    <button type="button" @click="toggleStrike()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm line-through">
                                        S
                                    </button>

                                    {{-- Lists --}}
                                    <button type="button" @click="toggleBulletList()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        • List
                                    </button>

                                    <button type="button" @click="toggleOrderedList()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        1. List
                                    </button>

                                    {{-- Quote --}}
                                    <button type="button" @click="toggleBlockquote()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        Quote
                                    </button>

                                    {{-- Code --}}
                                    <button type="button" @click="toggleCodeBlock()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        Code
                                    </button>

                                    {{-- Link --}}
                                    <button type="button" @click="setLink()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        Link
                                    </button>

                                    {{-- Undo / Redo --}}
                                    <button type="button" @click="undo()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        Undo
                                    </button>

                                    <button type="button" @click="redo()"
                                        class="px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">
                                        Redo
                                    </button>
                                </div>

                                {{-- Editor --}}
                                <div x-ref="editor" x-init="init($refs.editor)"
                                    class="border border-gray-700 rounded-2xl bg-gray-950 p-5 text-white min-h-[400px]">
                                </div>

                                {{-- Validation Error --}}
                                @error('content')
                                    <p class="text-sm text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

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
