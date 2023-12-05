<div class="modal fade effect-scale" tabindex="-1" id="modalHome" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">My Note</h6>
                <button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <form id="form-note-home">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="titleHome" class="col-form-label">Title</label>
                    <input type="text" class="form-control" id="titleHome" name='titleHome' readonly>
                </div>
                <div class="mb-3">
                    <label for="descriptionHome" class="col-form-label">Description</label>
                    <textarea type="text" name ="descriptionHome" class="form-control" id="descriptionHome" disabled></textarea>
                </div>
                <div class="mb-3">
                    <label for="statusHome" class="col-form-label">Status</label>
                    <select class="form-select mb-3" name="statusHome" id='statusHome' disabled>
                        <option value="">Choose status</option>
                        <option value="Done">Done</option>
                        <option value="Processing">Processing</option>
                        <option value="Cancel">Cancel</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>
