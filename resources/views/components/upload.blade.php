@props(['maxfiles','maxfilessize','filename','url','filetype','buttontext'])
@php
if(!isset($buttontext)): $buttontext = "رفع الصور"; endif;
if(!isset($maxfiles)): $maxfiles = 10; endif;
$filetype = "images";
if($filetype =="images"){
    $icon = "<i class='fa fa-image'></i>";
    $allowed = ".jpeg,.jpg,.png,.gif";
}elseif($filetype =="documents"){
    $icon = "<i class='fa fa-file'></i>";
    $allowed = ".doc,.docx,.xls,.xlsx,.ppt,.pptx,.pdf";
}elseif($filetype =="all"){
    $icon = "<i class='fa fa-file'></i>";
    $allowed = "*";
}else{
    $icon = "<i class='fa fa-image'></i>";
    $allowed = ".jpeg,.jpg,.png,.gif";
}
if(!isset($url) || empty($url)): $url = '/upload'; endif;
if(!isset($maxfilessize)): $maxfilessize = 12; endif;
if(!isset($filename) || empty($filename)): $filename = 'file'; endif;

@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<form class="form" action="@php echo $url @endphp" method="POST"  enctype="multipart/form-data">
            <!--begin::Dropzone-->
            <div class="col-12 rtl dropzone dropzone-queue mb-2" id="@php echo $filename; @endphp">
                <!--begin::Controls-->
                <div class="dropzone-panel text-center">
                    <a class="dropzone-select btn btn-sm btn-primary me-2"><?php echo $icon.' '.$buttontext; ?></a>
                </div>
                <!--end::Controls-->
                <!--begin::Items-->
                <div class="dropzone-items col-12">
                    <div class="dropzone-item col-2" style="display:none">
                        <!--begin::File-->
                        <div class="dropzone-file">
                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                <span data-dz-name>some_image_file_name.jpg</span>
                                <strong>(<span data-dz-size>0kb</span>)</strong>
                            </div>

                            <div class="dropzone-error" data-dz-errormessage></div>
                        </div>
                        <!--end::File-->

                        <!--begin::Progress-->
                        <div class="dropzone-progress">
                            <div class="progress">
                                <div
                                    class="progress-bar bg-primary"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
                                </div>
                            </div>
                        </div>
                        <!--end::Progress-->

                        <!--begin::Toolbar-->
                        <div class="dropzone-toolbar">
                            <span class="dropzone-delete" data-dz-remove><i class="bi bi-x fs-1"></i></span>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Dropzone-->

            <!--begin::Hint-->
            <span class="form-text text-muted"></span>
            <!--end::Hint-->
<div class="inputs"></div>
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
Dropzone.autoDiscover = false;

const id = "#<?php echo $filename; ?>";
const dropzone = document.querySelector(id);
var picturename = 0;
// set the preview element template
var previewNode = dropzone.querySelector(".dropzone-item");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
    url: "<?php echo $url; ?>", // Set the url for your upload script location
    acceptedFiles: "<?php echo $allowed; ?>",
    paramName: "<?php echo $filename; ?>",
    uploadMultiple: true,
    parallelUploads: <?php echo $maxfiles; ?>,
    maxFiles: <?php echo $maxfiles; ?>,
    headers :{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
    maxFilesize: <?php echo $maxfilessize; ?>, // Max filesize in MB
    previewsContainer: id + " .dropzone-items", // Define the container to display the previews
    clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function (file) {
    // Hookup the start button
    //console.log(file);
    const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
    dropzoneItems.forEach(dropzoneItem => {
        dropzoneItem.style.display = '';
    });

});


myDropzone.on("successmultiple", function(files, response) {
    $('.inputs').append(response);

});
// Update the total progress bar
myDropzone.on("totaluploadprogress", function (progress) {
    const progressBars = dropzone.querySelectorAll('.progress-bar');
    progressBars.forEach(progressBar => {
        progressBar.style.width = progress + "%";
    });

});

myDropzone.on("sending", function (file) {
    // Show the total progress bar when upload starts
    const progressBars = dropzone.querySelectorAll('.progress-bar');
    progressBars.forEach(progressBar => {
        progressBar.style.opacity = "1";
    });
    picturename++;

});

// Hide the total progress bar when nothing"s uploading anymore
myDropzone.on("complete", function (progress) {
    const progressBars = dropzone.querySelectorAll('.dz-complete');
});
</script>
@endsection
