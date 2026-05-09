<!-- add modal -->
<div class="modal fade" id="add-experience" tabindex="-1" aria-labelledby="add-experience-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <form id="addExperienceForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-experience-label">Tambah Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @csrf
                    <div class="row gy-3">

                        {{-- Nama Perusahaan --}}
                        <div class="col-xl-6">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" name="company_name" class="form-control"
                                placeholder="Masukkan nama perusahaan" required>
                        </div>

                        {{-- Posisi --}}
                        <div class="col-xl-6">
                            <label class="form-label">Posisi</label>
                            <input type="text" name="position" class="form-control"
                                placeholder="Masukkan posisi pekerjaan" required>
                        </div>

                        {{-- Tanggal Mulai --}}
                        <div class="col-xl-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        {{-- Tanggal Selesai --}}
                        <div class="col-xl-6">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="end_date" id="end_date" class="form-control">
                        </div>

                        {{-- Masih bekerja --}}
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="is_current"
                                    name="is_current">

                                <label class="form-check-label" for="is_current">
                                    Saya masih bekerja di sini
                                </label>
                            </div>
                        </div>

                        {{-- Detail Experience --}}
                        <div class="col-12">

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">Deskripsi Pekerjaan</label>

                                <button type="button" class="btn btn-sm btn-primary" id="add-detail">
                                    <i class="ri-add-line"></i> Tambah
                                </button>
                            </div>

                            <div id="experience-detail-wrapper">

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
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addExperienceBtn"
                        class="btn btn-primary btn-wave waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
