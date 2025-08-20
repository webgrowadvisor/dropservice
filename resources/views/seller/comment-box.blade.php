<div class="card" id="" style="border-radius: 15px;">
    
    <div class="card-footer p-0" style="background:none">
        <form class="" method="POST" action="{{route('send.comment')}}">
          @csrf
          <input type="hidden" name="lead_id" value="{{$lead->id}}">
          <textarea class="form-control" required id="textAreaExample" name="message" rows="3"></textarea>
            <label class="form-label" for="">Type your comment message</label>
            <button class="btn btn-primary page-header-right ms-auto">Send</button>
        </form>
    </div>
</div>