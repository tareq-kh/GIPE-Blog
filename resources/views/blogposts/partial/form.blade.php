 <div class="mb-3">
            <div class="h1">
                <label >Create a new Blog Post</label>
            </div>
            <label for="blogPostTitle" class="form-label">Blog Post Title</label>
            <input type="text" class="form-control" name="blogPostTitle" value="{{old('blogPostTitle',optional ($blogposts ?? null)->blogPostTitle)}}">


            <div class="mb-3">
                <label for="blogPostContet" class="form-label">Blog Post Content</label>

                <textarea class="form-control" name="blogPostContent" rows="3"> {{old('blogPostContent',optional($blogposts ?? null)->blogPostContent)}}</textarea>
            </div>

            <div class="mb-3">
                <input type="checkbox" class="" name="blogPostIsHighlight" value="on">
                <label for="highlight"> Highlight Blog Post </label><br>
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
