<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Number</th>
      <th scope="col">Subject</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Date</th>
      <th scope="col">Created Date</th>
      <th scope="col">Updated Date</th>
      <th scope="col">Type</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($mails as $mail)
        <tr>
            <th scope="row">{{ $mail->id }}</th>
            <td>{{ $mail->number }}</td>
            <td>{{ $mail->subject }}</td>
            <td>{{ $mail->from }}</td>
            <td>{{ $mail->to }}</td>
            <td>{{ $mail->date }}</td>
            <td>{{ $mail->created_at }}</td>
            <td>{{ $mail->updated_at }}</td>
            <td>{{ $mail->type }}</td>
            <td>
                <div class="d-flex justify-content-around">
                    <a href="{{ 'mails/'.$mail->file }}" class="btn btn-primary" title="View"><i class="fa-solid fa-file-pdf"></i></a>
                    @can('delete mail')
                      <form action="/mails/1" method="post">
                          @method('delete')
                          @csrf
                          <!-- <input type="hidden" name="id" value="<?= $mail->id ?>"> -->
                          <button type="submit" class="btn btn-outline-danger" title="Delete"><i class="fa-solid fa-trash"></i></button>
                      </form>
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>