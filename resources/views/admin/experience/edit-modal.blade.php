<!-- edit modal -->
<div class="modal fade" id="edit-experience-modal" tabindex="-1" aria-labelledby="edit-experience-label" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">

        <div class="modal-content">

            <form id="editExperienceForm" enctype="multipart/form-data">

                @csrf

                {{-- ID --}}
                <input type="hidden" id="edit_id" name="id">

                <div class="modal-header">

                    <h5 class="modal-title" id="edit-experience-label">
                        Edit Experience
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="row gy-3">

                        {{-- Nama Perusahaan --}}
                        <div class="col-xl-6">

                            <label class="form-label">
                                Nama Perusahaan
                            </label>

                            <input type="text" id="edit_company_name" name="company_name" class="form-control"
                                placeholder="Masukkan nama perusahaan" required>

                        </div>

                        {{-- Posisi --}}
                        <div class="col-xl-6">

                            <label class="form-label">
                                Posisi
                            </label>

                            <input type="text" id="edit_position" name="position" class="form-control"
                                placeholder="Masukkan posisi pekerjaan" required>

                        </div>

                        {{-- Tanggal Mulai --}}
                        <div class="col-xl-6">

                            <label class="form-label">
                                Tanggal Mulai
                            </label>

                            <input type="date" id="edit_start_date" name="start_date" class="form-control" required>

                        </div>

                        {{-- Tanggal Selesai --}}
                        <div class="col-xl-6">

                            <label class="form-label">
                                Tanggal Selesai
                            </label>

                            <input type="date" id="edit_end_date" name="end_date" class="form-control">

                        </div>

                        {{-- Masih bekerja --}}
                        <div class="col-12">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value="1" id="edit_is_current"
                                    name="is_current">

                                <label class="form-check-label" for="edit_is_current">

                                    Saya masih bekerja di sini

                                </label>

                            </div>

                        </div>

                        {{-- Detail Experience --}}
                        <div class="col-12">

                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <label class="form-label mb-0">
                                    Deskripsi Pekerjaan
                                </label>

                                <button type="button" class="btn btn-sm btn-primary" id="edit-add-detail">

                                    <i class="ri-add-line"></i>
                                    Tambah

                                </button>

                            </div>

                            <div id="edit-experience-detail-wrapper">

                                <div class="input-group mb-2 experience-detail-item">

                                    <input type="text" name="details[]" class="form-control"
                                        placeholder="Contoh: Membuat dan maintenance website" required>

                                    <button type="button" class="btn btn-danger remove-detail">

                                        <i class="ri-delete-bin-line"></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary btn-wave waves-effect waves-light"
                        data-bs-dismiss="modal">

                        Close

                    </button>

                    <button type="submit" id="editExperienceBtn"
                        class="btn btn-primary btn-wave waves-effect waves-light">

                        Save changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
