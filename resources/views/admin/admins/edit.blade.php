@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Edit Admin
                    <a href="{{ route('admins.index') }}" class="btn btn-primary float-right">
                        Kembali 
                    </a>
                </h3>     
            </div>
            <div class="card-body">
                <form action="{{ route('admins.update', $edit->id) }}" method="post">
                    @csrf 
                    @method('put')
                  
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-7">
                          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$edit->nama }}" id="nama">
                        </div>
                    </div>
        
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-7">
                          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$edit->email }}">
                        </div>
                    </div>
        
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor HP </label>
                        <div class="col-sm-7">
                          <input type="hp" name="hp" id="hp" class="form-control @error('hp') is-invalid @enderror" value="{{$edit->hp }}">
                        </div>
                    </div>
        
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-7">
                        <input type="alamat" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$edit->alamat }}">
                      </div>
                  </div>
                 
                  
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
@endsection


@push('style-alt')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('script-alt')   
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
   var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: "{{ route('admin.products.storeImage') }}",
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->gallery)
      var files =
        {!! json_encode($product->gallery) !!}
          for (var i in files) {
              
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.original_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }
         return _results
     }
}
</script>
@endpush
