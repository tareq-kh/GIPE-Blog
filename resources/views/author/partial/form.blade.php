 <div class="mb-3">
            <div class="h1">
                <label >Create a new Author</label>
            </div>
            <label for="blogPostTitle" class="form-label">Author Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name',optional ($author ?? null)->name)}}">


            <div class="mb-3">
                <label for="blogPostContet" class="form-label">Author Email</label>

                <input type="text" class="form-control" name="authorEmail" value="{{old('authorEmail',optional( optional ($author??null )->profile?? null) ->email)}}">
            </div>

            @if($errors->any())
                <div class="mb-3">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 </div>
