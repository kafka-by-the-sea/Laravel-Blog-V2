@extends('layouts.dashboard')

@section('content')
<h2>Create New Post</h2>

<script type="text/javascript" src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
tinymce.init({
    selector : "textarea",
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright"
});
</script>

<form action="{{url('/admin/posts/createpost')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <p>Title</p>
        <input type="text" name="title" value="{{old('title')}}" required="required" placeholder="Enter title here" class="form-control">
        <br>
        <p>Description</p>
        <input type="text" name="description" value="{{old('description')}}" required="required" placeholder="Enter description here" class="form-control">
        <br>
        <!-- thumbnail upload -->
        <!-- for more tutorial about images upload you can see at previews video -->
        <p>Thumbnail</p>
        <img src="http://placehold.it/100x100" id="showimages" style="max-width:200px;max-height:200px;float:left;"/>
        <div class="row">
            <div class="col-md-12">
                <input type="file" id="inputimages" name="images">
            </div>
        </div>
    </div>

    <div class="form-group">
        <textarea name="body" class="form-control" rows="20"></textarea>
    </div>

    <input type="submit" name='publish' class="btn btn-success" value="Publish"/>
    <input type="submit" name='save' class="btn btn-default" value="Save Draft"/>
</form>
@endsection
