<form action="/mails" method="post" enctype="multipart/form-data">
  @csrf
  <div class="row mb-3 gy-3">
    <div class="col-lg-6">
      <label for="number" class="form-label">Mail Number</label>
      <input type="text" name="number" id="number" class="form-control @error('number') is-invalid @enderror" placeholder="XX/XX">
      @error('number')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-lg-6">
      <label for="subject" class="form-label">Mail Subject</label>
      <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject">
      @error('subject')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-lg-6">
      <label for="from" class="form-label">Mail From</label>
      <input type="text" name="from" id="from" class="form-control @error('from') is-invalid @enderror" placeholder="Sender">
      @error('from')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-lg-6">
      <label for="to" class="form-label">Mail To</label>
      <input type="text" name="to" id="to" class="form-control @error('to') is-invalid @enderror" placeholder="Recipient">
      @error('to')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-lg-6">
      <label for="date" class="form-label">Mail Date</label>
      <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror">
      @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-lg-6">
      <label for="file" class="form-label">Mail Files</label>
      <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept="application/pdf" aria-describedby="fileHelp">
      <div id="fileHelp" class="form-text">Only PDF & < 20 MB</div>
      @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-lg-12">
      <label for="type" class="form-label">Mail Type</label>
      <div id="type">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="type1" value="INCOMING" checked>
          <label class="form-check-label" for="type1">Incoming Mail</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="type2" value="OUTGOING">
          <label class="form-check-label" for="type2">Outgoing Mail</label>
        </div>
        @error('type')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="col-lg-12 d-flex justify-content-end">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>