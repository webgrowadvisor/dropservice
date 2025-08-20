<div class="faq-item row mb-3" data-index="{{ $index }}">
    <div class="col-md-5">
        <input type="text" name="faqs[{{ $index }}][question]" value="{{ $question ?? '' }}" class="form-control" placeholder="Question">
    </div>
    <div class="col-md-5">
        <input type="text" name="faqs[{{ $index }}][answer]" value="{{ $answer ?? '' }}" class="form-control" placeholder="Answer">
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-danger remove-faq w-100">Remove</button>
    </div>
</div>