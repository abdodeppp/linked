@extends('layouts.front.app')
@section('content')

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Add Job</h1>
                <form action="{{ route('job_add_post') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"  name="name" placeholder="Your title">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="location" placeholder="Your location">
                                <label for="name">location</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select border-0 form-control" name="category">
                                <option value="" selected>Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control"  name="price_from" placeholder="Your price from">
                                <label for="email">price from</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control"  name="price_to" placeholder="Your price to">
                                <label for="email">price to</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Type</label>
                            <select class="form-select border-0 form-control" name="type">
                                <option selected>type</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="image" class="form-control image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea class="form-control" id="editor" name="description" rows="5"></textarea>
                            @error('description_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact End -->



    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/super-build/ckeditor.js"></script>


    <script>
       // This sample still does not showcase all CKEditor&nbsp;5 features (!)
       // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
       CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
           ckfinder: {
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
           toolbar: {
               items: [
                   'exportPDF','exportWord', '|',
                   'findAndReplace', 'selectAll', '|',
                   'heading', '|',
                   'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                   'bulletedList', 'numberedList', 'todoList', '|',
                   'outdent', 'indent', '|',
                   'undo', 'redo',
                   '-',
                   'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                   'alignment', '|',
                   'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                   'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                   'textPartLanguage', '|',
                   'sourceEditing'
               ],

               shouldNotGroupWhenFull: true
           },
           // Changing the language of the interface requires loading the language file using the <script> tag.
           // language: 'es',
           list: {
               properties: {
                   styles: true,
                   startIndex: true,
                   reversed: true
               }
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
           heading: {
               options: [
                   { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                   { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                   { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                   { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                   { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                   { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                   { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
               ]
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
           placeholder: 'Welcome to CKEditor 5!',
           // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
           fontFamily: {
               options: [
                   'default',
                   'Arial, Helvetica, sans-serif',
                   'Courier New, Courier, monospace',
                   'Georgia, serif',
                   'Lucida Sans Unicode, Lucida Grande, sans-serif',
                   'Tahoma, Geneva, sans-serif',
                   'Times New Roman, Times, serif',
                   'Trebuchet MS, Helvetica, sans-serif',
                   'Verdana, Geneva, sans-serif'
               ],
               supportAllValues: true
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
           fontSize: {
               options: [ 10, 12, 14, 'default', 18, 20, 22 ],
               supportAllValues: true
           },
           // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
           // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
           htmlSupport: {
               allow: [
                   {
                       name: /.*/,
                       attributes: true,
                       classes: true,
                       styles: true
                   }
               ]
           },
           // Be careful with enabling previews
           // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
           htmlEmbed: {
               showPreviews: true
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
           link: {
               decorators: {
                   addTargetToExternalLinks: true,
                   defaultProtocol: 'https://',
                   toggleDownloadable: {
                       mode: 'manual',
                       label: 'Downloadable',
                       attributes: {
                           download: 'file'
                       }
                   }
               }
           },
           // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
           mention: {
               feeds: [
                   {
                       marker: '@',
                       feed: [
                           '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                           '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                           '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                           '@sugar', '@sweet', '@topping', '@wafer'
                       ],
                       minimumCharacters: 1
                   }
               ]
           },
           // The "superbuild" contains more premium features that require additional configuration, disable them below.
           // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
           removePlugins: [
               // These two are commercial, but you can try them out without registering to a trial.
               // 'ExportPdf',
               // 'ExportWord',
               'AIAssistant',
               'CKBox',
               'CKFinder',
               'EasyImage',
               // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
               // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
               // Storing images as Base64 is usually a very bad idea.
               // Replace it on production website with other solutions:
               // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
               // 'Base64UploadAdapter',
               'RealTimeCollaborativeComments',
               'RealTimeCollaborativeTrackChanges',
               'RealTimeCollaborativeRevisionHistory',
               'PresenceList',
               'Comments',
               'TrackChanges',
               'TrackChangesData',
               'RevisionHistory',
               'Pagination',
               'WProofreader',
               // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
               // from a local file system (file://) - load this site via HTTP server if you enable MathType.
               'MathType',
               // The following features are part of the Productivity Pack and require additional license.
               'SlashCommand',
               'Template',
               'DocumentOutline',
               'FormatPainter',
               'TableOfContents',
               'PasteFromOfficeEnhanced',
               'CaseChange'
           ]
       });
   </script>


@endsection
