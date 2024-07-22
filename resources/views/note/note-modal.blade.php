<div class="modal fade" id="notesModal" tabindex="-1" aria-labelledby="notesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header title-text">
                <h5 class="modal-title" id="notesModalLabel">Add Notes</h5>
            </div>
            
            <div class="modal-body">
                <form id="notesForm" method="POST" action="{{ route('note.add') }}">
                    <div class="mb-3">
                        <label for="noteTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="noteTitle" placeholder="Enter title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="noteDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="noteDescription" rows="3" placeholder="Description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="noteType" class="form-label">Type</label>
                        <select class="form-select" id="noteType" name="type">
                            <option selected disabled>Select Type</option>
                            @foreach($data as $type)
                                <option>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dateTime" class="form-label">Date Time</label>
                        <input type="date" class="form-control" id="dateTime" name="datetime">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger close-note-modal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary" id="saveNotes">Save</button>
            </div>
        </div>
    </div>
</div>