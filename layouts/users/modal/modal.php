<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">FeedBack</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card " style="background:#D8EBE0">
                    <div class="card-body p-3">
                        <form id="feedbackForm" method="post">
                            <div class="row">
                                <div class="col-xl-12">
        
                                        <label>Comment:</label>
                                        <div class="input-group input-group-sm p-1 ">
                                            <textarea name="comment" class="form-control" id="feedback_comment" cols="30" rows="5"></textarea>
                                        </div>
                                   
                                </div>
                        
                                <div class="col-xl-12">
                                    <button type="submit" name="feedbackAction" class="mt-3 btn btn-sm bg-gradient-success w-100" disabled>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>