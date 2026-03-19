<div class="modal fade" id="fullSpecsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-white border-bottom p-3">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="bi bi-cpu-fill me-2 text-muted"></i>Thông số kỹ thuật chi tiết
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-hover align-middle mb-0">
                    <tbody>
                        @foreach ($product->specs as $spec)
                            <tr>
                                <td class="text-muted py-3" style="width: 40%; font-size: 0.9rem;">
                                    {{ $spec->spec_key }}
                                </td>
                                <td class="fw-bold py-3 text-dark" style="font-size: 0.9rem;">
                                    {{ $spec->spec_value }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-primary w-100 fw-bold py-2" data-bs-dismiss="modal">
                    ĐÓNG
                </button>
            </div>
        </div>
    </div>
</div>